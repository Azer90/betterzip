@extends('home.Master')
@section('title', 'betterzip4.0中文下载 - betterzip中文官网')
@section('keywords','betterzip中文官网,betterzip下载,mac解压缩软件,betterzip中文下载,betterzip中文官方下载')
@section('description','betterzip中文官网,提供betterzip 4.0/3.0/2.0下载,官方网站提醒用户避免使用betterzip破解版、精简版、绿色版等其他版本,以免造成损失。')
@section('asset')
    @parent
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <!--下载结构-->
    <div class="download_title">BETTERZIP 4.2</div>
    <div class="download_content_wrap">
        <div class="download_img"><img src="{{asset('images/footerdownload_icon.png')}}" /></div>
        <div class="download_canshu">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td class="canshu_td">软件语言：</td>
                    <td>中文</td>
                </tr>
                <tr>
                    <td class="canshu_td">软件版本：</td>
                    <td>V 4.2</td>
                </tr>
                <tr>
                    <td class="canshu_td">软件大小：</td>
                    <td>10.6M</td>
                </tr>
                <tr>
                    <td class="canshu_td">更新日期：</td>
                    <td>2019年7月1日</td>
                </tr>
                <tr>
                    <td class="canshu_td">系统要求：</td>
                    <td>macOS 10.10及更高版本</td>
                </tr>
            </table>
        </div>
        <div class="download_jieshao">
            <div class="jieshao_title">软件简介</div>
            <div class="jieshao_content">BetterZip是一款功能强大的压缩软件，不必解压就能快速地检查压缩文档。它能执行文件之间的合并并提供密码。</div>
            <a class="download_a" href="http://download.betterzip.net/BetterZip-YW.zip">立即下载</a>
        </div>
        <div class="clear"></div>
    </div>

    <div class="download_title">其他版本</div>
    <div class="banben_content_wrap">
        <div class="download_banben">
            <table cellpadding="0" cellspacing="0" border="0">
                <colgroup>
                    <col width="394" />
                    <col width="192" />
                    <col width="184" />
                    <col width="*" />
                </colgroup>
                <tr>
                    <td class="banben_td">旧版 3.2.1（包括免费的所有QL生成器）</td>
                    <td>2017年2月2日</td>
                    <td>11.5M</td>
                    <td>macOS 10.9及更高版本</td>
                </tr>
                <tr>
                    <td class="banben_td">旧版 2.3.4</td>
                    <td>2014年12月1日</td>
                    <td>11.6M</td>
                    <td>macOS 10.6--10.10</td>
                </tr>
                <tr>
                    <td class="banben_td">旧版 1.8.3</td>
                    <td>2014年12月1日</td>
                    <td>11.6M</td>
                    <td>macOS 10.6--10.10</td>
                </tr>
            </table>
        </div>
    </div>

    {{--<div class="download_title">合作平台下载</div>--}}
    {{--<div class="banben_content_wrap">--}}
        {{--<div class="hezuo_content">--}}
            {{--<a href="#">hao123下载站</a><a href="#">华军软件园下载</a><a href="#">非凡软件站下载</a><a href="#">天极网下载</a><a href="#">2345软件大全下载</a><a href="#">hao123下载站</a><a href="#">华军软件园下载</a><a href="#">非凡软件站下载</a><a href="#">天极网下载</a><a href="#">2345软件大全下载</a><a href="#">hao123下载站</a><a href="#">华军软件园下载</a><a href="#">非凡软件站下载</a><a href="#">天极网下载</a><a href="#">2345软件大全下载</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--下载结构end-->
@endsection

@section('footer')
    @parent
@endsection
