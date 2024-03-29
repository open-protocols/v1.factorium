@extends('layouts.main')

@section('title-section')
User Type
@stop

@section('css-section')
<style>
    h1, h2, h3, h4 {
        color: @if($color) {{ '#' . $color->nav_footer_color }} @endif;
    }
</style>
@stop

@section('content-section')
<div class="container text-center">
    <br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (Session::has('message'))
            {!! Session::get('message') !!}
            @endif
            <form action="{{ route('users.user.type.save') }}" method="post">
                {{ csrf_field() }}
                <h2>To start, please pick what best describes you</h2>
                <br><br>
                <div class="row">
                    <div class="col-sm-8 col-md-offset-2">
                        <div class="row">
                            @if($errors->has('user_type'))
                            {!! $errors->first('user_type', '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><small class="text-danger">:message</small></div>') !!}
                            @endif
                            <div class="col-xs-4">
                                <input type="radio" name="user_type" id="user_type3" value="financier" @if($user->factorium_user_type) @if($user->factorium_user_type == 'financier') checked @endif @else checked @endif>
                                <h4><label for="user_type3" >Invoice Buyer</label></h4>
                            </div>
                            <div class="col-xs-4 hide">
                                <input type="radio" name="user_type" id="user_type1" value="buyer" @if($user->factorium_user_type) @if($user->factorium_user_type == 'buyer') checked @endif @endif>
                                <h4><label for="user_type1" >Buyer</label></h4>
                            </div>
                            <div class="col-xs-4">
                                <input type="radio" name="user_type" id="user_type2" value="seller" @if($user->factorium_user_type) @if($user->factorium_user_type == 'seller') checked @endif @endif>
                                <h4><label for="user_type2" >Invoice Issuer</label></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <p class="text-justify">
                    <small>You may still use the platform in other roles even if you selected a particular role. For instance if you selected Seller role, you can still use the platform as a financier or buyer. This step helps us identify your primary motivation to join the platform.</small>
                </p>
                <br>
                {{--                    <div class="user-type-info">--}}
                    {{--                        <div class="alert alert-info alert-dismissible">--}}
                        {{--                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>--}}
                        {{--                            <small>You can submit an invoice for Factoring here <br>Or view other invoices currently for sale on the platform here--}}
                        {{--                            </small>--}}
                    {{--                        </div>--}}
                {{--                    </div>--}}
                <br>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-xs-4 ">
                            <h4 class="pull-left"><label for="entityName" class="">Entity Name</label></h4>
                        </div>
                        <div class="col-xs-8 ">
                            <input type="text" name="entity_name" id="entityName" class="form-control" value="{{ $user->first_name }} {{ $user->last_name }}" placeholder="">
                        </div>
                    </div>
                </div>
                <br>
                <p class="text-justify">
                    <small>This is the name of the entity under which you will be issuing, receiving or financing invoices. This will be the name of the Business or Special Purpose Vehicle such as Company or Trust names. If you are transacting under your own name it will be same as your name.</small>
                </p>
                <br><br>
                <div>
                    <button class="btn btn-lg btn-custom-theme">&nbsp;&nbsp; Go to Site &nbsp;<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    &nbsp;</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('js-section')
<script>
    function showUserTypeInfo(userType) {
        switch (userType) {
            case 'buyer':
            $('.user-type-info').html('<div class="alert alert-info alert-dismissible">\n' +
                '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                '  <small>You can submit an invoice for Factoring here<br>\n' +
                'Or view other invoices currently for sale on the platform here\n</small>' +
                '</div>');
            break;
            case 'seller':
            $('.user-type-info').html('<div class="alert alert-info alert-dismissible">\n' +
                '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                '  <small>You can submit an invoice for Factoring here<br>\n' +
                'Or view other invoices currently for sale on the platform here\n</small>' +
                '</div>');
            break;
            case 'financier':
            $('.user-type-info').html('<div class="alert alert-info alert-dismissible">\n' +
                '  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>\n' +
                '  <small>View invoices currently for sale on the platform here\n</small>' +
                '</div>');
            break;
            default:
                // Do nothing
            }
        }
    </script>
    @stop
