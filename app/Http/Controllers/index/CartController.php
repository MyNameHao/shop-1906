<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use App\model\CartModel;
use App\model\GoodsModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $user_id=1;
        $cartmodel=new CartModel();
//        $cartinfo=$cartmodel->where(['user_id'=>$user_id])->get();
        $cartinfo=$cartmodel->join('shop_goods','shop_cart.goods_id','=','shop_goods.goods_id')->get();
        if($cartinfo){
            $cartinfo = $cartinfo->toArray();
        }else{
            echo "<script>window.history.go(-1);alert('页面有误请稍后重试')</script>";die;
        }

        return view('index.cart',['cartinfo'=>$cartinfo]);

    }
    public function cart(Request $request){
        $goodsmodel= new GoodsModel();
        $user_id=1;
        $goods_id= $request->get('goods_id');
        $goods_info=$goodsmodel->where(['goods_id'=>$goods_id])->first();
        if($goods_info){
            $goods_info = $goods_info->toArray();
        }else{
            echo "<script>window.history.go(-1);alert('商品不存在')</script>";die;
        }
        $cartinfo=[
            'goods_id'=>$goods_info['goods_id'],
            'user_id'=>$user_id
        ];
        $cartmodel=new CartModel();
        $res=$cartmodel->create($cartinfo);
        if($res->cart_id){
            return redirect(url('/cart'));
        }else{
            echo "<script>window.history.go(-1);alert('加入购物车失败请稍后重试')</script>";die;
        }
    }
}
