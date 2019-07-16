<?php
namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\AbstractExporter;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Api\IPController;

class ExcelExpoter extends AbstractExporter
{

    public function export()
    {
        $address=[];
        $data=$this->getData();
        if(!empty($data)){
            $ips=array_column($data,'ip');
            $ips=array_unique($ips);
            foreach ($ips as $value){
                $ipdata= IPController::find($value);
                $address[$value]=$ipdata[1].$ipdata[2].$ipdata[3];
            }

        }

        Excel::create('订单报表'.date('Ymd',time()), function($excel) use ($address,$data){

            $excel->sheet('订单报表', function($sheet)use ($address,$data) {

                // 这段逻辑是从表格数据中取出需要导出的字段


                $rows = collect($data)->map(function ($item)use ($address) {
                    $data['id']=$item['id'];
                    $data['order_no']=$item['order_no'];
                    $data['payway']=$item['payway'];
                    $data['goods_name']=$item['goods_name'];
                    $data['amount']=$item['amount'];
                    $data['address']=$address[$item['ip']];
                    $data['email']=$item['email'];
                    $data['m_code']=$item['m_code'];
                    $data['created_at']=$item['created_at'];
                    switch ($item['status']){
                        case 0:
                            $str='未支付';
                            break;
                        case 1:
                            $str='已支付';
                            break;
                        case 2:
                            $str= '已退款';
                            break;
                    }
                    $data['status']=$str;
                    return $data;
                });
                $sheet->prependRow(1, array(
                    'ID', '订单号','	支付类型','商品','金额','地区','邮箱','注冊码','创建时间','状态'
                ));
                $sheet->rows($rows);

            });

        })->export('xls');

    }
}