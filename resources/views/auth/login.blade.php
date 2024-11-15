<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Login | Sign Up | {{ config('app.name') }}</title>
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/front/img/favi-icon.png') }}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{{ $settings->where('title','meta_description')->first()->value}}" />
<meta name="author" content="TNM Online Solutions Pvt Ltd" />
<meta name="robots" content="noindex,nofollow" />
<meta property="og:description" content="">
<meta property="og:image"content="{{asset('assets/front/img/logo.png') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/grid.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style-menu.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.search.css') }}" />
<link rel='stylesheet' href="{{ asset('assets/front/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/mobile.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/mobile.menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/toastr.css') }}" />
</head>
<body>
    
<div class="main-header">
<section id="panel-one">
<div class="container-width">
<div class="tel-b2b">
<a href="tel:+91 804 8070 318" class="support"> <img src="{{ asset('assets/front/img/support.png') }}">+91 804 8070 318</a>  
<a href="" class="mail" style="border-right:none;"> <img src="{{ asset('assets/front/img/mail.png') }}">info@zawaafoods.com</a> 
</div>  
</div>  
</section>



<a href="{{route('welcome')}}" class="logo-b2b"><img src="{{ asset('assets/front/img/logo.png') }}"></a>

<section id="cart-bg" class="pt35">

<div class="container">

<div class="b2b-bg">
    
    
    <div class="log_box" id="signin">

        <form class="log_form" id="login-form" method="POST" action="{{ route('login') }}">
            <input type="hidden" class="target" name="intended"
                value="{{ url()->previous() }}">
            <input type="hidden" name="type" value="1">
            <div class="b2b-login">
            <h2>Welcome to <span>B2C Login</span></h2>  
            <p>Get access to your Orders,</p>
            </div>
            
            
            <div class="col-md-6 left">
            <div class="log_set">
                <label>Email or Phone Number</label>
                <input id="email1" type="text" name="email">
                <div class="error_msg error" id="error-email"></div>
            </div>
            </div>

            <div class="col-md-6 left">
            <div class="log_set">
                <label>Password</label>
                <input id="password1" type="password" name="password">
                <div class="error_msg error" id="error-password"></div>
            </div>
            </div>

