<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="assets/ico/favicon.ico">

<title>Romarate Online Water Billing System</title>

<!-- Bootstrap core CSS -->

<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/modernizr.js') }}"></script>
</head>
<body>
     <!-- Fixed navbar -->
     <div class="navbar navbar-default navbar-fixed-top" role="navigation">
     <div class="container">
       <div class="navbar-header">
         <a class="navbar-brand" href="http://lowbsystem.com"> <img src="assets/img/water.png" class="img-responsive" style="width:20px;"></a>
       </div>
       <div class="navbar-header">
         <a class="navbar-brand" href="http://lowbsystem.com">[ Romarate Water Billing System ]</a>
       </div>
       <div class="navbar-collapse collapse navbar-right">
         <ul class="nav navbar-nav">
           <li><a href="#headerwrap">HOME</a></li>
           <li><a href="#about">ABOUT</a></li>
           <li><a href="#history">HISTORY</a></li>
           <li><a href="#contact">CONTACT</a></li>
           <li><a href="/consumer">LOGIN</a></li>
           <li><a href="/apply">REGISTER</a></li>
         </ul>
       </div><!--/.nav-collapse -->
     </div>
   </div>
   @yield('content')
   
    <div id="footerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4" align="center">
                <img src="assets/img/water.png" class="img-responsive" style="width:100px;">
                <h4 style="color:#fff;">Romarate Water Billing System</h4>
                </div>
                <div class="col-lg-4">
                    <h4>Social Links</h4>
                    <div class="hline-w"></div>
                    <p>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </p>
                </div>
                <div class="col-lg-4">
                    <h4>Contact Us</h4>
                    <div class="hline-w"></div>
                    <p>Phone: <strong>000-000-000</strong></p>
                    <p>Email: <strong>info@rowbs.com</strong></p>
                    <p>
                        Romarate, Aurora<br/>
                        Zamboanga Del Sur<br/>
                        Philippines<br/>
                    </p>
                </div>
            
            </div><! --/row
        </div><! --/container -->
    </div><! --/footerwrap --> -->
    
   <!-- Bootstrap core JavaScript
   ================================================== -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
   <script src="assets/js/retina-1.1.0.js"></script>
   <script src="assets/js/jquery.hoverdir.js"></script>
   <script src="assets/js/jquery.hoverex.min.js"></script>
   <script src="assets/js/jquery.prettyPhoto.js"></script>
     <script src="assets/js/jquery.isotope.min.js"></script>
     <script src="assets/js/custom.js"></script>


<script>
    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
        ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
            scrollTop: target.offset().top
            }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
                return false;
            } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
            };
            });
        }
        }
    });
</script>
</body>
</html>
