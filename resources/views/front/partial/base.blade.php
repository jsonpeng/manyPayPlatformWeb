
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<html class="no-js" style="font-size: 40px;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- seo 里包含title meta 
            <title></title>
            
            <meta name="description" content="">
        -->
        <title>{!! getSettingValueByKeyCache('name') !!}</title>
        <meta name="keywords" content="{!! getSettingValueByKeyCache('seo_keywords') !!}">
        <meta name="description" content="{!! getSettingValueByKeyCache('seo_des') !!}">
        @yield('seo')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <!-- <script type="text/javascript">
            if (/Android (\d+\.\d+)/.test(navigator.userAgent)) {
                var version = parseFloat(RegExp.$1);
                if (version > 2.3) {
                    var phoneScale = parseInt(window.screen.width) / 640;
                    document.write('<meta name="viewport" content="width=640, minimum-scale = ' + phoneScale + ', maximum-scale = ' + phoneScale + ', target-densitydpi=device-dpi, user-scalable=no">');
                } else {
                    document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
                }
            } else {
                document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
            }
         
            window.alert = function(name){
            var iframe = document.createElement("IFRAME");
            iframe.style.display="none";
            iframe.setAttribute("src", 'data:text/plain,');
            document.documentElement.appendChild(iframe);
            window.frames[0].window.alert(name);
            iframe.parentNode.removeChild(iframe);
            }

            //alert('xxx');
        </script> -->
        <link href="https://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">    
        <link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
        <script src="{{asset('vendor/layui/layui.all.js')}}"></script>
        
        @yield('css')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="{{ asset('vendor/html5shiv.min.js') }}"></script>
            <script src="{{ asset('vendor/respond.min.js') }}"></script>
        <![endif]-->
    </head>
    <body id="page-top" data-spy="scroll" data-target=".fixed-top">
        <!--[if lte IE 8]>
            <p class="chromeframe">您正在使用<strong>过时的</strong> 浏览器. 请 <a href="http://browsehappy.com/">升级您的浏览器（点击进入下载页面）</a> 以提升上网体验。</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        @yield('content')
        @include('front.partial.footer')

        
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function($) {
                $(".scroll").click(function(event){     
                    var a=$('#home').innerHeight();
                    event.preventDefault();
                    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                });
                $().UItoTop({ easingType: 'easeOutQuart' }); 
            });
        </script>
        @yield('js')
        
        <!-- JS统计代码 -->
   


    </body>
</html>
