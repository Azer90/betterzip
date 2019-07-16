<?php
namespace App\Admin\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\PayOrder;
use App\RefundOrder;
use Illuminate\Http\Request;
use Yansongda\Pay\Pay;

class RefundController extends Controller
{
    use BaseController;

    /**
     *退款
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Yansongda\Pay\Exceptions\GatewayException
     * @throws \Yansongda\Pay\Exceptions\InvalidArgumentException
     * @throws \Yansongda\Pay\Exceptions\InvalidConfigException
     * @throws \Yansongda\Pay\Exceptions\InvalidSignException
     */
    public function init(Request $request){

        $data=$request->all();
        $order=PayOrder::find($data['id']);
        $refund_fee=$data['refund_fee'];
        $refund_desc='正常退款';
        $surplus=RefundOrder::where(['order_no'=>$order['order_no'],'status'=>1])->sum('refund_fee');
        $surplus=bcsub($order['amount'],$surplus,2);
        if(empty($order['status'])){
            $msg['code'] = 1001;
            $msg['message'] = '该订单未支付,不能退款';

        }elseif ($order['status']===2){
            $msg['code'] = 1002;
            $msg['message'] = '该订单已全额退款';
        }elseif ((float)$refund_fee>(float)$surplus){
            $msg['code'] = 1003;
            $msg['message'] = '退款金额不能大于'.$surplus;
        }else{
            $out_refund_no=$this->createOrder($refund_fee,$order['order_no'],$refund_desc,$order['amount']);
            switch ($order['payway']){
                case 'alipay':
                    $alipay_order = [
                        'out_trade_no' => $order['order_no'],
                        'out_request_no' => $out_refund_no,
                        'refund_amount' => $refund_fee,
                        'refund_reason' => $refund_desc,
                    ];

                    $result = Pay::alipay($this->ali_config)->refund($alipay_order);
                    if($result['code']==10000&&$result['msg']=='Success'){
                        RefundOrder::where(['out_refund_no'=>$out_refund_no])->update(['status'=>1,'trade_no'=>$result['trade_no']]);
                        $surplus=RefundOrder::where(['order_no'=>$result['out_trade_no'],'status'=>1])->sum('refund_fee');
                        if((float)$order['amount']==(float)($surplus)){
                            PayOrder::where(['order_no'=>$result['out_trade_no']])->update(['status'=>2]);
                        }

                        $msg['code'] = 1000;
                        $msg['message'] = '退款成功';
                    }
                    break;
                case 'wechat':
                    $wechat_order = [
                        'out_trade_no' => $order['order_no'],
                        'out_refund_no' => $out_refund_no,
                        'total_fee' => (int)($order['amount']*100),
                        'refund_fee' => (int)($refund_fee*100),
                        'refund_desc' => $refund_desc,
                    ];
                    $result =Pay::wechat($this->wechat_config)->refund($wechat_order);
                    if($result['result_code']==='SUCCESS'){

                        RefundOrder::where(['out_refund_no'=>$result['out_refund_no']])->update(['status'=>1,'trade_no'=>$result['transaction_id']]);
                        $surplus=RefundOrder::where(['order_no'=>$result['out_trade_no'],'status'=>1])->sum('refund_fee');
                        if($result['total_fee']==(int)($surplus*100)){
                            PayOrder::where(['order_no'=>$result['out_trade_no']])->update(['status'=>2]);
                        }

                        $msg['code'] = 1000;
                        $msg['message'] = '退款成功';
                    }
                    break;
            }
        }

        return response()->json($msg);
    }


    /**
     * 创建退款订单
     * @param $refund_fee
     * @param $order_no
     * @param $refund_desc
     * @param $total_fee
     * @return string
     */
    private function createOrder($refund_fee,$order_no,$refund_desc,$total_fee){
        $now_time = date('Y-m-d H:i:s',time());
        $out_refund_no=date('YmdHis').mt_rand(10000,99999);

        $ret=RefundOrder::insert([
            'refund_fee' => $refund_fee,
            'out_refund_no' =>$out_refund_no,
            'order_no' => $order_no,
            'refund_desc' => $refund_desc,
            'total_fee' => $total_fee,
            'updated_at' => $now_time,
            'created_at' => $now_time,
        ]);
        if($ret){
            return $out_refund_no;
        }

    }

}