@extends('layouts.login')

@section('content')
    <section id="">
        <section class="login_panel clearfix">


            <section class="login_panel login_panel_atoor clearfix">
                <div class="canvas_area">
                    <div class="log_area_atoor">


                        <div class="log_box" id="signin" style="display: inline-block;">
                            <a href="" class="logo-b2b"
                                style="  width: 100%; float: left;  margin-bottom: 30px;text-align: center;">
                                <img src="{{ asset('assets/front/img/logo.png') }}" class="img-responsive">
                            </a>

                            <form class="log_form" id="login-form" method="POST" action="{{ route('login') }}">
                                <input type="hidden" class="target" name="intended"
                                    value="{{ url()->previous() }}">
                                <input type="hidden" name="type" value="1">
                                <div class="log_set">
                                    <label>Email or Phone Number</label>
                                    <input id="email1" type="text" name="email" value="" required="">
                                    <div class="error_msg" id="error-email"></div>
                                </div>
                                <div class="log_set">
                                    <label>Password</label>
                                    <input id="password1" type="password" name="password" required="">
                                    <div class="error_msg" id="login_error_password"></div>
                                </div>
                                <div class="log_set">
                                    <label for="keep_signin" class="option remember">
                                        <input type="checkbox" name="remember" id="keep_signin" value="remember">
                                        <span class="checkbox"></span> Keep me Signed In
                                    </label>
                                </div>
                                <p>By continuing, you agree to Zawaa <a href="#0">Terms of Use</a> and <a
                                        href="#0">Privacy Policy</a></p>
                                <button type="submit" class="submit_frm">Login</button>
                                <div class="or">
                                    OR
                                </div>
                                <button type="button" class="otp-req signin_otp">Request OTP</button>

                            </form>
                            <ul class="footer_link">
                                <li class="link_left" style="float: left;"><a href="#0" class="new-user"
                                        style="text-align: left;">Not a member? <span>Signup</span></a></li>
                                <li class="link_right" style="float: right;    margin-top: 20px;"><a href="#0"
                                        class="reset-psw">Forgot Password?</a></li>
                            </ul>
                        </div>
                       
                        <div class="log_box" id="signup" style="display: none;">
                            <a href="" class=""
                                style="  width: 100%; float: left;  margin-bottom: 30px;text-align: center;">
                                <img src="{{ asset('assets/front/img/logo.png') }}" class="img-responsive">
                            </a>
                        

                            <form class="log_form" id="signup-form" method="POST" action="{{ route('register') }}">
                                <input type="hidden" class="target" name="intended"
                                    value="{{ url()->previous() }}">
                                <input type="hidden" name="type" value="1">
                                <div class="log_set">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe">
                                    <div class="error_msg" id="reg-error-name"></div>
                                </div>
                                <div class="log_set">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        placeholder="john@example.com">
                                    <div class="error_msg" id="reg-error-email"></div>

                                </div>
                                <div class="log_set">
                                    <label>Phone Number</label>

                                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="94460xxxxx"
                                        style="width:100%;">

                                    <div class="error_msg" id="reg-error-phone"></div>

                                </div>
                                <div class="log_set">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="********">

                                    <div class="error_msg" id="reg-error-password"></div>

                                </div>
                                <div class="log_set">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" placeholder="********">
                                    <div class="error_msg" id="reg-error-password_confirmation"></div>

                                </div>

                                <button type="submit" class="submit_frm" >Sign Up</button>
                            </form>
                            <ul class="footer_link">
                                <li class="link_left"><a href="#0" class="exist-user" >Already
                                        registered? <span>Sign In</span></a></li>

                            </ul>
                        </div>


                        <div class="log_box" id="otp-verification" style="display: none;">
                            <img src="{{ asset('assets/front/img/logo.png') }}" class="img-responsive">
                            <h2>Enter OTP</h2>
                            <label>We sent a 4 digit OTP to your <span id="response-phone"></span> . Enter this OTP here to verify your account.</label>
                        
                            <form id="otp-form"  method="post" action="{{ route('otpVerify') }}">
                                <div class="log_set">
                                    <label>OTP</label>
                                    <input type="hidden" name="user_id" id="user_id">
                                            
                                             <input type="hidden" name="login_type" id="login_type">
                                            <input type="text" name="otp" id="verify_otp" placeholder="">
                                            <div class="float-right">
                                                <a href="javascript:;" class="forgot-boq" id="resend_otp">Resend OTP</a>
                                                </div>
                                            <div class="error_msg" id="otp-error-otp"></div>
                                </div>
                                <button type="submit" class="submit_frm">Verify</button>
                              
                            </form>
                        </div>

                        
                        <div class="log_box" id="signin-otp" style="display: none;">
                            <img src="{{ asset('assets/front/img/logo.png') }}" class="img-responsive">
                            <div class="">

                                <form id="login-otp-form" action="{{ route('loginWithOtp') }}" method="post" class="log_form">
                                    <input type="hidden" class="target" name="intended" value="{{ url()->previous() }}">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 float-left">
                                            <div class="log_set">

                                                <input type="text" name="phone" placeholder="Enter Mobile Number">

                                                <div class="error_msg" id="error-phone"></div>

                                            </div>

                                        </div>

                                        <div class="col-lg-6 col-md-6 float-left">
                                        </div>
                                        <div class="col-lg-6 col-md-6 float-left">
                                            <!--<a href="#0" class="forgot-boq reset-psw">Forgot Password?</a>-->
                                        </div>

                                        <div class="col-lg-12 col-md-12 float-left">

                                            <button type="submit" class="login-continue">Continue</button>
                                        </div>

                                    </div>
                                </form>
                                <ul class="footer_link">
                                    <li class="link_left"><a href="#0" class="new-user">New to Zawaa?
                                            <span>Create an account</span></a></li>
                                    <li class="link_right"></li>
                                </ul>
                            </div>

                        </div>

                        <div class="log_box" id="reset-password" style="display: none;">
                            <img src="{{ asset('assets/front/img/logo.png') }}" class="img-responsive">
                            <h2>Reset password</h2>
                            <p>Enter your username or email to reset your password.<br>
                                You will receive an email with instructions on how to reset your password.</p>
                            <div class="alert success-message" role="alert" style="display:none;">Password Reset Request has
                                been sent. Please check your mail</div>
                            <div class="alert error-message" role="alert" style="display:none;"></div>
                            <form class="log_form"  id="reset-password-form" method="POST" action="{{ route('password.email') }}">
                                <input type="hidden" name="_token" value="">
                                <div class="log_set">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Enter Email Address"
                                    required>
                                    <div class="error_msg" id="reset-error-email"></div>

                                    <div id="loader-aj" style="display: none"></div>
                                        {{-- Please wait<img width="15%" src="{{ asset('assets/front/loading.gif') }}"> --}}
                                        <div class="error error_msg" id="reset-success-message"></div>
                                        <div class="error error_msg" id="reset-password-message">

                                        </div>
                                </div>
                                <button type="submit" class="submit_frm  login-reset">Reset Password</button>
                            </form>
                            <ul class="footer_link">
                                <li class="link_left"><a href="#0" class="exist-user"><span>Sign In</span></a></li>
                                <li class="link_right"><a href="#0" class="new-user"><span>Sign Up</span></a></li>
                            </ul>
                        </div>


                    </div>
                </div>
            </section>


        </section>
    </section>
@endsection


