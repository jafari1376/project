@extends('admin.layouts.master')

@section('title')
    گردشگری
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('/css/dropzone.min.css')}}">
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ویرایش گردشگری {{$article->name}}</h4>
            <div class="text-left">
                <a href="{{route('articles.index')}}" class="btn btn-info">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('articles.update',$article->id)}}" method="POST">
                @csrf
                {{method_field('PATCH')}}
                <input type="hidden" name="id" value="{{$article->id}}">
                <div class="form-group">
                    <label for="title">عنوان گردشگری</label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان گردشگری را وارد کنید" id="title" value="{{$article->title}}">
                </div>

                <div class="form-group">
                    <label for="photo">گالری تصاویر</label>
                    <input type="hidden" name="photo_id[]" id="product-photo" >
                    <div id="photo" class="dropzone"></div>
                    <br>
                    <div class="row">
                        @foreach($article->photos as $photo)
                            <div class="col-2" id="updated_photo_{{$photo->id}}">
                                <img class="img-responsive" width="120" height="120" src="{{$photo->path}}">
                                <button type="button" class="btn btn-danger" onclick="removeImages({{$photo->id}})">حذف</button>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="body">متن گردشگری </label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{!! $article->body !!}</textarea>
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
    <script type="text/javascript" src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/dropzone.min.js')}}"></script>

    <script>
        Dropzone.autoDiscover = false;
        var photosGallery = []
        var photos = [].concat({{$article->photos->pluck('id')}})
        var drop = new Dropzone('#photo', {
            addRemoveLinks: true,
            url: "{{ route('photos.upload') }}",
            sending: function(file, xhr, formData){
                formData.append("_token","{{csrf_token()}}")
            },
            success: function(file, response){
                photosGallery.push(response.photo_id)
            }
        });
        productGallery = function(){
            document.getElementById('product-photo').value = photosGallery.concat(photos)
        }
        CKEDITOR.replace('body',{
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage'
        })

    </script>

@endsection
