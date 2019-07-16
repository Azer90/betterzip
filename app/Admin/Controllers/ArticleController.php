<?php

namespace App\Admin\Controllers;

use App\Article;
use App\Classify;
use App\Http\Controllers\Controller;
use App\Tag;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header(trans('admin.article'))
            ->description(trans('admin.list'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header(trans('admin.article'))
            ->description(trans('admin.create'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article);

        $grid->id('ID')->sortable();
        $grid->column('classify.name', '分类名');
        $grid->column('title', trans('admin.title'));
        $grid->column('keywords', trans('admin.keywords'))->style('max-width:200px;word-break:break-all;');
        $grid->description(trans('admin.description'))->style('max-width:200px;word-break:break-all;')->display(function ($text) {
            return  str_limit($text, 100, '...');
        });
       // $grid->hits(trans('admin.hits'))->style('max-width:200px;word-break:break-all;');

        $states = [
            'on'  => ['value' => 1, 'text' => '打开', 'color' => 'primary'],
            'off' => ['value' => 2, 'text' => '关闭', 'color' => 'default'],
        ];
        $grid->show(trans('admin.show'))->switch($states);
        $grid->type(trans('admin.type'));

        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));

        $grid->actions(function ($actions) {
            if (!Admin::user()->isAdministrator()) {
                $actions->disableDelete();
            }
            $actions->disableView();
        });
        $grid->disableExport();
        if (!Admin::user()->isAdministrator()) {
            $grid->tools(function ($tools) {
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
        }
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article);
        $class=Classify::select('id','name')->get()->toArray();
        $class=array_column($class,'name','id');
        $form->display('id', 'ID');

        $form->text('title', trans('admin.title'))->rules('required');
        $form->text('keywords', trans('admin.keywords'))->placeholder('多关键词之间用英文逗号隔开')->rules('required');
        $form->text('description', trans('admin.description'))->placeholder('填写文章内容描述')->rules('required|max:120');

        $form->UEditor('content',trans('admin.content'))->rules('required');
        //$form->number('hits', trans('admin.hits'))->default(0)->max(9999999)->min(0);
        $form->select('classify_id','分类')->options($class)->rules('required');
        $states = [
            'on'  => ['value' => 1, 'text' => '打开', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '关闭', 'color' => 'danger'],
        ];
        $form->radio('type',trans('admin.type'))->options(['common' => '常见问题','recommend'=>'推荐阅读']);
        $form->switch('show', trans('admin.show'))->states($states);
        $form->multipleSelect('tags','标签')->options(Tag::all()->pluck('name', 'id'));

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));
        $form->footer(function ($footer) {

            // 去掉`查看`checkbox
            $footer->disableViewCheck();

            // 去掉`继续编辑`checkbox
            $footer->disableEditingCheck();

            // 去掉`继续创建`checkbox
            $footer->disableCreatingCheck();

        });
        $form->saved(function (Form $form) {
       /*     $url=get_host().'/surpport/'.$form->model()->id;
            $api = 'http://data.zz.baidu.com/urls?site=www.ipdftoword.net&token=SXtI9P0RvVBs77sh';
            $batch_api = 'http://data.zz.baidu.com/urls?appid=1632142710156602&token=VP0W19wUFRYzdHyS&type=batch';
            $realtime_api = 'http://data.zz.baidu.com/urls?appid=1632142710156602&token=VP0W19wUFRYzdHyS&type=realtime';
            $result=article_curl($api,[$url]);
            $batch_result=article_curl($batch_api,[$url]);
            $realtime_result=article_curl($realtime_api,[$url]);
            $monolog = Log::getMonolog();
            $monolog->popHandler();
            Log::useFiles(storage_path('logs/baidu_error.log'));
            Log::info($result);
            Log::info('batch:'.$batch_result);
            Log::info('realtime:'.$realtime_result);*/
        });
        return $form;
    }
}
