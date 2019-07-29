@extends('home.Master')
@section('title',$article->title)
@section('keywords',$article->keywords)
@section('description',$article->description)
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
            <h3>常见问题</h3>
            <ul>
                @foreach($cate_lists as $key => $item)
                    <li><a href="/lists_{{$item->id}}.html">{{$item->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="box-content">
            <h3>{{$article->title}}</h3>
            <div class="contents">
                {!! $article->content !!}
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
