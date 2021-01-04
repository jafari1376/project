@extends('layouts.app')

@section('title')
    ویرایش اطلاعات پروفایل
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('/css/dropzone.min.css')}}">
@endsection

@section('content')

    <div class="row">
        <div class="col-12 col-md-8 m-auto">
            <div class="card">
                <div class="card-header text-center h4">ویرایش اطلاعات پروفایل</div>

                <div class="card-body">
                    <form action="{{route('profile.update',$user->id)}}" method="POST">
                        @csrf
                        {{method_field('PATCH')}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="name">نام کاربری</label>
                            <input type="text" name="name" value="{{$user->name}}" id="name" class="form-control" placeholder="نام کاربری خود را وارد کنید...">
                        </div>
                        <div class="form-group">
                            <label for="password">کلمه عبور</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="جهت تغییر کلمه عبور خود را وارد کنید...">
                        </div>
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" name="email" value="{{$user->email}}" id="email" class="form-control" placeholder="ایمیل خود را وارد کنید...">
                        </div>

                        <div class="form-group">
                            <label>عکس پروفایل</label>
                            <input type="hidden" name="photo_id" id="profile-photo" value="{{$user->photo_id}}">
                           <div class="row text-center">
                               <div class="col-6">
                                   <div id="photo" class="dropzone"></div>
                               </div>
                               <div class="col-6">
                                   @if($user->photo_id)
                                       <img class="img-bordered rounded-circle" width="110" height="110" src="{{$user->photo->path}}" alt="">
                                   @else
                                       <img class="img-bordered rounded-circle" width="110" height="110" src="{{url('images/avatars2.png')}}" alt="">
                                   @endif
                               </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info btn-block">
                                <i class="fa fa-edit"></i>
                                ویرایش اطلاعات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('/js/dropzone.min.js')}}"></script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var photosGallery
        var drop = new Dropzone('#photo',{
            addRemoveLinks:true,
            maxFiles :1,
            acceptedFiles: ".svg,.jpg,.png,.jpeg,.bmp,.gif",
            url:"{{route('photos.upload')}}",
            sending:function(file,xhr,formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success:function(file,response){
                document.getElementById('profile-photo').value = response.photo_id
            }
        });

    </script>

@endsection
