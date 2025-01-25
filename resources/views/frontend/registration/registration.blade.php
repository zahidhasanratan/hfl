@extends('frontend.app')
@section('title')
Register
@endsection

@section('content')
    <article style="min-height: 59px;">
        <div class="page-content" style="margin-top: -183px;">

            <div class="content-main">
                <div class="left">
                    <h1>REGISTER &amp; LOG IN</h1>
                </div>
                <div class="right">
                    <div class="sign-up">
                        <h4>Register</h4>
                        <p class="text">Create an account to have access to rating information and articles published by TRIS Rating</p>
                        <div class="form ">
                            @if(count($errors) >0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form id="register-form" method="post" action="{{route('register')}}" class="form-horizontal">
                                @csrf

                                <div class="row">
                                    <div class="span5 offset1">
                                        <fieldset>
                                            <legend>Your Details</legend>
                                            <div class="control-group control-name">
                                                <label for="akID[29][value]" class="control-label">Name</label>											<div class="controls">
                                                    <input id="akID[29][value]" type="text" name="name" value="" class="span5 ccm-input-text" required="">
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label for="uEmail" class="control-label">Email Address</label>										<div class="controls">
                                                    <input id="uEmail" type="text" name="email" value="" required="" class="ccm-input-text">										</div>
                                            </div>
                                            <div class="control-group">
                                                <label for="uPassword" class="control-label">Password</label>										<div class="controls">
                                                    <input id="uPassword" type="password" name="password" value="" required="" class="ccm-input-password">										</div>
                                            </div>
                                            <div class="control-group input-pass">
                                                <label for="uPasswordConfirm" class="control-label">Confirm Password</label>										<div class="controls">
                                                    <input id="uPasswordConfirm" type="password" name="password_confirmation" value="" required="" class="ccm-input-password">										</div>
                                            </div>
                                            <div class="control-group">
                                                <label for="uEmail" class="control-label">Company Name</label>
                                                <div class="controls">
                                                    <input id="uEmail" type="text" name="company" value="" required="" class="ccm-input-text">										</div>
                                            </div>
                                        </fieldset>
                                    </div>



                                    <div class="span10 offset1">
                                        <div class="actions">

                                            <input type="submit" class="primary btn ccm-input-submit" id="register" name="register" value="Register ">								</div>
                                    </div>


                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="sign-in">

                        <h4>Log in</h4>
                        <p>Welcome Back!</p>
                        <div class="form">


                            @if(count($errors) >0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="post" action="{{ route('admin.login.submit') }}" class="form-horizontal formtoggle">
                                @csrf
                                <div class="row">
                                    <div class="span5 offset1">
                                        <fieldset>
                                            <legend>User Account</legend>
                                            <div class="control-group">
                                                <label for="uName" class="control-label">Email Address</label>
                                                <div class="controls">
                                                    <input type="text" name="email" id="uName" class="ccm-input-text" autofocus="">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label for="uPassword" class="control-label">Password</label>
                                                <div class="controls">
                                                    <input type="password" name="password" id="uPassword" class="ccm-input-text">
                                                </div>
                                            </div>

                                        </fieldset>
                                    </div>
                                    {{--<div class="forgot-pass"><a href="#" class="formtoggle">Forgot Password?</a></div>--}}
                                </div>
                                <div class="row">
                                    <div class="span10 offset1">
                                        <div class="actions">
                                            <input type="submit" class="primary btn ccm-input-submit" id="submit" name="submit" value="LOG IN ">										</div>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </article>
@endsection

