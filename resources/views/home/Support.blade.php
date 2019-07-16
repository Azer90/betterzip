@extends('home.Master')
@section('title', 'betterzip技术支持,教程,激活码 - betterzip中文官网')
@section('keywords','betterzip教程,betterzip激活,betterzip激活码,betterzip客服,betterzip中文教程')
@section('description','betterzip中文官网，提供最完善的betterzip技术支持，您可以在这里获得betterzip购买、betterzip下载、betterzip使用、betterzip激活等其他关于betterzip帮助。')
@section('asset')
    @parent
@endsection

@section('header')
    @parent
    <!--banner结构-->
    <div class="feature_banner_wrap">
        <div class="introduction_content">
            <div class="bannerproduct_name feature_bannerproduct_name">BETTERZIP 4.2</div>
            <div class="bannerproduct_miaoshu">功能强大的Mac解压缩软件<br/>支持RAR,ZIP等格式,可创建小型应用程序</div>
            <a class="bannerproduct_download" href="http://download.betterzip.net/BetterZip-YW.zip">立即下载</a>
        </div>
    </div>
    <!--banner结构end-->
@endsection

@section('content')
    <!--功能结构-->
    <div class="content">
        <div class="box-left">
            <h3>帮助中心</h3>
            <ul>
                @foreach($cate_lists as $key => $item)
                      <li><a href="/lists_{{$item->id}}.html">{{$item->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="box-right">
            <h3>{{$cate_name}}</h3>
            <ul>
                @foreach($article_lists as $key => $item)
                <li>
                    <h5><a href="/detail_{{$item->id}}.html">{{$item->title}}</a></h5>
                    <p>
                        {{$item->description}}
                    </p>
                    <a class="link" target="_blank" href="/detail_{{$item->id}}.html">查看详情 &gt;</a>
                </li>
                @endforeach
            </ul>
            {{ $article_lists->links('home.paginate') }}
        </div>
        <div class="clear"></div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
