@extends('admin.layouts.master')

@section('title')
    پنل مدیریت
@endsection

@section('content')

    <div class=" text-center">
        <div class="row my-4 text-white">
            <div class="col-md-3 col-12 my-2">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h1> کاربران</h1>
                        <a href="{{url('/admin/users')}}" class="text-light">
                            <h1><i class="fa fa-users"></i></h1>
                        </a>
                        {{$arrays['userCount']}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12 my-2">
                <div class="card bg-info">
                    <div class="card-body">
                        <h1> ارتباطات</h1>
                        <a href="{{url('/admin/contacts')}}" class="text-light">
                            <h1><i class="fa fa-mobile"></i></h1>
                        </a>
                        {{$arrays['contactCount']}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12 my-2">
                <div class="card bg-danger">
                    <div class="card-body">
                        <h1>تعداد نظرات</h1>
                        <a href="{{url('/admin/comments')}}" class="text-light">
                            <h1><i class="fa fa-comments"></i></h1>
                        </a>
                        {{$arrays['commentCount']}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-12 my-2">
                <div class="card bg-primary">
                    <div class="card-body">
                        <h1> مناطق گردشگری</h1>
                        <a href="{{url('/admin/article')}}" class="text-light">
                            <h1><i class="fa fa-images"></i></h1>
                        </a>
                        {{$arrays['articleCount']}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">
                    <strong class="h2 p-2 m-2">
                        به صفحه مدیریت سایت خوش آمدید!
                    </strong>
                    <p class="font-weight-bolder h3 p-2 m-2">
                        سایت ما امیدوار است شما مدیران و کاربران را از سیستم ما راضی باشید.
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
