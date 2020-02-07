@extends('layouts.mainproject')

@section('title-section')
Buy Invoice | @parent
@stop

@section('css-section')
<style>
	body{

	}
	.buy-now-btn {
		background-color: transparent;
		color: #23527c;
		border-radius: 30px;
		transition: transform .2s;
	}
	.buy-now-btn:hover{
		transform: scale(1.04);
	}
	.list-group-item{
		border: none;
		/*border-bottom: 1px solid #ddd;*/
		/*border-radius: 0px;*/
		margin-left: -1px;
		margin-right: -1px;
	}
	.list-group{
		margin-bottom: 0px;
	}
	.panel-body{
		padding: 0px;
	}
	.panel-heading{
		margin-left: 0px;
		margin-right: 0px;
	}
	#buy-invoice-panel{
		margin-top: -35px;
	}
	#myBtnContainer{
		margin-top: -105px;
	}
	#sold-invoice-panel{
		margin-top: -70px;
	}
	.circle-btn{
		height: 130px;
		width: 130px;
		border-radius: 50%;
		border: 2px solid ;
		color: #fff;
	}
</style>
{!! Html::style('plugins/animate.css') !!}
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@stop

@section('content-section')
@if (Session::has('message'))
<section class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<br><br>
			@if (Session::has('message'))
			<br>
			{!! Session::get('message') !!}
			<br>
			@endif
			@if ($errors->has())
			<br>
			<div class="alert alert-danger" >
				@foreach ($errors->all() as $error)
				{{ $error }}<br>
				@endforeach
			</div>
			@endif
			<div class="alert alert-danger hide text-center" id="alertCreateInvoice">
			</div>
		</div>
	</div>
</section>
@endif
<section id="mainFold" style="background-color: #070a0e; height: 62vh;color: #fff;">
	<div class="container">
		<div class="row" style="padding-top:30px; margin-right: 0px !important;">
			<div class="col-md-2">
				<img src="https://konkrete.io/assets/images/konkrete_full_logo_dark.png" width="200px;">
			</div>
			<div class="col-md-1 col-md-offset-7">
				<button class="btn" style="background-color: #141e27; color: #fff;" data-backdrop="static" data-keyboard="false" ><span id="balanceBtn"></span> Dai</button>
			</div>
			<div class="col-md-2">
				<button class="btn pull-right" data-toggle="modal" data-target="#connectToWallet" style="background-color: #141e27; color: #fff;" data-backdrop="static" data-keyboard="false" id="connectToWalletBtn">Connect to wallet</button>
			</div>
		</div>
		<br><br><br><br>
		<div class="row text-center">
			<div class="col-md-4">
				<br>
				<h3 class="project-name">Project Name</h3>
				<p class="askingAmt">Asking Amount</p>
			</div>
			<div class="col-md-4">
				<button class="btn btn-lg btn-info buy-now-btn circle-btn approval-btn">
					Unlock Dai<br>
					<span class="askingAmt"></span>
				</button>
			</div>
			<div class="col-md-4">
				<br>
				<h3 class="invested-amount">Invested Amount</h3>
				<p class="investedAmount">0 DAI</p>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row" id="myBtnContainer">
			<div class="col-md-2">
				<button class="btn btn-block btn-default filterbtn @if(!request('filter') || (request('filter') == 'all')) active @endif" onclick="filterSelection('all')" > Show all</button>
			</div>
			<div class="col-md-2">
				<button class="btn btn-block btn-default filterbtn  @if(request('filter') && (request('filter') == 'buy')) active @endif" onclick="filterSelection('buy')"> Buy Now</button>
			</div>
			<div class="col-md-2">
				<button class="btn btn-block btn-default filterbtn  @if(request('filter') && (request('filter') == 'sold')) active @endif" onclick="filterSelection('sold')"> Invoice Sold</button>
			</div>
			<div class="col-md-2">
				<button class="btn btn-block btn-default filterbtn @if(request('filter') && (request('filter') == 'repaid')) active @endif" onclick="filterSelection('repaid')">Invoice Paid</button>
			</div>
		</div>
		<div class="row text-center" style="">
			<div class="col-md-12" id="buy-invoice-panel">
				<br><br>
				<div class="panel panel-default" style="box-shadow: 0px 0px 10px grey;">
					<div class="panel-heading row" style="padding: 2rem 0;color: #aab8c1;">
						<div class="col-md-3 col-xs-3">
							Project Name
						</div>
						<div class="col-md-2 col-xs-2">
							Invoice Amount
						</div>
						<div class="col-md-2 col-xs-2">
							Asking Amount
						</div>
						<div class="col-md-2 col-xs-2">
							Due Date
						</div>
						<div class="col-md-3 col-xs-3">
							Status
						</div>
					</div>
					<div class="panel-body">
						<div class="">
							@foreach($projects as $project)
							<div class="" style="border-top: 1px solid #e3e9eb; width:100%;">
								<a href="#" class="list-group-item row" style="padding: 1em 0;" data-id="{{$project->id}}" data-asking="{{$project->investment->getCalculatedAskingPriceAttribute()}}" data-address="{{$project->contract_address}}">
									<div class="col-md-3 col-xs-3">
										{{$project->title}}
									</div>
									<div class="col-md-2 col-xs-2">
										{{$project->investment->total_projected_costs}}
									</div>
									<div class="col-md-2 col-xs-2">
										{{$project->investment->getCalculatedAskingPriceAttribute()}}
									</div>
									<div class="col-md-2 col-xs-2">
										{{date('d-m-Y', strtotime($project->investment->fund_raising_close_date))}}
									</div>
									<div class="col-md-3 col-xs-3">
										Project Name
									</div>
								</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('partials.connectToWallet')
