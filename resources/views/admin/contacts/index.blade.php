@extends('admin.layouts.master')

@section('title')
    ارتباط با ما
@endsection


@section('content')

    <div class="box">
        <div class="box-header">
            <h4 class="text-center">ارتباط با ما</h4>
        </div>
        <div class="box-body">
            @if($contacts->isEmpty())
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
                            <td>عکس پروفایل</td>
                            <td>عنوان </td>
                            <td>متن انتقاد یا پیشنهاد</td>
                            <td>تاریخ ایجاد</td>
                            <td>عملیات </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)

                            <tr>
                                <td>
                                    <img src="{{$contact->user->photo->path}}" class="img-bordered img-circle" alt="" height="70" width="70">
                                </td>
                                <td><a href="{{route('contacts.show',$contact->id)}}"> {{$contact->title}} </a></td>
                                <td class="text-justify">{{$contact->description}}</td>
                                <td>{{\Hekmatinasser\Verta\Verta::instance($contact->created_at)->formatDifference()}}</td>
                                <td>
                                    <form action="{{route('contacts.destroy',$contact->id)}}" method="POST">
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
                            <td colspan="7" class="text-center">{{$contacts->links()}}</td>
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
            if(!confirm('آیا می خواهید پیشنهاد یا انتقاد مورد نظر را حذف کنید?')) {
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
