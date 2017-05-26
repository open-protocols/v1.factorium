<!DOCTYPE Html>
<!--[if IE 8]> <Html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <Html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <Html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Estate Baron">
    {{-- <meta name="description" content="Invest in top Australian property developments of your choice with as little as $100. Australia's only platform open to everyone not just wholesale investors."> --}}
    <meta name="copyright" content="Estate Baron Crowdinvest Pty Ltd copyright (c) 2016">
    @if(App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->title_text != '')
    <title>{!! App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->title_text !!}</title>
    @else
    <title>Best way to invest in Australian Real Estate Projects</title>
    @endif
    @if($siteConfigMedia=App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->siteconfigmedia)
    @if($faviconImg=$siteConfigMedia->where('type', 'favicon_image_url')->first())
    <link rel="shortcut icon" href="{{asset($faviconImg->path)}}?v=<?php echo filemtime($faviconImg->path); ?>" type="image/x-icon">
    @else
    <link rel="shortcut icon" href="/favicon.png?v=<?php echo filemtime('favicon.png'); ?>" type="image/x-icon">
    @endif
    @else
    <link rel="shortcut icon" href="/favicon.png?v=<?php echo filemtime('favicon.png'); ?>" type="image/x-icon">
    @endif
    <!-- Open Graphic -->
    
    <!-- META DATA -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

    @section('meta-section')
    @show
    
    @yield('meta')    

    @if (Config::get('analytics.gtm.enable'))
    @include('partials.gtm-script')
    @endif

    <!-- Bootstrap -->
    {!! Html::style('/css/bootstrap.min.css') !!}
    {!! Html::style('/plugins/font-awesome-4.6.3/css/font-awesome.min.css') !!}

    @section('css-app')
    {!! Html::style('/css/app2.css') !!}
    @show

    <!-- JCrop -->
    {!! Html::style('/assets/plugins/JCrop/css/jquery.Jcrop.css') !!}

    @yield('css-section')

    <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/Html5shiv/3.7.0/Html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-73934803-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<body data-spy="scroll">
    @if (Config::get('analytics.gtm.enable'))
    @include('partials.gtm-noscript')
    @endif
    <!-- Loader for jquery Ajax calls. -->
    <div class="loader-overlay" style="display: none;">
        <div class="overlay-loader-image">
            <img id="loader-image" src="{{ asset('/assets/images/loader.GIF') }}">
        </div>
    </div>
    <!-- topbar nav content here -->
    @section('topbar-section')
    <nav class="navbar navbar-default navbar-fixed-top header" id="header" role="navigation"  style='background-color: @if($color)#{{$color->nav_footer_color}}@endif; border-color: transparent;' >
        <!-- topbar nav content here -->
        <div class="container">
            <div class="logo pull-left">
                <a href="{{route('home')}}">
                    @if($siteConfigMedia=App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->siteconfigmedia)
                    @if($mainLogo = $siteConfigMedia->where('type', 'brand_logo')->first())
                    <span class="logo-title"><img src="{{asset($mainLogo->path)}}" width="55%" alt="Brand logo" id="logo" style="margin-top:0.6em;margin-bottom:0.6em;"></span>
                    @else
                    <span class="logo-title"><img src="{{asset('assets/images/main_logo.png')}}" width="55%" alt="Brand logo" id="logo" style="margin-top:0.6em;margin-bottom:0.6em;"></span>
                    @endif
                    @else
                    <span class="logo-title"><img src="{{asset('assets/images/main_logo.png')}}" width="55%" alt="Brand logo" id="logo" style="margin-top:0.6em;margin-bottom:0.6em;"></span>
                    @endif
                </a>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="{{route('home')}}" class="scrollto hide" id="nav_home">Home</a></li>
                    <!-- <li class="nav-item"><a href="{{route('home')}}#what-is-this" class="scrollto">WHAT IS THIS</a></li> -->
                    <li class="nav-item"><a href="{{route('home')}}#how-it-works" class="scrollto">How it works</a></li>
                    <li class="nav-item" style="color: #eee;"><a href="{{route('home')}}#projects" class="scrollto">Investments</a></li>
                    @if(App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->show_funding_options != '')
                    <li class="nav-item" style="color: #eee;"><a href="{{route('home')}}#funding" class="scrollto">Funding</a></li>
                    @endif
                    <li class="nav-item"><a href="/pages/team">About us</a></li>
                    <li class="nav-item"><a href="/pages/faq">FAQ</a></li>
                    @if (Auth::guest())
                    <li class="nav-item"><a href="{{route('users.create')}}">Register</a></li>
                    <li class="nav-item"><a href="{{route('users.login')}}">Sign in</a></li>
                    @else
                    <li class="dropdown nav-item last">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            My Account <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::user()->roles->contains('role', 'admin'))
                            <li class="nav-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
                            @endif
                            <li class="nav-item"><a href="{{route('users.show',[Auth::user()])}}">Profile</a></li>
                            <li class="nav-item"><a href="{{route('users.logout')}}">Logout</a></li>
                        </ul>
                    </li>
                    <li class="hide"><a href="#"><i class="fa fa-bell"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @show

    <!-- header content here -->
    @section('header-section')
    @stop

    <!-- body content here -->
    <div class="content">
        @yield('content-section')
    </div>

    <!-- footer content here -->
    @section('footer-section')
    <footer id="footer" class="chunk-box" @if($color) style='background-color: #{{$color->nav_footer_color}}' @endif>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center " data-wow-duration="1.5s" data-wow-delay="0.2s">
                    <center>
                        @if($siteConfigMedia=App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->siteconfigmedia)
                        @if($mainLogo = $siteConfigMedia->where('type', 'brand_logo')->first())
                        <img class="img-responsive" src="{{asset($mainLogo->path)}}" alt="Logo" width="200">
                        @else
                        <img class="img-responsive" src="{{asset('assets/images/main_logo.png')}}" alt="Logo" width="200">
                        @endif
                        @else
                        <img class="img-responsive" src="{{asset('assets/images/main_logo.png')}}" alt="Logo" width="200">
                        @endif
                    </center>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 text-center " data-wow-duration="1.5s" data-wow-delay="0.3s">
                    <a href="{{ App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->facebook_link }}" target="_blank">
                        <span class="fa-stack fa">
                            <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                            <i class="fa fa-facebook fa-stack-1x fa-inverse" style="color:#21203a;"></i>
                        </span>
                    </a>
                    <a href="{{ App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->twitter_link }}" class="footer-social-icon" target="_blank">
                        <span class="fa-stack fa">
                            <i class="fa fa-twitter fa-stack-2x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="{{ App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->youtube_link }}" class="footer-social-icon" target="_blank">
                        <span class="fa-stack fa">
                            <i class="fa fa-circle fa-stack-2x fa-inverse"></i>
                            <i class="fa fa-youtube fa-stack-1x fa-inverse" style="color:#21203a;"></i>
                        </span>
                    </a>
                    <a href="{{ App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->linkedin_link }}" class="footer-social-icon" target="_blank">
                        <span class="fa-stack fa">
                            <i class="fa fa-linkedin-square fa-stack-2x fa-inverse"></i>
                        </span>
                    </a>
                    <a href="{{ App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->google_link }}" class="footer-social-icon" target="_blank">
                        <span class="fa-stack fa">
                            <i class="fa fa-google-plus fa-stack-2x fa-inverse" style="padding:4px; margin-left:-3px; font-size:24px !important;"></i>
                        </span>
                    </a>
                    <a href="{{ App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->instagram_link }}" class="footer-social-icon" target="_blank">
                        <span class="fa-stack fa">
                            <i class="fa fa-instagram fa-stack-2x fa-inverse"></i>
                        </span>
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <ul class="list-inline footer-list " data-wow-duration="1.5s" data-wow-delay="0.4s" style="margin:0px;">
                        <li class="footer-list-item"><a href="{{route('home')}}" style="color:#fff;" class="a-link"><span class="font-semibold" style="font-size: 16px;">Home</span></a></li>
                        <li class="footer-list-item"><a href="https://estatebaron.com/blog/" style="color:#fff;" class="a-link"><span class="font-semibold" style="font-size: 16px;">Blog</span></a></li>
                        <!-- @if(App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->show_funding_options != '')
                        <li class="footer-list-item"><a href="{{App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->funding_link}}" style="color:#fff;" class="a-link"><span class="font-semibold" style="font-size: 16px;">Funding</span></a></li><br>
                        @endif -->
                        <li class="footer-list-item"><a href="{{route('site.termsConditions')}}" target="_blank" style="color:#fff;" class="a-link"><span class="font-semibold" style="font-size: 16px;">Terms & conditions</span></a></li>
                        <span style="color:#fff;"> </span>
                        <li class="footer-list-item"><a href="https://estatebaron.com/pages/privacy" target="_blank" style="color:#fff;" class="a-link"><span class="font-semibold" style="font-size: 16px;">Privacy</span></a></li><br>
                        <li class="footer-list-item"><a href="https://www.dropbox.com/s/420na4su10wgt85/RSec%20FSG%20Ver%207.0%20201702.pdf?dl=0" style="color:#fff;" target="_blank" class="a-link"><span class="font-semibold" style="font-size: 16px;">Financial Service Guide</span></a></li>
                        <!-- <li class="footer-list-item"><a href="{{App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->media_kit_link}}" download style="color:#fff;" class="a-link"><span class="font-semibold" style="font-size: 16px;">Media Kit</span></a></li> -->
                    </ul>
