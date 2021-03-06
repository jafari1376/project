@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <div class="card">
                <div class="card-header text-center">بازنشانی کلمه عبور</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class=" text-md-right">ایمیل</label>

                            <input id="email" type="email" class="form-control" placeholder="ایمیل خود را وارد کنید" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    <i class="fa fa-lock"></i>
                                    ارسال لینک بازنشانی کلمه عبور
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
