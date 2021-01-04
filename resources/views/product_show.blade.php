@extends('layouts.app')

@section('title')
    محصول
@endsection

@section('content')
    <div class="row p-2 m-2">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-body m-auto ">
                    <img src="{{$product->photo->path}}" width="400" height="240" class="m-auto" alt="">
                    <h4 class="p-2"> {{$product->title}}</h4>
                    <h4 class=" text-danger"> {{$product->price}}</h4>
                    <a class="btn btn-info" href="{{route('cart.add', ['id' => $product->id])}}"> افزودن سبد خرید</a>
                    <p class="text-justify p-2 m-2">
                        {!! $product->body !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2 m-2">
        @foreach($products as $product)
            <div class="col-md-3 col-sm-4 col-12">
                <div class="card">
                    <a href="{{url('/product/'.$product->slug)}}" class="text-decoration-none">
                        <img class="card-img-top" src="{{$product->photo->path}}" height="140" width="100%;" alt="">
                    </a>
                    <div class="card-body">
                        <a href="{{url('/product/'.$product->slug)}}">
                            <div class="h4">
                                {{$product->title}}
                            </div>
                        </a>
                        <h4 class="text-center text-danger">
                            {{$product->price}}تومان
                        </h4>
                        <div class="card-text">
                            {!! Str::limit($product->body,80) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