<!--                     <span style="margin:0 0 1px;">
                        <a href="mailto:info@vestabyte.com" style="color:#fed405; font-size: 14px;" class="font-semibold second_color">info@vestabyte.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="tel:+61398117015" class="font-semibold second_color" style="color:#fed405; font-size: 14px;">+61398117015</a>
                    </span> -->
                <!-- <address style="margin:0px;">
                    <p class="h1-faq" data-wow-duration="1.5s" data-wow-delay="0.8s" style="color:#fff;">
                        569/585 Little Collins Street Melbourne VIC 3000.
                    </p>
                </address> -->
                <br>
            </div>
        </div>
        <div class="row text-center" style="padding-top: 20px;">
          <img style="width: 50px;" src="{{asset('assets/images/estatebaronLogo_white.png')}}">
          <p>
            <span style="color: #fff;">Powered by </span><a href="https://www.estatebaron.com/" target="_blank" style="cursor: pointer; color: #fff" class="a-link">Estate Baron</a>
          </p>
        </div>
    </div>
</footer>
@show


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->
{!! Html::script('/js/jquery-1.11.3.min.js') !!}
{!! Html::script('/js/bootstrap.min.js') !!}
{!! Html::script('/js/circle-progress.js')!!}

<!-- JCrop -->
{!! Html::script('/assets/plugins/JCrop/js/jquery.Jcrop.js') !!}

