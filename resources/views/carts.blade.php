@extends('layouts.app')

@section('title')
سبد خرید
@endsection

@section('content')
    @if(Session::has('cart'))
        <main class="cart vh-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="cart col-xl-9 col-lg-8 col-md-12 order-1">
                        <div class="cart-header">
                            <h1 class="text-center font_2">سبد خرید</h1>
                        </div>
                        <div class="table-responsive checkout-content default">
                            <table class="table">

                                <thead>
                                <tr class="thead-light">
                                    <th>عکس محصول</th>
                                    <th>نام محصول</th>
                                    <th>عملیات</th>
                                    <th>تعداد</th>
                                    <th>قیمت واحد</th>
                                    <th>قیمت کل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart->items as $product)
                                    <tr class="checkout-item">
                                        <td>
                                            <a href="{{url('/product/'.$product['item']->slug)}}"><img src="{{$product['item']->photo->path}}" alt="{{$product['item']->title}}" height="100" width="130"></a>
                                        </td>
                                        <td>
                                            <h3 class="checkout-title">
                                                {{$product['item']->title}}
                                            </h3>
                                        </td>
                                        <td>
                                            <div class="input-group btn-block quantity text-center">
                                                <a class="btn btn-info" data-toggle="tooltip" title="اضافه"  href="{{route('cart.add', ['id' => $product['item']->id])}}"><i class="fa fa-plus"></i></a>
                                                <button type="button" data-toggle="tooltip" title="کم" class="btn btn-danger" onclick="event.preventDefault();
                                                    document.getElementById('remove-cart-item_{{$product['item']->id}}').submit();"><i class="fa fa-minus"></i></button>
                                                <form id="remove-cart-item_{{$product['item']->id}}" action="{{ route('cart.remove', ['id' => $product['item']->id]) }}" method="post" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                        <td>{{$product['qty']}} عدد</td>
                                        <td>{{$product['item']->price }} تومان</td>
                                        <td>{{($product['qty'])* ($product['item']->price)}} تومان</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <aside class="cart col-xl-3 col-lg-4 col-md-6 center-section order-2">
                        <div class="card-body text-center">
                                    <ul class="checkout-summary-summary">
                                        <li><span>مبلغ کل </span><span>( {{Session::get('cart')->totalQty}} کالا)</span><span>{{Session::get('cart')->totalPointPrice()}} تومان</span></li>
                                        <li>
                                            <span>هزینه ارسال</span>
                                            <span>رایگان<span class="wiki wiki-holder"><span class="wiki-sign"></span>
                                                </span></span>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="card">
                                        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                        <div class="checkout-summary-price-value">
                                            <span class="checkout-summary-price-value-amount">{{Session::get('cart')->totalPointPrice()}}</span>تومان
                                        </div>
                                        <a href="{{url('/payment')}}" class="btn btn-primary">
                                                    ثبت سفارش
                                           <i class="fa fa-shopping-cart"></i>
                                        </a>
                                        <div>
                                        </div>
                                    </div>
                        </div>
                    </aside>
                </div>
            </div>
        </main>
    @else

        <div class="text-center display-1">
            <i class="fa fa-shopping-cart">
            </i>
            سبد خرید شما خالی می باشد
        </div>

    @endif
@endsection
