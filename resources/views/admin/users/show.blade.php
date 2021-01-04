@extends('admin.layouts.master')

@section('title')
    کاربر {{$user_au->name}}
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> کاربر {{$user_au->name}}</h4>
            <div class="text-left">
                <a href="{{route('users.index')}}" class="btn btn-info">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">

            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <thead class="table-dark">
                    <tr>
                        <td>عنوان</td>
                        <td>مشخصات</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>عکس پروفایل</td>
                        <td>
                            @if($user_au->photo)
                                <img src="{{$user_au->photo->path}}" class="img-bordered" height="80" width="80" alt="">
                            @else
                                <img src="{{asset('images/avatars2.png')}}" class="img-fluid" height="80" width="80" alt="">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>نام کاربر</td>
                        <td>{{$user_au->name}}</td>
                    </tr>
                    <tr>
                        <td>ایمیل</td>
                        <td>{{$user_au->email}}</td>
                    </tr>
                    <tr>
                        <td>تعداد نظرات</td>
                        <td>
                            @if($user_au->comments)
                                {{count($user_au->comments)}}
                            @else
                               0
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td>سطح دسترسی</td>
                        <td>
                            @if($user_au->level=='user')
                                <div class="badge badge-info">کاربر عادی</div>
                          @elseif($user_au->level=='admin')
                                <div class="badge badge-primary">مدیر</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>تاریخ ایجاد کاربر</td>
                        <td>{{\Hekmatinasser\Verta\Verta::instance($user_au->created_at)->formatDifference()}}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

