@foreach($goods as $k=>$v)
    <a href="{{url('/goods/single'.'?goods_id='.$v['goods_id'])}}">
    <div class="col s6">
        <div class="content">
            <img src="{{$v['goods_img']}}" alt="">
            <h6><a href="">{{$v['goods_name']}}</a></h6>
            <div class="price">
                {{$v['goods_price']*0.5}} <span>{{$v['goods_price']}}</span>
            </div>
            <button class="btn button-default">ADD TO CART</button>
        </div>
    </div>
    </a>
@endforeach