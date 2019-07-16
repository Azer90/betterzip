<?php
namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\AbstractExporter;
use Maatwebsite\Excel\Facades\Excel;


class RefundOrderExpoter extends AbstractExporter
{

    public function export()
    {

        Excel::create('退款订单报表'.date('Ymd',time()), function($excel) {

            $excel->sheet('退款订单报表', function($sheet) {

                // 这段逻辑是从表格数据中取出需要导出的字段

                $rows = collect($this->getData())->map(function ($item) {
                    $data['id']=$item['id'];
                    $data['out_refund_no']=$item['out_refund_no'];
                    $data['refund_fee']=$item['refund_fee'];
                    $data['total_fee']=$item['total_fee'];
                    $data['order_no']=$item['order_no'];
                    $data['refund_desc']=$item['refund_desc'];
                    $data['created_at']=$item['created_at'];
                    switch ($item['status']){
                        case 0:
                            $str='失败';
                            break;
                        case 1:
                            $str='成功';
                            break;
                    }
                    $data['status']=$str;
                    return $data;
                });
                $sheet->prependRow(1, array(
                    'ID', '退款订单','退款金额','订单总金额','原订单号','退款原因','退款时间','状态'
                ));
                $sheet->rows($rows);

            });

        })->export('xls');
    }
}