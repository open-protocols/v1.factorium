<?php

namespace App\Http\Controllers;

use App\Credit;
use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Investment;
use App\InvestmentInvestor;
use App\Invite;
use App\Mailers\AppMailer;
use App\Note;
use App\Project;
use App\User;
use Carbon\Carbon;
use Chumper\Datatable\Datatable;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\SiteConfiguration;
use Session;

class DashboardController extends Controller
{
    /**
     * constructor for DashboardController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $color = Color::where('project_site',url())->first();
        $users = User::where('registration_site',url());
        $projects = Project::all();
        $projects = $projects->where('project_site',url());
        $notes = Note::all();
        $total_goal = Investment::all()->where('project_site',url())->sum('goal_amount');
        $pledged_investments = InvestmentInvestor::all()->where('project_site',url());
        return view('dashboard.index', compact('users', 'projects', 'pledged_investments', 'total_goal', 'notes','color'));
    }

    public function users()
    {
        $color = Color::where('project_site',url())->first();
        $users = User::all()->where('registration_site',url());
        return view('dashboard.users.index', compact('users','color'));
    }

    public function projects()
    {
        $color = Color::where('project_site',url())->first();
        $projects = Project::all();
        $projects = $projects->where('project_site',url());
        $pledged_investments = InvestmentInvestor::all();
        return view('dashboard.projects.index', compact('projects', 'pledged_investments','color'));
    }

    public function getDashboardUsers()
    {
        $datatable = new Datatable();
        return $datatable->collection(User::all())
        ->showColumns('id', 'first_name', 'last_name', 'phone_number','email')
        ->searchColumns('first_name')
        ->orderColumns('id','first_name')
        ->make();

    }

    public function getDashboardProjects()
    {
        $datatable = new Datatable();
        return $datatable->collection(Project::all())
        ->showColumns('id', 'title', 'active', 'description')
        ->searchColumns('title', 'description')
        ->orderColumns('id','title', 'active')
        ->make();
    }

    public function showUser($user_id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($user_id);
        return view('dashboard.users.show', compact('user','color'));
    }

    public function usersInvestments($user_id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($user_id);
        return view('dashboard.users.investments', compact('user','color'));
    }

    public function showProject($project_id)
    {
        $color = Color::where('project_site',url())->first();
        $project = Project::findOrFail($project_id);
        $investments = InvestmentInvestor::where('project_id', $project_id)->get();
        return view('dashboard.projects.show', compact('project', 'investments','color'));
    }

    public function projectInvestors($project_id)
    {
        $color = Color::where('project_site',url())->first();
        $project = Project::findOrFail($project_id);
        $investments = InvestmentInvestor::where('project_id', $project_id)->get();
        return view('dashboard.projects.investors', compact('project', 'investments','color'));
    }

    public function editProject($project_id)
    {
        $color = Color::where('project_site',url())->first();
        $project = Project::findOrFail($project_id);
        $investments = InvestmentInvestor::where('project_id', $project_id)->get();
        return view('dashboard.projects.edit', compact('project', 'investments','color'));
    }

    public function activateUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $status = $user->update(['active'=> 1, 'activated_on'=>Carbon::now()]);
        return redirect()->back();
    }

    public function deactivateUser($user_id)
    {
        $user = User::findOrFail($user_id);
        $status = $user->update(['active'=> 0, 'activated_on'=>Carbon::now()]);
        return redirect()->back();
    }

    public function verification($user_id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($user_id);
        return view('dashboard.users.verification', compact('user','color'));
    }

    public function verifyId(Request $request, AppMailer $mailer, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update(['verify_id'=>$request->status]);
        $user->idImage()->get()->last()->update(['verify_id'=>$request->status, 'fixing_message'=>$request->fixing_message, 'fixing_message_for_id'=>$request->fixing_message_for_id]);
        $idimages = $user->idImage()->get()->last();
        if($request->status == '2') {
            $invitee = Invite::whereEmail($user->email)->first();
            if($invitee) {
                Credit::create(['user_id'=>$invitee->user_id, 'invite_id'=>$invitee->id, 'amount'=>50, 'type'=>'User Confirmed by Admin']);
            }
            $message = '<p class="alert alert-success text-center">User has been verified successfully and a notification has been sent.</p>';
        } else {
            $message = '<p class="alert alert-warning text-center">User has to try again.</p>';
        }
        $mailer->sendVerificationNotificationToUser($user, $request->status, $idimages);
        return redirect()->back()->withMessage($message);
    }

    public function privateProject($project_id)
    {
        $project = Project::findOrFail($project_id);
        $status = $project->update(['active'=> 2, 'activated_on'=>Carbon::now()]);
        return redirect()->back();
    }

    public function toggleStatus(Request $request, $project_id)
    {
        $project = Project::findOrFail($project_id);
        $status = $project->update(['active'=> $request->active, 'activated_on'=>Carbon::now()]);
        return redirect()->back();
    }

    public function updateInvestment(Request $request, $investment_id)
    {
        $this->validate($request, [
            'investor' => 'required',
            'amount' => 'required|numeric',
            ]);

        $investment = InvestmentInvestor::findOrFail($investment_id);
        $investment->amount = $request->amount;
        $investment->save();

        return redirect()->back()->withMessage('<p class="alert alert-success text-center">Successfully updated.</p>');

    }

    public function acceptInvestment(Request $request, AppMailer $mailer, $investment_id)
    {
        $this->validate($request, [
            'investor' => 'required',
            ]);

        $investment = InvestmentInvestor::findOrFail($investment_id);
        $investment->accepted = 1;
        $investment->money_received = 1;
        $investment->save();

        if($investment->accepted) {
            $shareInit = 1;
            $investmentShares = InvestmentInvestor::orderBy('updated_at','ASC')->get()
                            ->where('project_id', $investment->project_id)
                            ->where('accepted', 1);
            foreach ($investmentShares as $investmentShare) {
                echo("<script>console.log('".$investmentShare."');</script>");
                if($investmentShare->id != $investment->id){
                    $shareInit += intval($investmentShare->amount);
                } else {
                    break;
                }
            }
            echo("<script>console.log('".$shareInit."');</script>");
            $pdf = PDF::loadView('pdf.invoice', ['investment' => $investment, 'shareInit' => $shareInit]);
            $pdf->setPaper('a4', 'landscape');
            $pdf->save(storage_path().'/app/invoices/Share-Certificate-'.$investment->id.'.pdf');
            $mailer->sendInvoiceToUser($investment);
            $mailer->sendInvoiceToAdmin($investment);
        }

        return redirect()->back()->withMessage('<p class="alert alert-success text-center">Successfully updated.</p>');

    }

    public function activateProject($project_id)
    {
        $project = Project::findOrFail($project_id);
        $status = $project->update(['active'=> 1, 'activated_on'=>Carbon::now()]);
        return redirect()->back();
    }

    public function deactivateProject($project_id)
    {
        $project = Project::findOrFail($project_id);
        $status = $project->update(['active'=> 0, 'activated_on'=>Carbon::now()]);
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($user_id)
    {
        $color = Color::where('project_site',url())->first();
        $user = User::findOrFail($user_id);
        return view('dashboard.users.edit', compact('user','color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function siteConfigurations()
    {
        $color = Color::where('project_site',url())->first();
        $siteconfiguration = SiteConfiguration::where('project_site',url())->first();
        return view('dashboard.configuration.siteConfiguration',compact('color','siteconfiguration'));
    }

    public function investmentMoneyReceived(Request $request, AppMailer $mailer, $investment_id)
    {
        $investment = InvestmentInvestor::findOrFail($investment_id);
        $investment->money_received = 1;
        $investment->save();

        if($investment->money_received) {
            $mailer->sendMoneyReceivedConfirmationToUser($investment);
        }

        return redirect()->back()->withMessage('<p class="alert alert-success text-center">Successfully updated.</p>');

    }

    public function investmentReminder(AppMailer $mailer, $investment_id){
        $investment = InvestmentInvestor::findOrFail($investment_id);
        $mailer->sendInvestmentReminderToUser($investment);
        Session::flash('action', $investment->id);
        return redirect()->back()->withMessage('<p class="alert alert-success text-center">Reminder sent</p>');        
    }
}