<div style="float:left; width:100%;">

            <div class="col-md-6 left">
            <div class="log_set">
            <label for="keep_signin" class="option remember">
            <input type="checkbox" name="remember" id="keep_signin" value="remember">
            <span class="checkbox"></span> Keep me signed in
            </label>
            </div>
            </div>
            
            <div class="col-md-6 left">
            <div class="log_set h47">
            <a href="#0" class="reset-psw b2b-psw">Forgot Password?</a>
            </div>	
            </div>
            </div>
            
            <div class="col-md-12 left btn-logins">
            <button type="submit" class="submit_frm">Login</button>
            </div>
            
            <div class="col-md-6 left">
            <a href="#0" class="new-user submit_frm_reg cr-at">Create an account</a>
            </div>                  
            
            <div class="col-md-6 left">
            <button type="button" class="otp-req signin_otp">Request OTP</button>
            </div>
            
        </form>
    </div>
                                
                            
                            
    <div class="log_box" id="signup">
    
        <form class="log_form" id="signup-form" method="POST" action="{{ route('register') }}">
            <input type="hidden" class="target" name="intended"
                value="{{ url()->previous() }}">
            <input type="hidden" name="type" value="1">
            <div class="b2b-login">
            <h2>B2C <span>Registration</span></h2> 
            <p>Registering to this website, you accept our Terms and Conditions and our Privacy Policy</p> 
            </div>

            <div class="col-md-6 left">
            <div class="log_set">
                <div class="tt-b2b">Name <span class="frm-red">*</span> </div>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe">
                <div class="error_msg" id="reg-error-name"></div>
            </div>
            </div>
            
            <div class="col-md-6 left">
            <div class="log_set">
                <div class="tt-b2b">Email ID <span class="frm-red">*</span> </div>
                <input type="text" name="email" value="{{ old('email') }}"
                    placeholder="">
                <div class="error_msg" id="reg-error-email"></div>
            </div>
            </div>
            
            <div class="col-md-6 left">
            <div class="log_set">
                <div class="tt-b2b">Phone Number<span class="frm-red">*</span></div>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="">
                <div class="error_msg" id="reg-error-phone"></div>
            </div>
            </div>
            
            <div class="col-md-6 left">
            <div class="log_set">
                <div class="tt-b2b">Password <span class="frm-red">*</span></div>
                <input type="password" name="password" placeholder="">
                <div class="error_msg" id="reg-error-password"></div>
            </div>
            </div>
            
            <div class="col-md-6 left">
            <div class="log_set">
                <div class="tt-b2b">Password Confirmation <span class="frm-red">*</span></div>
                <input type="password" name="password_confirmation" placeholder="">
                <div class="error_msg" id="reg-error-password_confirmation"></div>
            </div>
            </div>

            <div class="col-md-12 left" style="display:none;">
            <div class="log_set">
            <label for="keep_signin" class="option remember">
            <input type="checkbox" name="remember" id="keep_signin2" value="remember">
            <span class="checkbox"></span> Remember
            </label>
            </div>
            </div>
            
            <div class="col-md-12 left">
            <button type="submit" class="submit_frm">Sign Up</button>	
            </div>
            
            <ul class="footer_link" style="margin-bottom:0px;">
                <li class="link_left"><a href="#0" class="exist-user">Already registered? <span>Sign In</span></a></li>
            </ul>

        </form>
    </div>


    <div class="log_box" id="otp-verification">
        <form id="otp-form"  method="post" action="{{ route('otpVerify') }}" class="log_form">
            <input type="hidden" name="user_id" id="user_id">         
            <input type="hidden" name="login_type" id="login_type">
            <input type="hidden" class="target" name="intended" value="{{ route('welcome') }}">
            <div class="b2b-login">
                <h2>Enter OTP</h2>
                <p>We sent a 4 digit OTP to your <span id="response-phone"></span>. Enter this OTP here to verify your account.</p> 
            </div>
        
            <div class="">
                <div class="col-lg-12 col-md-12 float-left">
                <div class="log_set">
                <label>OTP</label>
                <input type="text" name="otp" id="verify_otp" placeholder="" class="numbers">
                <div class="float-right">
                    <a href="javascript:;" class="forgot-boq" id="resend_otp">Resend OTP</a>
                </div>
                <p id="otp-msgshow"></p>
                <div class="error_msg" id="otp-error-otp"></div>
                <span id="response-verification_otp"></span>
                </div>
                </div>
            
                <div class="col-lg-6 col-md-6 float-left">
                </div>
            
            
                <div class="col-lg-12 col-md-12 float-left">
                
                <button type="submit" class="submit_frm">Verify</button>
                </div>
            
            </div>
        </form>
    </div>

                        
    <div class="log_box" id="signin-otp" style="display: none;">
        <div class="">

            <form id="login-otp-form" action="{{ route('loginWithOtp') }}" method="post" class="log_form">
                <input type="hidden" class="target" name="intended" value="{{ url()->previous() }}">
                <input type="hidden" name="type" value="1">
                <div class="b2b-login">
                <h2>Request <span>OTP</span></h2> 
                <p>Please enter your mobile number</p> 
                </div>
                <div class="">
                    <div class="col-lg-12 col-md-12 float-left">
                        <div class="log_set">

                            <input type="text" name="phone" placeholder="Enter Mobile Number">
                            <div class="error_msg error" id="error-phone"></div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 float-left">
                    </div>

                    <div class="col-lg-12 col-md-12 float-left">

                        <button type="submit" class="login-continue">Continue</button>
                    </div>

                </div>
            </form>
            <ul class="footer_link">
              <li class="link_left"><a href="#0" class="exist-user" style="margin-top: 0px;">
               Already registered?  <span>Sign In</span></a></li>
              <li class="link_right"></li>
            </ul>
        </div>
    </div>


    <div class="log_box" id="reset-password">
        
        <form class="log_form"  id="reset-password-form" method="POST" action="{{ route('password.email') }}">
            <input type="hidden" name="_token" value="">
            <input type="hidden" name="type" value="1">
            <div class="b2b-login">
            <h2>Reset B2C <span>Password</span></h2> 
            <p>Enter your email ID to reset your password.<br>You will receive an email to reset your password.</p> 
            <div class="alert success-message" role="alert" style="display:none;">Password Reset Request has
            been sent. Please check your mail</div>
            <div class="alert error-message" role="alert" style="display:none;"></div>
            </div>
            
            <div class="col-md-12 left">
            <div class="log_set">
                <div class="tt-b2b">Enter Email</div>
                <input type="text" name="email" placeholder="Enter Email ID">
                {{-- <div class="error_msg" id="reset-error-email"></div> --}}
        
                <div id="loader-aj" style="display: none"></div>
                    {{-- Please wait<img width="15%" src="{{ asset('assets/front/loading.gif') }}"> --}}
                    <div class="success_msg" id="reset-password-success" style="display: none"></div>
                <div class="error error_msg" id="reset-password-error" style="display: none"></div>

            </div>
            </div>
            
            <div class="col-md-12 left">
            <button type="submit" class="submit_frm  login-reset">Reset Password</button>
            </div>
            <ul class="footer_link">
                <li class="link_left link-50"><a href="#0" class="exist-user"><span>Already registered? Sign In</a></li>
                <li class="link_right link-50"><a href="#0" class="new-user"><span>New Member Create Account</span></a></li>
            </ul>    
        </form>
    </div>


