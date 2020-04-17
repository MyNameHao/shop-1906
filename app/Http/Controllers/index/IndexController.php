<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\GoodsModel;

class IndexController extends Controller
{
    public function index(Request $request){
        $page = $request->get('page','1');
        $number=4;
        $goodsmodel = new GoodsModel();
        $goods_info = $goodsmodel->limit($number)->get();
        $count=$goodsmodel->count();
        $pagenum=ceil($count/$number);
        //求偏移量
        $offset=($page-1)*$number;
        $goods=$goodsmodel->offset($offset)->limit($number)->get();
        if($goods){
            $goods = $goods->toArray();
        }
        if($goods_info){
            $goods_info = $goods_info->toArray();
        }
        if($request->ajax()){
            return view('index.page',['goods'=>$goods]);
        }else{
            return view('index.index',['page'=>$pagenum,'newgoods'=>$goods_info,'goods'=>$goods,'pages'=>$page]);
        }
    }
    public function test(Request $request)
    {
        $imgs=$request->file();
        $this->upload($request,$imgs);
    }
    public function upload($request,$imgs ){
        $img=[];
       if($request->hasFile('images')){
        foreach($imgs['images'] as $k=>$v){
            if($v->isValid()){
                $extension=$v->extension();
                $filename=time().rand(0000,9999).'.'.$extension;
                $store_result=$v->storeAs('public/image',$filename);
                $filepath='/storages/image/'.$filename;
                $output=[
                    'extension'=>$extension,
                    'store_result'=>$store_result,
                    'filepath'=>$filepath,
                    'filename'=>$filename
                ];
                $img[]=$output;
            }else{
                echo '未获取到上传文件或上传过程出错1';die;
            }
        }
       }else{
           echo '未获取到上传文件或上传过程出错';die;
       }
        dd($img);
    }
}
