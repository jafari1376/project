@extends('layouts.app')

@section('title')
    صفحه اصلی سایت گردشگری
@endsection

@section('content')
    <div class="row p-2 m-2">
        <div class="col-12 ">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('images/img1.jpg')}}" height="340" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('images/img2.jpg')}}" height="340" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('images/img3.jpg')}}" height="340" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
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
                    <div class="card-footer">
                        <div class="custom-controller-inline">
                                <span class="p-1">
                                 {{$article->viewCount}}
                                 <i class="far fa-eye"></i>
                                 </span>
                            <span class="p-1">
                                    {{ count($article->comments) }}
                                <i class="far fa-comment"></i>
                                </span>
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