</div>
</div>
</section>


<section id="footer">
<div class="container">
<div class="row">
<div class="col-md-3">
<h4>Quick Links</h4>	
<div class="ftr-strip"><span></span></div>
<div class="ftr-navigations">
<a href="{{route('welcome')}}" class="ftr-link">Home</a> 
<a href="{{route('about')}}" class="ftr-link">About Us</a>
<a href="{{route('joinOurTeam')}}" class="ftr-link">Opportunity</a>     
@foreach($informations as $key => $value)
    <a href="{{ route('information.show',$value->slug)}}" class="ftr-link">{{ $value->title }}</a>
@endforeach
</div>
</div>
<div class="col-md-3">
<h4>Need Help</h4>	
<div class="ftr-strip"><span></span></div>
<div class="ftr-navigations">
<a href="{{route('faq')}}" class="ftr-link">Help & FAQ</a>
<a href="{{route('contact')}}" class="ftr-link">Customer Support</a>
<a href="{{route('account.index')}}" class="ftr-link">Account</a>
</div>
</div>
<div class="col-md-3">
<h4>We're Always Here To Help</h4>	
<div class="ftr-strip"><span></span></div>
<div class="ftr-navigations">
<p>Reach out to us through any <br> of these support channels</p>
<div class="email-support mb-bottom">
<img src="{{ asset('assets/front/img/help-center.png') }}">	
<h5>Email Support</h5>
<h6>
<a href="" class="es">info@zawaafoods.com</a>
</h6>
</div>
<div class="email-support">
<img src="{{ asset('assets/front/img/call.png') }}">	
<h5>Support Number</h5>
<h6>
<a href="" class="es">08048070318</a>
</h6>
</div>
</div>
</div>
<div class="col-md-3">
<h4>Payment Options</h4>	
<div class="ftr-strip"><span></span></div>
<div class="payment-card"><img src="{{ asset('assets/front/img/payment.png') }}"></div>
<div class="follow-sec">
<h4>Follow Us</h4>	
<div class="ftr-strip"><span></span></div>	
<div class="social-field">
<a href=""><img src="{{ asset('assets/front/img/facebook.png') }}"></a>	
<a href=""><img src="{{ asset('assets/front/img/instagram.png') }}"></a>	
<a href=""><img src="{{ asset('assets/front/img/twitter.png') }}"></a>	
<div class="tag-has">#Zawaa_foods </div>
</div>
</div>
</div>
</div>	
</div>	
<div class="copyright">
© Copyright {{ date('Y') }} Zawaa. All Rights Reserved Powered by <a class="tnm" href="#">TNM Online Solutions</a>	
</div>
</section>


</div>


<script src="{{ asset('assets/front/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/front/js/script.search.js') }}"></script>
<script src="{{ asset('assets/front/js/script-address.js') }}"></script>
<script src="{{ asset('assets/front/js/script.prdetails.js') }}"></script>
<script src="{{ asset('assets/front/js/xzoom.min.js') }}"></script>
<script src="{{ asset('assets/front/js/script.zoom.js') }}"></script>
<script src="{{ asset('assets/front/js/script.mobile.menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/aos.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/owl.carousel.js') }}"></script>
<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js'></script>
<script type="text/javascript" src="{{ asset('assets/front/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/front/js/toastr2.min.js')}}"></script>


