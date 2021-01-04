@extends('admin.layouts.master')

@section('title')
    گردشگری
@endsection


@section('content')
    <div class="box">
        <div class="box-header">
            <h4 class="text-center"></h4>
            <div class="text-left">
                <a href="{{route('articles.create')}}" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    جدید
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($articles->isEmpty())
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
                            <td>عنوان گردشگری</td>
                            <td>تعداد نظرات</td>
                            <td>تعداد بازدید</td>
                            <td>عکس</td>
                            <td>نویسنده</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)

                            <tr>
                                <td><a href="{{route('articles.show',$article->id)}}"> {{$article->title}} </a></td>
                                <td>{{$article->commentCount}}</td>
                                <td>{{$article->viewCount}}</td>
                                <td><img src="{{$article->photos[0]->path}}" class="img-bordered" alt="{{$article->title}}" height="130" width="150"></td>
                                <td>{{$article->user->name}}</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($article->created_at)->formatDifference()}}</td>
                                <td>
                                    <a href="{{route('articles.edit',$article->id)}}" class="btn btn-warning btn-block">
                                        ویرایش
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <br>
                                    <form action="{{route('articles.destroy',$article->id)}}" method="POST">
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
                            <td colspan="7" class="text-center">{{$articles->links()}}</td>
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
            if(!confirm('آیا می خواهید گردشگری مورد نظر را حذف کنید?')) {
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
