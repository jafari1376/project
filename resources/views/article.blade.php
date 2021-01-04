@extends('layouts.app')

@section('title')
    منطقه گردشگری
@endsection

@section('content')
    <div class="row p-2 m-2">
        <div class="col-12">
            <h3 class="p-2 my-3">
                {{$article->title}}
            </h3>
            <div class="d-md-flex">
                <div class="bg-second rounded-pill  p-1 mb-4 ft-13 mx-1"> نویسنده و مؤلف :{{$article->user->name}}</div>
                <div class="bg-second rounded-pill p-1 mb-4 ft-13 mx-1"> تاریخ انتشار : {{verta()->instance($article->created_at)->format('%d %B %Y')}}</div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mt-1 mb-3">
                <div class="card-body">
                    <div class="text-justify text-secondary">
                        {!!$article->body!!}
                    </div>
                    <br>
                    @foreach($article->photos as $photo)
                        <img src="{{$photo->path}}" width="100%;" class="p-2 m-2 rounded" alt="">
                    @endforeach
                    <hr class="bg-light">
                    <div class="custom-controller-inline text-muted">
                        <span class="p-1">
                    {{$article->viewCount}}
                    <i class="fa fa-eye"></i>
                    </span>
                        <span class="p-1">
                    {{count($article->comments) }}
                    <i class="fa fa-comment"></i>
                    </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2 m-2">
        @foreach($articles as $article_ac)
            <div class="col-md-3 col-sm-4 col-12">
                <div class="card">
                    <a href="{{url('/articles/'.$article_ac->slug)}}" class="text-decoration-none">
                        <img class="card-img-top" src="{{$article_ac->photos[0]->path}}" height="140" width="100%;" alt="">
                    </a>
                    <div class="card-body">
                        <a href="{{url('/articles/'.$article_ac->slug)}}">
                            <div class="h4">
                                {{$article_ac->title}}
                            </div>
                        </a>
                        <div class="card-text">
                            {!! Str::limit($article_ac->body,80) !!}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="custom-controller-inline">
                                <span class="p-1">
                                 {{$article_ac->viewCount}}
                                 <i class="far fa-eye"></i>
                                 </span>
                            <span class="p-1">
                                    {{ count($article_ac->comments) }}
                                <i class="far fa-comment"></i>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row p-2 m-2">
        <div class="col-12">
            @include('layouts.comments',['commentable_id'=>$article->id,'subject'=>$article])
        </div>
    </div>
@endsection
