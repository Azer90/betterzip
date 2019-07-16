<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\ExcelExpoter;
use App\Admin\Extensions\Refund;
use App\PayOrder;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Facades\DB;

class PayOrderController extends Controller
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
            ->header(trans('admin.pay_order'))
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
        $grid = new Grid(new PayOrder);
        $grid->header(function ($query) {
            $pay_stayus = $query->select(DB::raw('count(status) as count, status'))
                ->groupBy('status')->get()->pluck('count', 'status')->toArray();
            if(!isset($pay_stayus[0])){
                $pay_stayus[0]=0;
            }
           if(!isset($pay_stayus[1])){
               $pay_stayus[1]=0;
           }
            if(!isset($pay_stayus[2])){
                $pay_stayus[2]=0;
            }
            $doughnut = view('admin.chart.order', compact('pay_stayus'));

            return new Box('支付比例', $doughnut);
        });

        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            // 在这里添加字段过滤器
            $filter->equal('order_no', '订单号');
            $filter->like('goods_name', '商品名');
            $filter->equal('email', '邮箱')->email();
            $filter->between('created_at', '日期')->datetime();
            $filter->equal('payway','支付类型')->radio([
                '' => 'All',
                'wechat' => '微信',
                'alipay' => '支付宝',
            ]);
            $filter->equal('status','支付状态')->radio([
                ''   => 'All',
                0    => '未付款',
                1    => '已付款',
                2    => '已退款',
            ]);

        });
        $grid->id('ID');
        $grid->column('order_no', trans('admin.order_no'));
        $grid->payway(trans('admin.payway'));
        $grid->goods_name(trans('admin.goods'));
        $grid->amount(trans('admin.amount'));
        $grid->address('地区');
        $grid->trade_no('交易订单号');
        $grid->created_at(trans('admin.created_at'));
        $grid->updated_at(trans('admin.updated_at'));
        //$grid->openid('用户标识');
        $grid->status(trans('admin.status'))->display(function ($released) {
            switch ($released){
                case 0:
                    $str='<span style="color: red">未支付</span>';
                    break;
                case 1:
                    $str='<span style="color: #5452ff">已支付</span>';
                    break;
                case 2:
                    $str= '<span style="color: #ff299f">已退款</span>';
                    break;
            }
            return $str;
        });
        $grid->exporter(new ExcelExpoter());
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();
            $actions->prepend(new Refund($actions->row));
        });
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
        $show = new Show(PayOrder::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PayOrder);



        return $form;
    }
}
