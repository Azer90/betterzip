@extends('home.Master')
@section('title', 'betterzip中文官网 - 最新mac解压缩软件')
@section('keywords','betterzip,betterzip官网,mac解压软件,mac压缩软件,betterzip下载,betterzip免费下载,betterzip购买')
@section('description','betterzip中文官网提供最新的betterzip 4.0免费下载试用及官方正版购买，可以满足您所有的mac使用过程中的解压缩需求，同时提供完善的售后服务保障及技术支持。')
@section('asset')
    @parent
@endsection

@section('header')
    @parent
    <!--banner结构-->
    <div class="banner_wrap">
        <div class="introduction_content">
            <div class="bannerproduct_name">BETTERZIP 4.2</div>
            <div class="bannerproduct_miaoshu">最专业的MAC压缩软件</div>
	    <div class="bannerproduct_miaoshu" style="color:red;font-size:32px;padding-left:70px;font-weight:bold;">特价促销中</div>
            <a class="bannerproduct_download" href="http://download.betterzip.net/BetterZip-YW.zip">免费下载</a>
        </div>
    </div>
    <!--banner结构end-->
@endsection

@section('content')
<!-- 功能结构 start-->
	<div class="betterzip_function"><span>BETTERZIP 4.2 新功能</span></div>

    <div class="function_wrap">
    	<div class="function_content">
        	<div class="function_title">多方应用程序集成</div>
            <ul class="function_ul">
            	<li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>在Finder中选择一些文件，单击BetterZip按钮，然后从下拉菜单中选择一个预设，以使用这些文件创建归档。</p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>BetterZip 4允许您定义任意数量的服务使用预设配置中的工具菜单，为您选择的名称添加预设的服务。</p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>BetterZip 4还带有Automator作为工作流程的一部分提取和压缩的操作。与其他应用程序很好地交互。</p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>所有这一切都可以通过增强的AppleScript支持来实现。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="home_img1">
        	<img src="{{asset('images/home_img1.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap">
    	<div class="function_content function_content_right">
        	<div class="function_title">完善体验功能优化</div>
            <ul class="function_ul">
            	<li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>
                            	<div class="bold">收藏夹边栏收到一些优化</div>重命名，复制，移动和删除存档，将多卷归档显示为一个项目。
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>
                            	<div class="bold">新的拖拽功能</div>在新的Drop Bar上放置文件放置您最喜爱的预设的放置区域。
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>
                            	<div class="bold">导航栏</div>轻松导航到所有父文件夹，并允许您直接将项目删除。
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>
                            	<div class="bold">保持档案没有Mac的东西</div>保留所有的Mac内容，将Mac内容添加到存档。
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>
                            	<div class="bold">修复RAR档案</div>打开或者解压缩文件时尝试修复损坏的存档。
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="home_img2">
        	<img src="{{asset('images/home_img2.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap" style="border-bottom:0;">
    	<div class="function_content">
        	<div class="function_title">用户需求功能完善</div>
            <ul class="function_ul">
            	<li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>成功提取之后，不用将提取的档案移动到垃圾箱，BetterZip现在可以将它们移动到任何文件夹。</p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>现在可以在保存预设中指定是否要在通过操作队列进行压缩时创建单个归档。它不再是一个全球性的环境。</p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>密码管理器现在可以导入密码列表（每行一个密码）。</p>
                        </div>
                    </div>
                </li>
                <li>
                	<div class="list_title">
                    	<div class="list_p">
                        	<i></i>
                            <p>预览侧栏现在可以使用快速查看显示更多的文件类型。</p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="total_gongneng"><a href="#">点击查看完整功能介绍>></a></div>
        </div>
        <div class="home_img3">
        	<img src="{{asset('images/home_img3.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>
    <!--功能结构end-->
@endsection

@section('footer')
    @parent
@endsection
