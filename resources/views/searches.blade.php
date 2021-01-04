@extends('layouts.app')

@section('title')
    جستجو
@endsection

@section('content')
    <div class="row p-2 m-2">
        @foreach($articles as $article)
            <div class="col-md-3 col-sm-4 col-12">
                <div class="card">
                    <a href="{{url('/articles/'.$article->slug)}}" class="text-decoration-none">
                        <img class="card-img-top" src="{{$article->photos[0]->path}}" height="140" width="100%;" alt="">
                    </a>
                    <div class="card-body">
                        <a href="{{url('/articles/'.$article->slug)}}">
                            <div class="h4">
                                {{$article->title}}
                            </div>
                        </a>
                        <div class="card-text">
                            {!! Str::limit($article->body,80) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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
