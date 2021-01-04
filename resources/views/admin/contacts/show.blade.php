@extends('admin.layouts.master')

@section('title')
    انتقاد و پشنهاد | {{$contact->title}}
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> انتقاد و پیشنهاد {{$contact->title}}</h4>
            <div class="text-left">
                <a href="{{route('contacts.index')}}" class="btn btn-info">
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
                        <td>پروفایل کاربر </td>
                        <td>
                            @if($contact->user->photo_id)
                                <img src="{{$contact->user->photo->path}}" height="80" class="img-circle rounded-circle" width="80" alt="">
                            @else
                                <img src="{{asset('images/avatars2.png')}}" height="80" class="img-circle rounded-circle" width="80" alt="">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>نام کاربر</td>
                        <td>{{$contact->user->name}}</td>
                    </tr>
                    <tr>
                        <td>ایمیل کاربر</td>
                        <td>{{$contact->user->email}}</td>
                    </tr>
                    <tr>
                        <td>سطح دسترسی</td>
                        <td>
                            @if($contact->user->level=='user')
                                <div class="badge badge-info">کاربر عادی</div>
                           @elseif($contact->user->level=='admin')
                                <div class="badge badge-success">مدیر</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>عنوان</td>
                        <td>{{$contact->title}}</td>
                    </tr>
                    <tr>
                        <td>متن انتقاد یا پیشنهاد</td>
                        <td class="text-justify">{{$contact->description}}</td>
                    </tr>
                    <tr>
                        <td>تاریخ ایجاد</td>
                        <td>{{\Hekmatinasser\Verta\Verta::instance($contact->created_at)->formatDifference()}}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection

