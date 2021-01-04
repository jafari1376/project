@foreach($subject as $comment_ab)
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
