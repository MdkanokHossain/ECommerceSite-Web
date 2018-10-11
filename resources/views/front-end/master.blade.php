
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title> @yield('title')</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Grocery Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>


    <!--//tags -->
    <link href="{{asset('/')}}front-end/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('/')}}front-end/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('/')}}front-end/css/font-awesome.css" rel="stylesheet">

    <!--pop-up-box-->
    <link href="{{asset('/')}}front-end/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
    <!--//pop-up-box-->

    <!-- price range -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}front-end/css/jquery-ui1.css">

    <link rel="stylesheet" href="{{asset('/')}}front-end/css/flexslider.css" type="text/css" media="screen" />


    {{--product details css/flexslider link--}}

    {{--<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />--}}
    {{--product details css/flexslider link--}}



    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">


</head>

<body>
<!-- top-header -->
@include('front-end.includes.header')
<!-- //Modal2 -->
<!-- //signup Model -->

<!-- //header-bot -->


<!-- navigation -->
@include('front-end.includes.menu')
<!-- //navigation -->

<!-- banner -->

<!-- //banner -->


<!-- top Products -->
@yield('body')
<!-- //special offers -->


<!-- newsletter footer-top -->

@include('front-end.includes.footer')
<!-- //copyright -->


<!-- js-files -->
<!-- jquery -->
<script src="{{asset('/')}}front-end/js/jquery-2.1.4.min.js"></script>
<!-- //jquery -->

<!-- popup modal (for signin & signup)-->
<script src="{{asset('/')}}front-end/js/jquery.magnific-popup.js"></script>
<script>
    $(document).ready(function () {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<!-- Large modal -->
<!-- <script>
    $('#').modal('show');
</script> -->
<!-- //popup modal (for signin & signup)-->

<!-- cart-js -->
<script src="{{asset('/')}}front-end/js/minicart.js"></script>
<script>
    paypalm.minicartk.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

    paypalm.minicartk.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });
</script>


<!-- product details password-script -->

<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>

<!-- product details password-script -->




<!-- //cart-js -->

<!-- price range (top products) -->
<script src="{{asset('/')}}front-end/js/jquery-ui.js"></script>

<script>
    //<![CDATA[
    $(window).load(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 9000,
            values: [50, 6000],
            slide: function (event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

    }); //]]>
</script>
<!-- //price range (top products) -->

<!-- flexisel (for special offers) -->

{{--<script src="js/jquery.flexisel.js"></script>--}}
<script>
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 3,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 2
                }
            }
        });

    });
</script>



<!-- smoothscroll -->
<script src="{{asset('/')}}front-end/js/SmoothScroll.min.js"></script>
<!-- //smoothscroll -->

<!-- start-smooth-scrolling -->
<script src="{{asset('/')}}front-end/js/move-top.js"></script>
<script src="{{asset('/')}}front-end/js/easing.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */
        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->

<!-- imagezoom -->
<script src="{{asset('/')}}front-end/js/imagezoom.js"></script>
<!-- //imagezoom -->


<!-- FlexSlider -->
<script src="{{asset('/')}}front-end/js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!-- //FlexSlider-->
<script src="{{asset('/')}}front-end/js/jquery.flexisel.js"></script>

<!-- for bootstrap working -->
<script src="{{asset('/')}}front-end/js/bootstrap.js"></script>

<!-- //for bootstrap working -->
<!-- //js-files -->
<script>

    $('#emailAddress').blur(function () {
        var data = $(this).val();
        $.ajax({
            url: 'http://localhost:8080/full_stack_3/public/customer-email-check/'+data,
            method: 'GET',
            dataType: 'JSON',
            success: function (data) {
                   $('#res').html(data);
                   if (data == 'Email Address already exists') {
                       document.getElementById('submitBtn').disabled = true;
                   } else {
                       document.getElementById('submitBtn').disabled = false;
                   }
            }
        });

    });

</script>

</body>

</html>