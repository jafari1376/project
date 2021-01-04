@extends('admin.layouts.master')

@section('title')
    ویرایش کاربر |  {{$user_au->name}}
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> ویرایش کاربر {{$user_au->name}}</h4>
            <div class="text-left">
                <a href="{{route('users.index')}}" class="btn btn-info">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('users.update',$user_au->id)}}" method="POST">
               @csrf
                {{method_field('PATCH')}}
                <input type="hidden" value="{{$user_au->id}}" name="id">
                <div class="form-group">
                    <label for="name">نام کاربری</label>
                    <input type="text" class="form-control" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید..." value="{{$user_au->name}}" id="name">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" name="email" placeholder="email@test.com" value="{{$user_au->email}}" id="email">
                </div>
                <div class="form-group">
                    <label for="level">سطح دسترسی</label>
                    <select name="level" id="level" class="form-control">
                        <option value="user" @if($user_au->level=='user') selected @endif>کاربر عادی</option>
                        <option value="admin" @if($user_au->level=='admin') selected @endif>مدیر</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="admin_active">نقش مدیریتی</label>
                    <select name="admin_active" id="admin_active" class="form-control">
                        <option value="0" @if($user_au->admin_active==0) selected @endif>غیر فعال</option>
                        <option value="1" @if($user_au->admin_active==1) selected @endif>فعال</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-info btn-block">
                    ویرایش اطلاعات
                    <i class="fa fa-refresh"></i>
                </button>
            </form>
        </div>
    </div>

@endsection

