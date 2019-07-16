<?php
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Link;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function linkImport(Request $request){

        $path = $request->file('file')->store('public');
        $filePath = storage_path().'/app/'.$path;

        Excel::selectSheets('Sheet1')->load($filePath, function($reader) use ($filePath){
            $reader->noHeading();
            $reader->ignoreEmpty();
            $data = $reader->get();
           foreach ($data as $k=>$v){
               if(empty($v[0])){
                   continue;
               }
               $link_data[$k]['name']=$v[0];
               $link_data[$k]['url']=$v[1];
               $link_data[$k]['show']=1;
               $link_data[$k]['updated_at']=date('Y-m-d h:i:s',time());
               $link_data[$k]['created_at']=date('Y-m-d h:i:s',time());
           }
           unset($data);
           Link::insert($link_data);
            @unlink($filePath);

        }, 'UTF-8');

        $msg['code'] = 1000;
        $msg['message'] = '导入成功';
        return response()->json($msg);
    }

}