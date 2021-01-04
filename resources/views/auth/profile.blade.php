@extends('layouts.app')

@section('title')
    اطلاعات پروفایل
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 m-auto">
            <div class="box">
                <div class="box-header text-center h4">اطلاعات پروفایل</div>

                <div class="box-body">
                   <div class=" table-responsive" dir="rtl">
                       <table class="table table-bordered table-hover table-striped">
                           <thead>
                           <tr>
                               <td>عنوان</td>
                               <td>مشخصات</td>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td class="w-25">نام و نام خانوادگی</td>
                               <td>{{$user->name}}</td>
                           </tr>
                           <tr>
                               <td>ایمیل</td>
                               <td>{{$user->email}}</td>
                           </tr>
                           <tr>
                               <td>عکس پروفایل</td>
                               <td>
                                   @if($user->photo_id)
                                       <img src="{{$user->photo->path}}" width="120" height="90" class="rounded-circle"  alt="">
                                   @else
                                       <img src="{{asset('/images/avatars2.png')}}" width="120" height="90" class="rounded-circle"  alt="">
                                   @endif
                               </td>
                           </tr>
                           <tr>
                               <td colspan="2">
                                   <a href="{{url('/profile/edit')}}" class="btn btn-danger btn-block">
                                       <i class="fa fa-edit"></i>
                                       ویرایش
                                   </a>
                               </td>
                           </tr>
                           </tbody>
                       </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
