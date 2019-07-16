@extends('home.Master')
@section('title', 'betterzip中文版功能介绍 - betterzip中文官网')
@section('keywords','mac解压缩软件,betterzip 4.0,betterzip功能介绍,betterzip下载,betterzip中文官网')
@section('description','betterzip中文官网，提供betterzip 4.0完整的功能介绍，包括许多新增的一些功能，同时提供官方正版betterzip免费下载试用以及购买。')
@section('asset')
    @parent
@endsection

@section('header')
    @parent
    <!--banner结构-->
    <div class="feature_banner_wrap">
        <div class="introduction_content">
            <div class="bannerproduct_name feature_bannerproduct_name">BETTERZIP 4.2</div>
            <div class="bannerproduct_miaoshu">betterzip满足您mac使用过程中的解压缩需求</div>
            <a class="bannerproduct_download" href="http://download.betterzip.net/BetterZip-YW.zip">立即下载</a>
        </div>
    </div>
    <!--banner结构end-->
@endsection

@section('content')
    <!--功能结构-->
    <div class="function_wrap feature_wrap">
        <div class="function_content">
            <div class="function_title">新增更新的功能</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip可以使用外部命令行实用程序RAR 创建这些格式的ZIP：TAR，TAR，TGZ，TBZ，TXZ，7-ZIP，XAR和 -。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>从档案添加文件或删除文件。在档案中移动并重命名档案。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>兼容性：将BetterZip从归档中删除Mac的特定文件，以便在Windows上看起来和运行良好的存档。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>在外部应用程序中编辑归档文件，BetterZip可以更新您的存档。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img1">
            <img src="{{asset('images/feature_img1.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap">
        <div class="function_content function_content_right">
            <div class="function_title">打开和提取</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip可以打开并提取30种档案格式，包括ZIP，TAR，TGZ，TBZ，TXZ，7-ZIP，RAR，Apple Disk Images（DMG），TNEF（winmail.dat），ARJ，LHA，LZH，ISO， CHM，CAB，CPIO / CPGZ，DEB，RPM，StuffIt的SIT和SITX，BinHex，MacBinary，ePub，JAR / WAR / EAR / SAR / PAR / WSR Java档案，CBZ / CBR电子书，GZip，BZip2，WIM。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip还可以使用枚举的文件扩展名001，002，...</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>兼容性：将BetterZip从归档中删除Mac的特定文件，以便在Windows上看起来和运行良好的存档。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>打开并提取winmail.dat文件。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>打开，提取，快速查看 苹果磁盘映像（dmg文件）。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>打开，解压缩和修改ePub文件。BetterZip不是一个真正的ePub编辑器的替代品，但由于ePub文件真的只是特殊的zip文件，为什么不使用BetterZip来窥探甚至修改它们。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>从PDF或Flash文件中提取图像和声音。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img2">
            <img src="{{asset('images/feature_img2.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap">
        <div class="function_content">
            <div class="function_title">Finder集成</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip允许您添加可配置的服务到macOS'服务菜单。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>在新的Finder扩展把所有的预置Finder的工具栏中即可。在Finder中选择一些文件，单击BetterZip按钮，然后从下拉菜单中选择其中一个预设，以使用这些文件创建归档。当然，您也可以在选定的档案中调用任何提取预设。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img3">
            <img src="{{asset('images/feature_img3.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap">
        <div class="function_content function_content_right">
            <div class="function_title">预置</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip允许您创建用于创建和提取存档的预设。预设将收集所有可应用于存档的设置，从目标文件夹和归档格式到密码，甚至在操作完成后执行的脚本。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img4">
            <img src="{{asset('images/feature_img4.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap">
        <div class="function_content">
            <div class="function_title">过滤</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip可以在存档提取期间过滤掉不需要的文件。没有其他系统的Thumbs.db和其他不需要的东西！它也可以防止文件首先放入您的存档。您不想在存档中隐藏版本控制文件夹或备份文件。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img5">
            <img src="{{asset('images/feature_img5.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap">
        <div class="function_content function_content_right">
            <div class="function_title">广泛的AppleScript支持</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip可以使用AppleScript脚本编写。将其集成到您的工作流程中。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip 4包括用于压缩和提取archvies的Automator操作。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>BetterZip 4与Alfred，LaunchBar，DropZone和Hazel等第三方生产力工具完美结合。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img6">
            <img src="{{asset('images/feature_img6.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap">
        <div class="function_content">
            <div class="function_title">存档评论</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>显示，添加和更新zip和rar格式的存档注释。BetterZip还可以显示zip文件中可能存在的文件注释。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img7">
            <img src="{{asset('images/feature_img7.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap">
        <div class="function_content function_content_right">
            <div class="function_title">测试档案</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>快速测试一个档案而不提取它，以确定是否损坏。</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>使用操作队列测试档案。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img8">
            <img src="{{asset('images/feature_img8.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>


    <div class="function_wrap" style="border-bottom:0;">
        <div class="function_content">
            <div class="function_title">集成QL发电机</div>
            <ul class="function_ul">
                <li>
                    <div class="list_title">
                        <div class="list_p">
                            <i></i>
                            <p>广泛使用的BetterZip Quick Look Generator现已整合到BetterZip中。使用QL生成器对于所有人来说仍然是免费的，但是有一个整洁的新功能需要BetterZip许可证（试用期满后）：新的QL生成器允许您单击存档中的文件。此时，它将手动命令BetterZip，它提取并显示点击的文件。这真的很好，如果我自己说的话。</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="feature_img9">
            <img src="{{asset('images/feature_img9.jpg')}}" />
        </div>
        <div class="clear"></div>
    </div>
    <!--功能结构end-->
@endsection

@section('footer')
    @parent
@endsection
