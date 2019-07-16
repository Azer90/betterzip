<?php
namespace App\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class UEditor extends Field
{
    protected $view = 'admin.u-editor';

    protected static $css = [];

    protected static $js = [
        'laravel-u-editor/ueditor.config.js',
        'laravel-u-editor/ueditor.all.min.js',
        'laravel-u-editor/lang/zh-cn/zh-cn.js'
    ];

    public function render()
    {
        $cs=csrf_token();

        $this->script = <<<EOT

        //解决第二次进入加载不出来的问题

        UE.delEditor("ueditor");

        // 默认id是ueditor

        var ue = UE.getEditor('ueditor'); 

        ue.ready(function () {

            ue.execCommand('serverparam', '_token', '$cs');

        });

 

EOT;
        return parent::render();

    }
}