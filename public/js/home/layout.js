$(function() {
	$("dl.buy_dl dd").click(function(){
		$(this).addClass("buy_active").siblings().removeClass("buy_active");
		$buer_type = $(this).attr('data-buyer-type');
		$("input[name='buyer_type']").val($buer_type);
		if($buer_type == 0){
			$(".company_info").hide();
		}else{
			$(".company_info").show();
		}
	});
	//发票checkbox勾选JS
    $(".invoice_switch input").click(function(){
        if($(this).is(":checked"))
        {
            $(".invoice_maincontent").css("display","block");
        }
        else
        {
            $(".invoice_maincontent").css("display","none");
        }
    })
	//支付方式tab切换
    $(".zhifu_ul li").click(function(){
        var index = $(this).index();
        $(this).addClass("zhifu_li").siblings().removeClass("zhifu_li");
        $(".zhifu_con").eq(index).addClass("zhifu_show").siblings().removeClass("zhifu_show");
    })
	//发票信息tab切换
    $(".invoice_info li").click(function(){
        var $index = $(this).index();
        $(this).addClass("invoice_title_active").siblings().removeClass("invoice_title_active");
        if($index == 1){
            $("input[name='invoice_type']").val(1);
        	$(".invoice_com_last").show();
		}else{
            $("input[name='invoice_type']").val(0);
            $(".invoice_com_last").hide();
		}
    })
    //支付方式切换
    $("input[type='pay_type']").click(function(){

    })
    $('#target').distpicker();
    $('form').submit(function(){

    });
    /**
     * 购买商品
     */

    function payWay() {
        $.ajax({
            url: $('.themeUrl').text(),
            type: 'post',
            dataType: 'json',
            data: $('#order_form').serialize(),
            success: function (data) {
                /*console.log(data.order_no);*/
                if (data.code == 1000) {
                    $('.order_no').html(data.order_no);
                    if (data.paymethod == 'alipay') {
                        // newTab.location = data.message;
                        window.open(data.message,'_self');
                    } else if (data.paymethod == 'wechat') {
                        var render;
                        if (isIE()) {
                            render = 'table';
                        }else{
                            render = 'canvas';
                        };
                        weChatDialogShow();
                        $('.qr-code-wrapper').empty();
                        $('.qr-code-wrapper').qrcode({
                            render: render,
                            width: 120,
                            height: 120,
                            text: data.message
                        });
                    };
                }else {
                    alert( data.message);
                }
            }
        })
    }

    $('#payNow').click(function () {
        // if (checkednum) {
        payWay();
        // } else {
        //   errorMsgShow();
        // };
    });
    function isIE(){
        var theUA = window.navigator.userAgent.toLowerCase();
        if ((theUA.match(/msie\s\d+/) && theUA.match(/msie\s\d+/)[0]) || (theUA.match(/trident\s?\d+/) && theUA.match(/trident\s?\d+/)[0])) {
            var ieVersion = theUA.match(/msie\s\d+/)[0].match(/\d+/)[0] || theUA.match(/trident\s?\d+/)[0];
            if (ieVersion < 9) {
                return true;
            }
        }
    }

    /**
     * 微信扫码支付弹出框显示
     */
    function weChatDialogShow() {
        $(".wechat-pay-dialog-bg").css({ display: "block", height: $(document).height() });
        $(".wechat-pay-dialog").css("display", "block");
    };
    $(".close").click(function (event) {
        $(".wechat-pay-dialog-bg").css("display", "none");
        $(".wechat-pay-dialog").css("display", "none");
    });
    chaxun = setInterval(function () {
        check()
    }, 3000);
    function check() {
        var paymethod = $('input:radio[name="paymethod"]:checked').val();
        //console.log(paymethod);
        if (paymethod == 'alipay') {
            var url =$('.aliUrl').text();
        }
        if (paymethod == 'wechat') {
            var url =$('.wechatUrl').text();
        }
        var order_no = $('.order_no').text();
        var param = {'order_no': order_no, '_token':$('.token').text()};
        if(order_no !=''){
            $.post(url, param, function (data) {

                if(paymethod == 'alipay'){
                    // console.log(data['trade_status']);
                    if (data['trade_status'] == 'TRADE_SUCCESS') {
                        clearInterval(chaxun);
                        alert('<p>支付成功<p/><p>系统将尽快发送授权信息到您邮箱<p/><p>非工作时间请耐心等待。谢谢<p/>');
                    }
                }else if(paymethod == 'wechat'){
                    //console.log(data['trade_state']);
                    if (data['trade_state'] == 'SUCCESS') {
                        $(".wechat-pay-dialog-bg").css("display", "none");
                        $(".wechat-pay-dialog").css("display", "none");
                        clearInterval(chaxun);
                        alert('<p>支付成功<p/><p>系统将尽快发送授权信息到您邮箱<p/><p>非工作时间请耐心等待。谢谢<p/>');
                    }
                }

            });
        }

    }
})

//点击数量“+”“-”数字递增或减少
function add(){
        var txt=document.getElementById("txt");
        var a=txt.value;
        a++;
        txt.value=a;
}
function sub(){
	var txt=document.getElementById("txt");
	var a=txt.value;
	if(a>1){
		a--;
		txt.value=a;
	}else{
		txt.value=1;
	}
}
