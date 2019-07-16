<?php
namespace App\Admin\Extensions\Tools;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Tools\AbstractTool;
use Illuminate\Support\Facades\Request;

class ImportLink extends AbstractTool
{
    private $url;
    public function __construct()
    {
        $this->url = route('linkImport');

    }
    protected function script()
    {
        $url = Request::getRequestUri();
        return <<<EOT

    $('input:file.import').change(function () {
           var file= this.files[0];
           var formData = new FormData();
           formData.append("file",file);
           formData.append("_token",LA.token);
       
         $.ajax({
                   url: '$this->url',
                   data: formData,
                   type: 'Post',
                   dataType: "json",
                   cache: false,//上传文件无需缓存
                   processData: false,//用于对data参数进行序列化处理 这里必须false
                   contentType: false, //必须
                   success: function (result) {
                      $.pjax({container:'#pjax-container', url: '$url' });
                   },
               })

});

EOT;
    }

    public function render()
    {
        Admin::script($this->script());

        return view('admin.tools.import');
    }
}