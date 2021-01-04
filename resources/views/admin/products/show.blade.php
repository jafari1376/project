@extends('admin.layouts.master')

@section('title')
    محصولات {{$product->title}}
@endsection

@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center"> محصولات {{$product->title}}</h4>
            <div class="text-left">
                <a href="{{route('products.index')}}" class="btn btn-info">
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
                                <td class="w-25">عنوان محصولات</td>
                                <td>{{$product->title}}</td>
                            </tr>
                            <tr>
                                <td>قیمت محصولات</td>
                                <td>{{$product->price}}</td>
                            </tr>
                            <tr>
                                <td>عکس  محصولات</td>
                                <td>
                                    <img src="{{$product->photo->path}}" class="p-2 m-2 rounded" alt="" height="140" width="170">
                                </td>
                            </tr>

                            <tr>
                                <td>متن محصولات</td>
                                <td class="p-2 m-2 text-justify">{!! $product->body !!}</td>
                            </tr>
                            <tr>
                                <td>تاریخ ایجاد محصولات</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($product->created_at)->formatDifference()}}</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
        </div>
    </div>

@endsection

