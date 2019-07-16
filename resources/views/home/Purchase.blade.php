@extends('home.Master')
@section('title', '购买betterzip激活码,序列号,注册码 - betterzip中文官网')
@section('keywords','betterzip激活码,betterzip序列号,betterzip注册码,购买betterzip,betterzip正版')
@section('description','betterzip官网提供betterzip激活码，注册码，序列号购买，五分钟内即可获取betterzip序列号以及更多售后服务及技术支持，官方提醒用户避免使用betterzip注册机，注册码生成器等工具激活软件以免造成软件损失。')
@section('asset')
    @parent
    <script type="text/javascript" src="{{asset('js/home/distpicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/home/layout.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/home/jquery.qrcode.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/home/qrcode.js')}}"></script>
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="buy_content">
    	<div class="product_img">
        	<div class=""><img src="{{asset('images/buy_product_img.png')}}" /></div>
        </div>
        <div class="buy_xinxi">
        	<div class="buy_name">BetterZip 4.1</div>
            <div class="buy_jieshao">BetterZip是一款适用于Mac操作系统的软件。</div>
            <div class="buy_price"><span class="price_span">¥ {{$pay_config['price']}}</span><span class="price_old">原价： 169</span> 五分钟内发送邮件到您填写的邮箱</div>
            <table cellpadding="0" cellspacing="0" border="0" class="buy_table">
            	<tr>
                	<td class="buy_td1">版本：</td>
                    <td>
                        <dl class="buy_dl">
                            <dd class="selecta buy_active">{{$pay_config['goods_name'] }}</dd>
                        </dl>
                    </td>
                </tr>
              {{--  <tr>
                	<td class="buy_td1">购买信息：</td>
                    <td>
                    	<dl class="buy_dl">
                            <dd class="selecta buy_active" data-buyer-type="0">个人购买</dd>
                            <dd class="selecta" data-buyer-type="1">公司购买</dd>
                        </dl>
                    </td>
                </tr>
                <tr>
                	<td class="buy_td1">数量：</td>
                    <td>
                    	<div class="num_wrap">
                        	<input class="szprice_sub" type="button" onclick="sub()">
							<div class="szprice_txt"><input type="text" id="txt" value="1"/></div>
							<input class="szprice_add" type="button" onclick="add()">
                        </div>
                    </td>
                </tr>--}}
                <!-- <tr>
                	<td class="buy_td1">说明：</td>
                    <td>1.企业单机版和多用户版的区别</td>
                </tr> -->
            </table>
        </div>
        <div class="clear"></div>
    </div>

    <div class="dindang_wrap">
    	<div class="dingdan_title">订单详情</div>
        <form id="order_form">
            <div class="order_content">
                <div class="form_title">1.收货信息</div>
                <table class="form_table" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                       {{-- <td class="td_title company_info"><span class="red">*</span>公司名称：</td>
                        <td class="company_info"><input type="text" name="company" value=""/></td>--}}
                        <td class="td_title"><span class="red">*</span>联系人：</td>
                        <td><input type="text" name="contact" value="" /></td>
                    </tr>
                    <tr>
                        <td class="td_title"><span class="red">*</span>手机号码：</td>
                        <td><input type="text" name="mobile" value=""/></td>
                        <td class="td_title"><span class="red">*</span>电子邮箱：</td>
                        <td><input type="text" name="email" value=""/></td>
                    </tr>
                    <tr>
                        <td colspan="4"><input type="checkbox" /><span class="tips">您同时可通过该电子邮件接受来自Betterzip的服务和活动相关信息，包括最新解决方案，版本升级和独家优惠</span></td>
                    </tr>
                </table>

                <div class="form_title">2.支付方式</div>
                <ul class="zhifu_ul">
                    <li class="zhifu_li">第三方支付</li>
                    {{--<li>直接汇款</li>--}}
                </ul>
                <div class="zhifu_content zhifu_con zhifu_show">
                    <div class="zhifu_div"><input type="radio" name="paymethod" checked="true" value="alipay"/><img src="{{asset('images/zhifubao_img.png')}}" /></div>
                    <div class="zhifu_div"><input type="radio" name="paymethod" value="wechat"/><img src="{{asset('images/weixin_img.png')}}" /></div>
                    {{--<div class="zhifu_div"><input type="checkbox" /><img src="{{asset('images/wangyin_img.png')}}" /></div>--}}
                    <div class="clear"></div>
                </div>
                <div class="zhifu_content zhifu_con">
                    <div class="zhifu_huikuan">
                        <p>银行帐号：<span>1055 3001 0400 13194</span></p>
                        <p>开户行：<span>中国农业银行苏州城东支行</span></p>
                        <p>开户名：<span>苏州野望软件科技有限公司</span></p>
                    </div>
                </div>

                <div class="form_title" style="display: none">3.发票信息</div>
                <div class="invoice_content" style="display: none">
                    <div class="invoice_switch">
                        <input type="checkbox" name="is_require_invoice" autocomplete="off" value="1"/>
                        <span>需要邮寄发票</span>
                    </div>
                    <div class="invoice_maincontent">
                        <ul class="invoice_info">
                            <li class="invoice_title_active">
                                17%增值普通发票
                            </li>
                            <li>
                                17%增值专用发票
                            </li>
                        </ul>
                        <div class="invoice_lists">
                            <div class="row">
                                <label for="invoice_title">发票抬头:</label>
                                <input type="text" id="invoice_title" name="invoice_title" value="" />
                                <label for="invoice_sn" class="label_li">纳税人识别号 / </br>统一社会信用代码:</label>
                                <input type="text" id="invoice_sn" name="invoice_sn" value="" />
                            </div>
                            <div class="row">
                                <label for="invoice_title">发票寄送地址：</label>
                                <div class="distpicker" data-toggle="distpicker">
                                    <select data-province="---- 选择省 ----" name="province"></select>
                                    <select data-city="---- 选择市 ----" name="city"></select>
                                    <select data-district="---- 选择区 ----" name="district"></select>
                                    <input type="text" name="invoice_post_address" value="" />
                                </div>
                            </div>
                        </div>
                        <div class="invoice_lists invoice_com_last">
                            <div class="row">
                                <label for="invoice_title">注册地址:</label>
                                <input type="text" id="invoice_title" name="invoice_address" value="" />
                                <label for="invoice_sn" class="label_li">注册电话:</label>
                                <input type="text" id="invoice_sn" name="invoice_phone" value="" />
                            </div>
                            <div class="row">
                                <label for="invoice_title">开户银行：</label>
                                <input type="text" id="invoice_title" name="invoice_bank" value="" />
                                <label for="invoice_sn" class="label_li">开户账户:</label>
                                <input type="text" id="invoice_sn" name="invoice_bank_code" value="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="buyer_type" value="0">
            <input type="hidden" name="prodsn" value="PN00000001">
            <input type="hidden" name="goodssn" value="BZ0000000001">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="invoice_type" value="0">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="tijiao_content">
            	<div class="tijiao_tishi">
                	<p>订单发货后我们会第一时间邮件通知您。</p>
                    <p>订单商品预计在24小时内发货</p>
                </div>
                <div class="tijiao_btn" id="payNow">
                	<input type="button" value="提交订单" />
                </div>
                <div class="clear"></div>
            </div>
        </form>
        <p class="themeUrl" style="display:none;">{{ route('pay') }}</p>
        <p class="wechatUrl" style="display:none;">{{ route('wechat_find') }}</p>
        <p class="aliUrl" style="display:none;">{{ route('ali_find') }}</p>
        <p class="order_no" style="display:none;">{{ request()->out_trade_no }}</p>
        <p class="token" style="display:none;">{{ csrf_token() }}</p>

    </div>
    <!--购买结构end-->
    <!-- 微信扫码支付弹出框开始 -->
    <div class="wechat-pay-dialog-bg full"></div>
    <div class="wechat-pay-dialog" id="show">
        <a class="close"></a>
        <ul>
            <li class="li-01">
                <h3>支付过程中，</h3>
                <h4>遇到问题，请联系客服。</h4>
                <p>Q Q：{{ $config['qq'] }}</p>
            </li>
            <li class="li-02">
                <h3>微信扫码支付</h3>
                <h1 class="price-wechat">￥<span class="thePlanPrice">{{ $pay_config['price'] }}</span></h1>
                <div class="qr-code-wrapper" id="qrcode">

                </div>
                <div class="tips">
                    <img src="{{ asset('images/icon-scan.png') }}">
                    <p>请使用微信扫一扫</p>
                    <p>扫描二维码支付</p>
                </div>
            </li>
            <li class="li-03">
                <img src="{{ asset('images/code-tips.png') }}">
            </li>
        </ul>
    </div>
    <!-- 微信扫码支付弹出框结束 -->
@endsection

@section('footer')
    @parent
@endsection