<script type="text/javascript">

    // signin();
    $("#signin").css("display", "inline-block").siblings().css("display", "none");

  $(".new-user").click(function() {
    signup();
  });

  $(".exist-user").click(function() {
    signin();
  });

  $(".reset-psw").click(function() {
    resetPassword();
  });

  $(".reset_btn").click(function() {
    resetOtp();
  });
      $(".signin_otp").click(function() {
                signin_otp();
            });

  $("#sign_btn").click(function() {
    otp();
  });

  function signin() {
    $("#signin").css("display", "inline-block").siblings().css("display", "none");
    $("html, body").animate({scrollTop: 0}, 1000);
  }

  function signup() {
    $("#signup").css("display", "inline-block").siblings().css("display", "none");
    $("html, body").animate({scrollTop: 0}, 1000);
  }

  function resetPassword() {
    $("#reset-password").css("display", "inline-block").siblings().css("display", "none");
    $("html, body").animate({scrollTop: 0}, 1000);
  }

  function otp() {
    $("#otp-verification").css("display", "inline-block").siblings().css("display", "none");
    $("html, body").animate({scrollTop: 0}, 1000);
  }

  function resetOtp() {
    $("#otp-verification2").css("display", "inline-block").siblings().css("display", "none");
    $("html, body").animate({scrollTop: 0}, 1000);

  }
  
  function signin_otp() {
                $("#signin-otp").css("display", "inline-block").siblings().css("display", "none");
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            }
    
  function otpVerification() {
                $("#otp-verification").css("display", "inline-block").siblings().css("display", "none");
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            }

  function resetOtp() {
                $("#otp-verification2").css("display", "inline-block").siblings().css("display", "none");
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);

            }

</script>


