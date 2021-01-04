@extends('admin.layouts.master')

@section('title')
    ویرایش محصول
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('/css/dropzone.min.css')}}">
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ویرایش محصول {{$product->name}}</h4>
            <div class="text-left">
                <a href="{{route('products.index')}}" class="btn btn-info">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('products.update',$product->id)}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="form-group">
                    <label for="title">عنوان </label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان را وارد کنید" id="title" value="{{$product->title}}">
                </div>
                <div class="form-group">
                    <label for="price">قیمت محصول</label>
                    <input type="text" name="price" class="form-control" placeholder="قیمت محصول را وارد کنید" id="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="photo">عکس </label>
                    <input type="hidden" name="photo_id" id="profile-photo" value="{{$product->photo_id}}">
                    <div id="photo" class="dropzone"></div>
                    <br>
                    @if(isset($product->photo_id))
                        <img class="img-bordered" width="170" height="140" src="{{$product->photo->path}}" alt="">
                    @endif
                </div>

                <div class="form-group">
                    <label for="body">متن  </label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{!! $product->body !!}</textarea>
                </div>

                <div class="form-group">
                    <button class="btn btn-info btn-block" onclick="productGallery()" type="submit">
                        <i class="fa fa-save"></i>
                        ذخیره اطلاعات
                    </button>
                </div>
            </form>
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