@include('partials.redeemInvTokenModal')
@stop
@section('js-section')
{{-- {!! Html::script('js/konkrete.js') !!} --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/assets/abi/smartInvoiceABI.js"></script>
<script src="/assets/abi/byteCode.js"></script>
<script type="text/javascript">
	window.addEventListener('load', async () => {
		if (window.ethereum) {
			window.web3 = new Web3(ethereum);
			try{
				console.log('inside try');
				if(ethereum._metamask.isEnabled()){
					var uAddress = ethereum.selectedAddress;
					window.ethereum.on('accountsChanged', async (accounts) => {
						var uAddress = accounts[0];
						var shortText = jQuery.trim(uAddress.toString()).substring(0, 10)+ "...";
						$('#connectToWalletBtn').text(shortText);
						var balance = await getDaiBalance(ethereum.selectedAddress);
						var balance = web3.utils.fromWei(balance.toString(), 'ether');
						var b = Number(balance).toFixed(3);
						$('#balanceBtn').text(b);
					});
					var shortText = jQuery.trim(uAddress.toString()).substring(0, 10)+ "...";
					$('#connectToWalletBtn').text(shortText);
					var balance = await getDaiBalance(ethereum.selectedAddress);
					var balance = web3.utils.fromWei(balance.toString(), 'ether');
					var b = Number(balance).toFixed(3);
					$('#balanceBtn').text(b);
					$('a.list-group-item').click(function () {
						var askAmount = $(this).data('asking');
						var pid = $(this).data('id');
						$('.project-name').text('Invoice '+pid);
						$('.askingAmt').text('$'+askAmount);
						var cAddress = $(this).data('address');
						approvalStatus(cAddress,askAmount);
						$('.circle-btn').on('click',function (e) {
							if($(this).hasClass('approval-btn')){
								approval(cAddress,askAmount);
							}else if($(this).hasClass('buy-now')){
								var hPid = btoa(pid);
								byInvoice(cAddress,askAmount,hPid,pid);
							} else if($(this).hasClass('redeem-btn')){
								getInvTokenBalance(cAddress);
								$('#redeemInvTokenModal').modal('show');
								$('form#redeemTokenForm').submit(function (t) {
									t.preventDefault();
									var invToken = $('input[name="invToken"]').val();
									redeemInvToken(cAddress, invToken);
        							//getDaiBalance(ethereum.selectedAddress);
        						});
							}
						});
					});
				}else{
					$('#connectToWallet').modal('show');
					console.log('not enabled');
				}
				$('#metamaskConnect').on('click',function (e) {
					ethereum.enable();
				});
				//ethereum.autoRefreshOnNetworkChange = false;
				//await ethereum.enable();
			}catch{
				$('#connectToWallet').modal('show');
				$('#metamaskConnect').on('click',function (e) {
					ethereum.enable();
				});
				console.log('User has denied the access');
			}
		}else{
			console.log('Browser does not have metamask');
		}
		// console.log(abi);
		$("form#createInvoiceForm").submit(async(e) => {
			e.preventDefault();
			$('.loader-overlay').show();
			var amount = $('input[name=invoice_amount]').val();
			var askingAmount = $('input[name=asking_amount]').val();
			var dueDate = $('input[name=due_date]').val();
			var someDate = new Date(dueDate);
			someDate = someDate.getTime();
			var walletAddressBuyer = $('input[name=wallet_address_buyer').val();
			if(amount == null){
				window.reload;
			}
			var result = compileCode(amount,askingAmount,someDate,walletAddressBuyer,e);
			console.log(result);
		});
	});
</script>
<script type="text/javascript">
	function filterSelection(c) {
		let filterUrl = '{{ route('home') }}?filter=' + c + '#projects';
		window.location.href = filterUrl;
		return;
	}
</script>
@stop
