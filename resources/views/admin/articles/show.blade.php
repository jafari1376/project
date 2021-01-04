@extends('admin.layouts.master')

@section('title')
    گردشگری {{$article->title}}
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> گردشگری {{$article->title}}</h4>
            <div class="text-left">
                <a href="{{route('articles.index')}}" class="btn btn-info">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">

                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                        <tr>
                            <td>عنوان</td>
                            <td>مشخصات</td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-25">عنوان گردشگری</td>
                                <td>{{$article->title}}</td>
                            </tr>
                            <tr>
                                <td>نویسنده گردشگری</td>
                                <td>{{$article->user->name}}</td>
                            </tr>
                            <tr>
                                <td>عکس های منطقه گردشگری</td>
                                <td>
                                    @foreach($article->photos as $photo)
                                    <img src="{{$photo->path}}" class="p-2 m-2 rounded" alt="" height="140" width="170">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>تعداد بازدید</td>
                                <td>{{$article->viewCount}}</td>
                            </tr>
                            <tr>
                                <td>تعداد نظرات</td>
                                <td>{{$article->commentCount}}</td>
                            </tr>
                            <tr>
                                <td>متن گردشگری</td>
                                <td class="p-2 m-2 text-justify">{!! $article->body !!}</td>
                            </tr>
                            <tr>
                                <td>تاریخ ایجاد گردشگری</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($article->created_at)->formatDifference()}}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
        </div>
    </div>

@endsection

