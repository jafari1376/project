<div class="container-fluid">
    <div class="row m-2">
        <div class="col-12">
            <h4 class="mb-0 p-2 pb-0">دیدگاه ها و پرسش ها </h4>
            <hr>
            <div class="card card-none">
                <div class="card-body">
                    @if(auth()->check())
                        <div class="alert alert-primary p-4">
                            <span>                    دیدگاه یا پرسش خود را برای ما ارسال کنید</span>
                            <a class="btn btn-info float-left"  data-toggle="collapse" href="#collapseIdea" role="button" aria-expanded="false" aria-controls="collapseIdea">
                                ارسال دیدگاه
                            </a>
                        </div>
                        <form action="{{route('comments.store')}}" id="collapseIdea" class="collapse" method="POST">
                            @csrf
                            <input type="hidden" name="parent_id" value="0">
                            <input type="hidden" name="commentable_id" value="{{$commentable_id}}">
                            <input type="hidden" name="commentable_type" value="{{get_class($subject)}}">
                            <div class="form-group">
                                <label for="body"></label>
                                <textarea name="body" id="body" cols="30" rows="8" class="form-control p-2" placeholder="دیدگاه خود را ایجاد کنید..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-info btn-lg">
                                <i class="fa fa-comment"></i>
                                ثبت دیدگاه
                            </button>
                        </form>
                    @else
                        <div class="alert alert-primary p-4">
                            برای ارسال دیدگاه باید اول وارد سایت شوید.
                            <span class="float-left">
                                <i class="far fa-frown-open ft-2rem"></i>
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row m-2">
        <div class="col-12">

            @if($comments->isEmpty())
                <div class="card card-none my-2">
                    <div class="card-body">
                        <div class="alert alert-warning p-4">
                            <span>هیچ دیدگاه یا نظری ثبت نشده است</span>
                            <span class="float-left">
                                <i class="far fa-frown ft-2rem"></i>
                            </span>
                        </div>
                    </div>
                </div>
            @else
                @foreach($comments as $comment)
                    <div class="card card-none my-3">
                        <div class="card-body">
                            <div>
                                <div class="d-inline">
                                    @if($comment->user->photo_id)
                                        <img src="{{$comment->user->photo->path}}" class="rounded-circle" height="70" width="70" alt="">
                                    @else
                                        <img src="{{asset('images/profile-icon.png')}}" class="rounded-circle" height="70" width="70" alt="">
                                    @endif
                                </div>
                                <div class="text-info d-inline pr-3">
                                    {{\Hekmatinasser\Verta\Verta::instance($comment->created_at)->formatDifference()}}
                                </div>
                                <div class="d-inline">
                                    <button class="btn btn-info float-left" data-toggle="modal" data-target="#sendCommentModal" data-parent="{{ $comment->id }}">پاسخ به دیدگاه</button>
                                </div>
                            </div>
                            <p class="text-justify-fa text-justify ft-14 p-4 m-2">
                                {!! $comment->body !!}
                            </p>
                            @foreach($comment->comments as $comment_ab)
                                <hr>
                                <div class="mr-5">
                                    <div>
                                        <div class="d-inline">
                                            @if($comment_ab->user->photo_id)
                                                <img src="{{$comment_ab->user->photo->path}}" class="rounded-circle" height="70" width="70" alt="">
                                            @else
                                                <img src="{{asset('images/profile-icon.png')}}" class="rounded-circle" height="70" width="70" alt="">
                                            @endif
                                        </div>
                                        <div class="text-info d-inline pr-3">
                                            {{\Hekmatinasser\Verta\Verta::instance($comment_ab->created_at)->formatDifference()}}
                                        </div>
                                        <div class="d-inline">
                                            <button  class="btn btn-info float-left" data-toggle="modal" data-target="#sendCommentModal" data-parent="{{ $comment_ab->id }}">پاسخ به دیدگاه</button>
                                        </div>
                                    </div>
                                    <p class="text-justify-fa text-justify ft-14 p-4 m-2">
                                        {!! $comment_ab->body !!}
                                    </p>
                                </div>
                                @if($comment_ab->comments)
                                    @include('layouts.comment',['subject'=>$comment_ab->comments])
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>

<div class="modal fade" id="sendCommentModal" tabindex="-1" role="dialog" aria-labelledby="sendCommentModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">ارسال پاسخ</h4>
            </div>
            <div class="modal-body">
                <form action="{{route('comments.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="parent_id" value="0">
                    <input type="hidden" name="commentable_id" value="{{ $subject->id }}">
                    <input type="hidden" name="commentable_type" value="{{ get_class($subject) }}">

                    <div class="form-group">
                        <label for="message-text" class="control-label">متن پاسخ:</label>
                        <textarea class="form-control" id="message-text" name="body"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ارسال</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
