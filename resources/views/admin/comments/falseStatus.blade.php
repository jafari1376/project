@extends('admin.layouts.master')

@section('title')
    نظرات تأیید شده
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">نظرات تایید نشده</h4>
            <div class="text-left">
                <a href="{{route('comments.trueStatus')}}" class="btn btn-info">
                    <i class="fa fa-comments"></i>
                    نظرات تأیید شده
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($comments->isEmpty())
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
                            <td>عکس کاربر</td>
                            <td>نام کاربر</td>
                            <td>متن نظر</td>
                            <td>عملیات</td>
                            <td>تاریخ ایجاد</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)

                            <tr>
                                <td>
                                    @if($comment->user->photo_id)
                                    <img src="{{$comment->user->photo->path}}" class="rounded-circle img-circle" alt="" height="70" width="70">
                                    @else
                                        <img src="{{asset('images/avatars2.png')}}" class="rounded-circle img-circle" alt="" height="70" width="70">
                                    @endif
                                </td>
                                <td>{{$comment->user->name}}</td>
                                <td>{{$comment->body}}</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($comment->created_at)->formatDifference()}}</td>
                                <td>
                                    <form action="{{route('comments.update',$comment->id)}}" method="POST">
                                        @csrf
                                        {{method_field('PATCH')}}
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info btn-block ">
                                                تأیید
                                                <i class="fa fa-check-circle"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <form action="{{route('comments.destroy',$comment->id)}}" method="POST">
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
                            <td colspan="5" class="text-center">{{$comments->links()}}</td>
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
            if(!confirm('آیا می خواهید نظر مورد نظر را حذف کنید?')) {
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
