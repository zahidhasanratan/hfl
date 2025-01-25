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
                            <div class="row">
                                <div class="span10 offset1">
                                    <p>You are registered but you need to validate your email address. Some or all functionality on this site will be limited until you do so.</p>
                                    <p>An email has been sent to your email address. Click on the URL contained in the email to validate your email address.</p>
                                    <p><a href="/">Return to Home</a></p>
                                </div>
                            </div>
                            <style>.sign-up>.text{display:none;}</style>
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

