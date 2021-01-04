@extends('admin.layouts.master')

@section('title')
    محصولات
@endsection


@section('content')
    <div class="box">
        <div class="box-header">
            <h4 class="text-center"></h4>
            <div class="text-left">
                <a href="{{route('products.create')}}" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    جدید
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($products->isEmpty())
                <div class="text-center my-2">
                    <div class="h1 text-muted">
                        <i class="far fa-frown-open h1"></i>
                    </div>
                    <h2 class="text-muted">موردی برای نمایش وجود ندارد</h2>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead class="table-dark">
                        <tr>
                            <td>عنوان محصولات</td>
                            <td>قیمت</td>
                            <td>عکس</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)

                            <tr>
                                <td><a href="{{route('products.show',$product->id)}}"> {{$product->title}} </a></td>
                                <td>{{$product->price}} تومان</td>
                                <td><img src="{{$product->photo->path}}" class="img-bordered" alt="{{$product->title}}" height="130" width="150"></td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($product->created_at)->formatDifference()}}</td>
                                <td>
                                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning btn-block">
                                        ویرایش
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <br>
                                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger btn-block show_confirm" data-toggle="tooltip" title='Delete'>
                                                حذف
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="6" class="text-center">{{$products->links()}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            if(!confirm('آیا می خواهیدمحصولات مورد نظر را حذف کنید?')) {
                e.preventDefault();
            }
        });

        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
        })
    </script>
@endsection
