<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class GoodsModel extends Model
{
    //定义表名
    protected $table = 'shop_goods';
    //定义自增主键
    protected $primaryKey = 'goods_id';
    //自动时间戳
    public $timestamps = false;
    //添加黑名单
    protected $guarded = [];
}
