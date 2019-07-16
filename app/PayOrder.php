<?php

namespace App;

use App\Http\Controllers\Api\IPController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;
class PayOrder extends Model
{
    protected $table = 'payorder';

    public function paginate()
    {
        $perPage = Request::get('per_page', 20);

        $page = Request::get('page', 1);

        $start = ($page-1)*$perPage;

        $result = self::skip($start)->take($perPage)->orderBy('id', 'desc')->get()->toArray();
        $ips=array_column($result,'ip');
        $ips=array_unique($ips);
        foreach ($ips as $value){
           $ipdata= IPController::find($value);
           $address[$value]=$ipdata[1].$ipdata[2].$ipdata[3];
        }
       foreach ($result  as $key=>$value){
           $result[$key]['address']=$address[$value['ip']];
       }

        $result = static::hydrate($result);
        $total =self::count();
        $paginator = new LengthAwarePaginator($result, $total, $perPage);

        $paginator->setPath(url()->current());

        return $paginator;
    }

    public static function with($relations)
    {
        return new static;
    }

}
