<?php

namespace App\Admin\Extensions;

use App\RefundOrder;
use Encore\Admin\Admin;

class Refund
{
    protected $id;
    protected $url;
    protected $surplus=0;
    protected $listPath;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->url = route('refund');
        $this->listPath = url(config('admin.route.prefix').'/payorder');
        if($data['status']===1){
            $surplus=RefundOrder::where(['order_no'=>$data['order_no'],'status'=>1])->sum('refund_fee');
            $this->surplus = bcsub($data['amount'],$surplus,2);
        }
    }

    protected function script()
    {
        $confirm = trans('admin.confirm');
        $cancel = trans('admin.cancel');
        return <<<SCRIPT

$('.grid-refund').on('click', function () {
    var id= $(this).data('id') 
    var surplus= $(this).data('surplus') 
    swal({
        title: "确定退款",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "$confirm",
        showLoaderOnConfirm: true,
        cancelButtonText: "$cancel",
        input: "text",
        inputPlaceholder: "填写退款金额,可退款: "+surplus+"元",
        preConfirm: function(inputValue) {
       
        if(inputValue==''){
          swal.showValidationError("金额不能为空");	   
        }else{
             return new Promise(function(resolve) {
                $.post('$this->url', {'id': id, _token:LA.token,refund_fee:inputValue}, function (data) {
                 $.pjax({container:'#pjax-container', url: '{$this->listPath}' });
                         resolve(data);
       
                 });
            });
        }
       
        }
    }).then(function(result) {
        var data = result.value;
         console.log(data);
        if (typeof data === 'object') {
            if (data.code===1000) {
                swal(data.message, '', 'success');
            } else {
                swal(data.message, '', 'error');
            }
        }
    });
       

});

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());

        return "<a class='grid-refund' href='javascript:void(0);' title='退款' data-id='{$this->id}' data-surplus='{$this->surplus}'><i class='fa fa-reply'></i></a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}