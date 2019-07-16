<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    @section('asset')
        <link rel="stylesheet" href="{{asset('css/home/layout.css')}}" />
        <script type="text/javascript" src="{{asset('js/home/jquery.min.js')}}"></script>

        <script type="text/javascript" src="{{asset('js/home/common.js')}}"></script>
    @show
</head>
<body>
    @section('header')
        <!--头部结构-->
        <div class="header_wrap">
            <div class="header_content">
                <div class="logo"><a href="/"><img src="{{asset('images/logo.png')}}" /></a></div>
                <ul class="nav_ul">
                    @foreach ($nav as $value)
                        @if ($value['url']==$name)
                            <li class="nav_li_active"><a  href="{{ route($value['url'])  }}">{{ $value['name'] }}</a></li>
                        @else
                            <li><a  href="{{ route($value['url']) }}">{{ $value['name'] }}</a></li>
                        @endif

                    @endforeach
                </ul>
            </div>
        </div>
        <!--头部结构end-->
    @show

    <!--功能结构-->
    <div class="maincontent_wrap">
        @yield('content')
    </div>
    <!--功能结构end-->

    @section('footer')
        <!--底部下载结构-->
        <div class="footerdownload_wrap">
            <div class="footerdownload_content">
                <div class="footerdownload_icon"><img src="{{asset('images/footerdownload_icon.png')}}" /></div>
                <div class="footerdownload_div">
                    <div class="footerdownload_name">BETTERZIP 4.2</div>
                    <div class="footerdownload_miaoshu">最专业的MAC压缩软件</div>
                    <a class="footerdownload" href="http://download.betterzip.net/BetterZip-YW.zip">立即下载</a>
                </div>
            </div>
        </div>
        <!--底部下载结构end-->

        <!--footer结构-->
        <div class="footer_wrap">
            <div class="footer_content">
                {{--<div class="footer_friendship"><a href="#">下载之家</a>|<a href="#">下载之家</a>|<a href="#">下载之家</a>|<a href="#">下载之家</a>|<a href="#">下载之家</a>|<a href="#">下载之家</a>|<a href="#">下载之家</a>|<a href="#">下载之家</a>|<a href="#">下载之家</a>|<a href="#">下载之家</a></div>--}}
                <div class="footer_banquan">YW-software.com 版权所有      苏ICP备17035980-1</div>
            </div>
        </div>
        <!--footer结构end-->
    @show

    @section('toolbar')
        <div class="toolbar">

            <div class="toolbarbox">
                <div class="msg">
                    <a href="http://wpa.qq.com/msgrd?v=3&uin=1178738406&site=qq&menu=yes" target="_blank"><img src="{{asset('images/qq.png')}}" class="msg-img" id="msg" style="transform: rotate(0deg);"></a>

                    <div class="msg-line"></div>
                    <div class="hidemsgAfter">
                        <div class="hidemsg">
                            <p><a href="http://wpa.qq.com/msgrd?v=3&uin=1178738406&site=qq&menu=yes" target="_blank">在线咨询</a></p>
                            <div></div>
                        </div>
                    </div>
                </div>

                {{--<div class="mobel tel">--}}
                    {{--<img src="{{asset('Static/Betterzip/images/tel.png')}}">--}}
                    {{--<div class="tool-line"></div>--}}
                    {{--<div class="hidemobelBox hidetelBox" style="display: none;">--}}
                        {{--<div class="hidemobel">--}}
                            {{--<p>客服热线 0512-62986285</p>--}}
                            {{--<div class="triangle"> </div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="mobel mail">
                    <a href="mailto:mark@yw-software.com"><img src="{{asset('images/mail.png')}}"></a>
                    <div class="tool-line"></div>
                    <div class="hidemobelBox hidemailBox" style="display: none; top: 0px;">
                        <div class="hidemobel">
                            <p><a rel="nofollow" href="mailto:mark@yw-software.com">mark@yw-software.com</a></p>
                            <div class="triangle"> </div>
                        </div>

                    </div>
                </div>
                <div class="Rtop">
                    <a href="#"><img src="{{asset('images/top.png')}}"></a>
                </div>
            </div>
        </div>
    @show
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?b2d366a35d7e348fa55ee5dd59956f1d";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</body>
</html>
