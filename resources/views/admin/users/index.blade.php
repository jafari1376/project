@extends('admin.layouts.master')

@section('title')
   کاربران
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">کاربران</h4>
            <div class="text-left">
                <a href="{{route('users.create')}}" class="btn btn-info">
                    <i class="fa fa-plus"></i>
                    جدید
                </a>
            </div>
        </div>
        <div class="box-body">
            @if($users->isEmpty())
                <div class="text-center my-2">
                    <div class="h1 text-muted">
                        <i class="far fa-frown-open h1"></i>
                    </div>
                    <h2 class="text-muted">موردی برای نمایش وجود ندارد</h2>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>عکس پروفایل </td>
                            <td>نام کاربری</td>
                            <td>تعداد نظرات</td>
                            <td>سطح دسترسی</td>
                            <td>نقش مدیریتی</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user_au)
                            <tr>
                                <td class="text-center">
                                    @if($user_au->photo)
                                        <img src="{{$user_au->photo->path}}" class="img-bordered img-circle" height="75" width="75" alt="">
                                    @else
                                        <img src="{{asset('images/avatars2.png')}}" class="img-fluid img-circle" height="75" width="75" alt="">
                                    @endif
                                </td>
                                <td><a href="{{route('users.show',$user_au->id)}}" class="list-link">{{$user_au->name}}</a></td>
                                <td>
                                    @if($user_au->comments==null)
                                        0
                                    @else
                                        {{$user_au->comments->count()}}
                                    @endif
                                </td>
                                <td>
                                  @if($user_au->level=='user')
                                        <div class="badge badge-info">کاربر عادی</div>
                                    @elseif($user_au->level=='admin')
                                        <div class="badge badge-primary">مدیر</div>
                                  @endif
                                </td>
                                <td>
                                    @if($user_au->admin_active==1)
                                        <div class="badge badge-primary">فعال</div>
                                    @else
                                        <div class="badge badge-danger">غیر فعال</div>
                                    @endif
                                </td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($user_au->created_at)->formatDifference()}}</td>
                                <td>
                                    <a href="{{route('users.edit',$user_au->id)}}" class="btn btn-warning btn-block">
                                        ویرایش
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <br>
                                    <form action="{{route('users.destroy',$user_au->id)}}" method="POST">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <div class="form-group">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-block show_confirm" data-toggle="tooltip" title='Delete'>
                                                <i class="fa fa-trash"></i>
                                                حذف
                                            </button>
                                        </div>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="7" class="text-center">
                                {{$users->links()}}
                            </td>
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
            if(!confirm('آیا می خواهید کاربر مورد نظر را حذف کنید?')) {
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
