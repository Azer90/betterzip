<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\RefundOrderExpoter;
use App\RefundOrder;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class RefundOrderController extends Controller
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
            ->header('退款订单')
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
            ->header('退款订单')
            ->description(trans('admin.list'))
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new RefundOrder);
        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->equal('order_no', '原支付订单号');
            $filter->like('out_refund_no', '退款订单');
            $filter->between('created_at', '日期')->datetime();

            $filter->equal('status','退款状态')->radio([
                ''   => 'All',
                0    => '成功',
                1    => '失败',
            ]);

        });
        $grid->id('ID')->sortable();
        $grid->out_refund_no('退款订单');
        $grid->refund_fee('退款金额');
        $grid->total_fee('订单总金额');
        $grid->order_no('原订单号');
        $grid->trade_no('交易凭证号');
        $grid->refund_desc('退款原因');

        $grid->status(trans('admin.status'))->display(function ($released) {

            return $released ? '<span style="color: #5452ff">成功</span>' : $str='<span style="color: red">失败</span>' ;
        });
        $grid->exporter(new RefundOrderExpoter());
        $grid->disableActions();
        $grid->disableCreateButton();
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
        $show = new Show(RefundOrder::findOrFail($id));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new RefundOrder);

        return $form;
    }
}
