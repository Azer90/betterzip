$(function(){
    var _rotate_deg = 0;//回正 回到0度
    var _rotate_angle = 30;//旋转度数 30度
    var _rotate_deg_step = 5; //每次旋转角度，能够被_angle整除
    var _rotate_duration = 1;//每次旋转时间
    var _rotate_count = 0; //初始旋转次数
    var _rotate_count_max = 6;//最大旋转次数
    var _rotate_timer = null;
    var _rotate_stop_time = 0;
    var _rotate_stop_max_time = 500; //停止时间3秒

    $('.tel').hover(function () {
        $('.tel img').attr("src", "/images/tel_h.png");
        $('.hidetelBox').css("display","block");
    }, function () {
        $('.tel img').attr("src", "/images/tel.png");
        $('.hidetelBox').css("display","none");
    });

    $('.mail').hover(function () {
        $('.mail img').attr("src", "/images/mail_h.png");
        $('.hidemailBox').css("display","block");
    }, function () {
        $('.mail img').attr("src", "/images/mail.png");
        $('.hidemailBox').css("display","none");
    });
    $('.Rtop').hover(function () {
        $('.Rtop img').attr("src", "/images/top_h.png");
        $('.hideRtop').css("display","block");
    }, function () {
        $('.Rtop img').attr("src", "/images/top.png");
        $('.hideRtop').css("display","none");
    });
    _rotate_timer = setInterval(function(){
        var item = "msg";
        if (_rotate_count == _rotate_count_max) {
            if (_rotate_deg == 0) {
                _rotate_stop_time = _rotate_stop_time + _rotate_duration;
                if (_rotate_stop_time == _rotate_stop_max_time) {
                    _rotate_stop_time = 0;
                    _rotate_count = 0;
                }
                return;
            }
            _rotate_deg = _rotate_deg + _rotate_deg_step;
            $("#" + item).css("transform", "rotate(" + _rotate_deg + "deg)");
            return;
        }

        _rotate_deg = _rotate_deg + _rotate_deg_step;
        if (_rotate_deg == _rotate_angle || _rotate_deg == -_rotate_angle) {
            _rotate_count = _rotate_count + 1;
            _rotate_deg_step = -_rotate_deg_step;
        }
        $("#" + item).css("transform", "rotate(" + _rotate_deg + "deg)");
    }, 1);
    $(".Rtop").click(function(){
        $('body,html').animate({scrollTop:0},500);
        return false;
    });
    $(window).scroll(function(){
        var scrollHeight = $(this).scrollTop();
        if(scrollHeight > 100){
            $('.Rtop').removeClass('dn');
            $('.tool-line:last').removeClass('dn');
        }else{
            $('.Rtop').addClass('dn');
            $('.tool-line:last').addClass('dn');
        }
    });
})