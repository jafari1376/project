@extends('layouts.app')

@section('title')
    مناطق گردشگری
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
@endsection
