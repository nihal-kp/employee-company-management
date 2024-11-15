<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Reset Password | Zawaa</title>
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/front/img/favi-icon.png') }}"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="" />
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
        <form class="log_form" id="reset-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="col-md-12 left">
                <div class="log_set">
                    <label>Email </label>
                  
                    <input type="text" name="email" value="{{ $email ?? old('email') }}"
                        placeholder="Enter email">

                    <div class="error error_msg" id="reset-error-email"></div>
                </div>

            </div>
            
            <div class="col-md-6 left">
                <div class="log_set">
                    <label>Enter Password </label>
                    
                    <input type="password" name="password" placeholder="****">
                    <div class="error error_msg" id="reset-error-password"></div>
                </div>
                
            </div>
            
            <div class="col-md-6 left">
                <div class="log_set">
                    <label>Confirm Password </label>
                    
                    <input type="password" name="password_confirmation" placeholder="****">
                    <div class="error error_msg" id="reset-error-password_confirmation"></div>
                </div>

            </div>
      
            <div class="col-lg-12 col-md-12 float-left">
                <button type="submit" class="submit_frm">Reset Password</button>
            </div>

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
<a href="about.php" class="ftr-link">About Us</a>
<a href="index.php" class="ftr-link">How to Make</a>         
<a href="index.php" class="ftr-link">Opportunity</a>     
<a href="terms-conditions.php" class="ftr-link">Terms & Conditions</a>    
<a href="privacy-policy.php" class="ftr-link">Privacy Policy</a>    
</div>
</div>
<div class="col-md-3">
<h4>Need Help</h4>	
<div class="ftr-strip"><span></span></div>
<div class="ftr-navigations">
<a href="faq.php" class="ftr-link">Help & FAQ</a>
<a href="contactus.php" class="ftr-link">Customer Support</a>
<a href="dashboard.php" class="ftr-link">Account</a>
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
    $('#reset-form').on('submit', function(e) {

        e.preventDefault();

        $this = $(this);

        // signup();


        $.ajax({

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            type: 'POST',

            dataType: 'JSON',

            data: $this.serialize(),

            url: $this.attr('action'),


            success: function(response) {


                if (response.intended != null) {
                    window.location.href = response.intended;
                } else {
                    window.location.href = '{{ route('login') }}';
                }


            },
            complete: function() {
                $('#loader-aj').hide();
            },

            error: function(response) {

                // console.log(response);


                // $('.error').html('').hide();
                $.each(response.responseJSON.errors, (key, value) => {

                    $('#reset-error-' + key).html(value).show();
                });



            }

        });

    });
</script>

</body>
</html>