<script type="text/javascript">
    $('#login-form').on('submit', function(e) {
        
      e.preventDefault();
      $this = $(this);
      $('#login-form').find('button').attr('disabled', true);

      $.ajax({

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          type: 'POST',

          dataType: 'JSON',

          data: $this.serialize(),

          url: $this.attr('action'),

          success: function(response) {

              // loginCheck();
              $('#login-form').find('button').attr('disabled', false);

              if (response.error) {
                  $('#error-email').html(response.error).show();
                  $('#login-form').trigger('reset');
              } else {
                  if (response.otp_verification_status != 1) {
                      $('#response-phone').html(response.phone);
                      $('#user_id').val(response.customer);
                      $('.error_msg').hide();
                    //   $('#response-verification_otp').html('The OTP to log in to your account is ' + response.otp);
                      otpVerification();
                      $('meta[name="csrf-token"]').attr('content', response.csrf);

                  } else {
                      if (response.intended != null) {
                          window.location.href = response.intended;
                      } else {
                          location.reload();
                      }
                  }
              }



          },

          error: function(response) {
            //   console.log(response);
              $('meta[name="csrf-token"]').attr('content', response.responseJSON.errors.csrf);
              $('.error').html('').hide();
              $('#login-form').find('button').attr('disabled', false);

              $.each(response.responseJSON.errors, function(key, value) {

                  $('#error-' + key).html(value).show();

              });

          }

      });

    });
    
    
    $('#signup-form').on('submit', function(e) {

      e.preventDefault();

      $this = $(this);


      $('#signup-form').find('button').attr('disabled', true);


      $.ajax({

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          type: 'POST',

          dataType: 'JSON',

          data: $this.serialize(),

          url: $this.attr('action'),
          
                             beforeSend: function() {
             $('#signup-spinner-loader').show();
        },

          success: function(response) {


              otpVerification();
              $('#login_type').val(response.type);
             // $('#otp-show').html('Your OTP is ' + response.otp);
            //   $('#response-verification_otp').html('The OTP to log in to your account is ' + response.otp);
              $('#user_id').val(response.customer);
              $('#response-phone').html(response.phone);

          },
                 complete: function() {
              $('#signup-spinner-loader').hide();
          },

          error: function(response) {

              // console.log(response);

              $('.error_msg').html('').hide();
               $('#signup-spinner-loader').hide();

              $('#signup-form').find('button').attr('disabled', false);

              $.each(response.responseJSON.errors, function(key, value) {

                  $('#reg-error-' + key).html(value).show();

              });

          }

      });

    })
    
    
    $('#login-otp-form').on('submit', function(e) {

      e.preventDefault();


      $this = $(this);

      $('#login-otp-form').find('button').attr('disabled', true);

      $.ajax({

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          type: 'POST',

          dataType: 'JSON',

          data: $this.serialize(),

          url: $this.attr('action'),

          success: function(response) {


              $('#login-otp-form').find('button').attr('disabled', false);

              if (response.otp_verification_status != 0) {
                  otp();
                  $('#login_type').val(response.type);
                  $('#response-phone').html(response.phone);
                //   $('#response-verification_otp').html('The OTP to log in to your account is ' + response.verification_otp);
                  $('#user_id').val(response.user);
                  $('.error').hide();


              } else {
                  if (response.intended != null) {
                      window.location.href = response.intended;
                  } else {
                      location.reload();
                  }
              }

          },

          error: function(response) {
              $('.error').html('').hide();
              $('#login-otp-form').find('button').attr('disabled', false);
              if (response.responseJSON.error) {
                  $('#error-phone').html(response.responseJSON.error).show();
              } else {

                  $.each(response.responseJSON.errors, function(key, value) {

                      $('#error-' + key).html(value).show();

                  });
              }

          }

      });

    })
  
  
    $('#otp-form').on('submit', function(e) {
      e.preventDefault();
      $this = $(this);

    //   console.log('here');
      $('#otp-form').find('button').attr('disabled', true);

      $.ajax({

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          type: 'POST',

          dataType: 'JSON',

          data: $this.serialize(),

          url: $this.attr('action'),

          success: function(response) {

              $('#login-form').find('button').attr('disabled', false);


              if (response.error) {
                  $('#otp-error-otp').html(response.error).show();
                  $('#login-form').trigger('reset');
              } 
              else if(response.login == 'failed') {
                // toastr.warning(response.message2, response.message1, { positionClass: toastr_pos, containerId: toastr_pos });  
                window.location.href = response.intended;
              }
              else {
                  if (response.intended != null) {
                      window.location.href = response.intended;
                  } else {
                      location.reload();
                  }
              }

          },

          error: function(response) {
            //   console.log(response);
              $('.error_msg').html('').hide();
              $('#otp-form').find('button').attr('disabled', false);

              $.each(response.responseJSON.errors, function(key, value) {

                  $('#otp-error-' + key).html(value).show();

              });

          }

      });

    })
    
    
    $('#resend_otp').on('click', function(e) {

      e.preventDefault();


      $this = $(this);


      let user_id = $('#user_id').val();

      $.ajax({

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          type: 'POST',

          dataType: 'JSON',

          data: {
              user_id: user_id,
          },

          url: "{{ route('resendOtp') }}",

          success: function(response) {
            //   console.log(response.customer);

            //   $('#otp-show').html('Your OTP is ' + response.otp);
              
            //  $('#otp-msgshow').html('successfully send OTP.Your OTP is '           +response.otp+ ' Please don\'t share your OTP with anyone');
             $('#response-verification_otp').hide()
              $('#otp-msgshow').show();
                 setTimeout(function(){

                $('#otp-msgshow').hide();

                    // location.reload();

                },4000);
              $('#user_id').val(response.customer);

          },

          error: function(response) {
            //   console.log(response.error);

              $('.error').html('').hide();

              $('#signup-form').find('button').attr('disabled', false);

              $.each(response.responseJSON.errors, function(key, value) {

                  $('#reg-error-' + key).html(value).show();

              });

          }

      });
      
    });
    
    
    $('#reset-password-form').on('submit', function(e) {
      e.preventDefault();
      $('#reset-password-success').hide();  
      $('#reset-password-error').hide();
      $this = $(this);
      $('#loader-aj').html('Please wait')
      $('#loader-aj').show();
      $('#signup-form').find('button').attr('disabled', true);

      $.ajax({

          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          type: 'POST',

          dataType: 'JSON',

          data: $this.serialize(),

          url: $this.attr('action'),


          success: function(response) {
            //console.log(response.status);
            if (response.status) {
                $('#reset-password-success').html(response.status).show();
            }
            else {
                $('#reset-password-error').html(response.error).show();
            }

          },
          complete: function() {
              $('#loader-aj').hide();
          },

          error: function(response) {

            $.each(response.responseJSON.errors, function(key, value) {

                $('#reset-password-error').html(value).show();

            });

          }

      });

    });
  
</script>


<script>
    var toastr_pos = null;
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
      // true for mobile device
       toastr_pos = 'toast-top-right';
    }else{
      // false for not mobile device
      toastr_pos = 'toast-top-right';
    }
</script>

</body>
</html>