@extends('admin.layouts.master')

@section('title')
    ایجاد منطقه جدید
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('/css/dropzone.min.css')}}">
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ایجاد منطقه گردشگری</h4>
            <div class="text-left">
                <a href="{{route('articles.index')}}" class="btn btn-info">
                    <i class="fa fa-list"></i>
                    لیست
                </a>
            </div>
        </div>
        <div class="box-body">
            <form action="{{route('articles.store')}}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">عنوان گردشگری</label>
                    <input type="text" name="title" class="form-control" placeholder="عنوان گردشگری را وارد کنید" id="title" value="{{old('title')}}">
                </div>

                <div class="form-group">
                    <label for="photo">گالری تصاویر</label>
                    <input type="hidden" name="photo_id[]" id="product-photo">
                    <div id="photo" class="dropzone"></div>
                </div>

                <div class="form-group">
                    <label for="body">متن گردشگری </label>
                    <textarea name="body" class="form-control" id="body" placeholder="متنی درباره منطقه گردشکری را وارد کنید..." cols="30" rows="10">{{old('body')}}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" onclick="productGallery()" type="submit">
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

    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var photosGallery = []
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
            document.getElementById('product-photo').value = photosGallery
        }
        CKEDITOR.replace('body',{
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage'
        })

    </script>

@endsection
