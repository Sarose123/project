<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel='stylesheet' id='woocommerce-layout-css'  href='{{asset("css/custom/woocommerce-layout.css")}}' type='text/css' media='all' /> --}}
    <link rel='stylesheet'  href='{{asset("css/custom/style.css")}}' type='text/css' media='all' />
    <link rel='stylesheet'  href='{{asset("css/custom/cart125b.css")}}' type='text/css' media='all' />
    <link rel='stylesheet'  href='{{asset("css/custom/social-login125b.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' id='pass-field-css-css'  href='{{asset("css/custom/passfield.min125b.css")}}' type='text/css' media='all' />
    <link rel='stylesheet' id='alert-css-css'  href='{{asset("css/custom/sweetalert125b.css")}}' type='text/css' media='all' />
    <link rel='stylesheet'  href='{{asset("css/bootstrap.min.css")}}' type='text/css' media='all' />
    <title>Document</title>
</head>
<body>
    @include('inc.navbar')
    @yield('content')
    @include('inc.footer')

    
    
    
    {{-- <script type='text/javascript' src='js/custom/cart125b.js'></script> --}}
    <script type='text/javascript' src='js/custom/sweetalert.min125b.js'></script>
    {{-- <script type='text/javascript' src='js/custom/social-login125b.js'></script> --}}
    <script type='text/javascript' src='js/custom/passfield.min125b.js'></script>
    
    
    <script type='text/javascript' src='js/custom/jquery.js'></script>
    <!--  <script type='text/javascript' src='assets/js/jquery/jquery-migrate.min.js'></script> -->
    <script>
        window.wc_ga_pro = {};
    
        window.wc_ga_pro.available_gateways = {"paypal":"PayPal"};
    
    // interpolate json by replacing placeholders with variables
    window.wc_ga_pro.interpolate_json = function( object, variables ) {
    
        if ( ! variables ) {
            return object;
        }
    
        var j = JSON.stringify( object );
    
        for ( var k in variables ) {
            j = j.split( '{$' + k + '}' ).join( variables[ k ] );
        }
    
        return JSON.parse( j );
    };
    
    // return the title for a payment gateway
    window.wc_ga_pro.get_payment_method_title = function( payment_method ) {
        return window.wc_ga_pro.available_gateways[ payment_method ] || payment_method;
    };
    
    // check if an email is valid
    window.wc_ga_pro.is_valid_email = function( email ) {
      return /[^\s@]+@[^\s@]+\.[^\s@]+/.test( email );
    };
    </script>
    
    <!-- WooCommerce JavaScript -->
    <script type="text/javascript">
        jQuery(function($) { 
    
            ga( 'send', 'pageview' );
    
            ga( 'send', {"hitType":"event","eventCategory":"Homepage","eventAction":"viewed homepage","eventLabel":null,"eventValue":null,"nonInteraction":true} );
    
        });
    </script>
    
    <!--SCRIPTS-->
    <script>
    
        var Products = [{"name":"Articles (professional writers) $0.80 per 100 words","val":"0.80","notes":false,"price_type":1,"service":false,"istooltip":false,"services":["24 Hours Delivery ($0.8 extra per 100 words)"],"tooltipmsg":""},{"name":"24 Hours Delivery ($0.8 extra per 100 words)","val":"0.80","notes":false,"price_type":1,"service":true,"istooltip":true,"services":[],"tooltipmsg":"This is because we need to deliver it faster"},{"name":"Authority Content - Native English writers only ($3 per 100 words)","val":"3","notes":false,"price_type":1,"service":false,"istooltip":true,"services":null,"tooltipmsg":"We will submit the PR to PRbuzz"},{"name":"Article to Video ($5 per video)","val":"5","notes":true,"price_type":0,"service":false,"istooltip":false,"services":null,"tooltipmsg":""},{"name":"Press Release ($1 per 100 words)","val":"1","notes":false,"price_type":1,"service":false,"istooltip":false,"services":["PR Submission to PRbuzz.com"],"tooltipmsg":""},{"name":"PR Submission to PRbuzz.com","val":"5","notes":false,"price_type":0,"service":true,"istooltip":true,"services":[],"tooltipmsg":"Get Online Visilbility (and links) for your Press Release, Website and Business with PRBuzz"}];
        
    </script>
    
    <script src={{asset("js/custom/jquery.js")}}></script>
    <script src={{asset("js/custom/common.js")}}></script> 
</body>
</html>