<script>
    (function(w, u, d){if(typeof u!=="function"){var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Upscope=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://js.upscope.io/upscope.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(d.readyState==='complete'){l();}else if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})(window, window.Upscope, document)

    Upscope('init', {
    apiKey: "RgfYeBGvVzVmKMEWhbfRBpug"
    });
</script>
<!-- Begin Inspectlet Embed Code -->
<script type="text/javascript" id="inspectletjs">
    window.__insp = window.__insp || [];
    __insp.push(['wid', 916939494]);
    (function() {
        function ldinsp(){if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
        setTimeout(ldinsp, 500); document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
    })();
</script>
<!-- End Inspectlet Embed Code -->
<script type="text/javascript">
    //login flash
    @if (Session::has('loginaction'))
    $('body').append('<div id="session_flash_message" style=" position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 10000;background-color: rgba(255,255,255,0.7); display: none;"><div class="text-center" style="position: absolute; background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; padding: 30px 30px; color: #fff; top: 50%; left:20%; border: 1px solid rgba(0, 0, 0, 0.2); font-size: 250%; width: 60%"><span>Welcome {{Auth::user()->first_name}}</span></div></div>');
    $('#session_flash_message').show()
    setInterval(function() {
        $('#session_flash_message').fadeOut(500);
    }, 2500);
    @endif
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
        $('a[data-disabled]').click(function (e) {
            e.preventDefault();
        });
        
        function toggleChevron(e) {
            $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('glyphicon-plus glyphicon-minus');
        }
        $('#accordion').on('hidden.bs.collapse', toggleChevron);
        $('#accordion').on('shown.bs.collapse', toggleChevron);
        $("iframe[name ='google_conversion_frame']").attr('style', 'height: 0px; display: none !important;');
        @if($color)
        $('p').css('color', '#{{$color->nav_footer_color}}');
        $('.first_color').css('color', '#{{$color->nav_footer_color}}');
        $('.second_color_btn').css('background-color', '#{{$color->heading_color}}');
        $('.second_color').css('color','#{{$color->heading_color}}');
        $("a").mouseover(function() {
            $(this).css('color', '#{{$color->heading_color}}');
        }).mouseout(function() {
            $(this).css('color', '');
        });
        $(".a-link").mouseover(function() {
            $(this).css('color', '#{{$color->heading_color}}');
        }).mouseout(function() {
            $(this).css('color', '#fff');
        });
        @endif

        //sidebar active tab color
        @if($color)
        @if($color->heading_color)
        $('.list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover').css('background-color', '#{{$color->heading_color}}');
        $('.list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover').css('border-color', '#{{$color->heading_color}}');
        @endif
        @endif
    });
    function checkvalidi() {
        if ((document.getElementById('email').value != '')) {
            document.getElementById('password_form').style.display = 'block';
            if (document.getElementById('password').Value == '') {
                document.getElementById('err_msg').innerHTML = 'Just one more step, lets enter a password !';                 document.getElementById('password').focus();
                return false;
            }
            if (document.getElementById('password').value != '') {
                return true;
            }
            return false;
        }
        return true;
    }
</script>
@yield('js-section')
</body>
</Html>