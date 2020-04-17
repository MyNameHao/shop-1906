<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\model\GoodsModel;
use Illuminate\Http\Request;

class ShopSingle extends Controller
{
    public function index(Request $request){
        $id=$request->get('goods_id');
        if(empty($id)){
            echo "<script>window.history.go(-1);alert('商品不存在')</script>";die;
        }
        $goodsmodel= new GoodsModel();
        $goodsinfo=$goodsmodel->where(['goods_id'=>$id])->first();
        if(!empty($goodsinfo)){
            $goodsinfo = $goodsinfo->toArray();
        }else{
            echo "<script>window.history.go(-1);alert('商品不存在')</script>";die;
        }
        return view('index.single',['goods'=>$goodsinfo]);
    }
}
