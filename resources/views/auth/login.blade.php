@extends('layouts.app')

@section('title')
    ورود به سایت
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <div class="card">
                <div class="card-header text-center h4">ورود</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="text-md-right">ایمیل</label>
                            <input id="email" type="email" placeholder="ایمیل خود را وارد کنید" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-md-right">کلمه عبور</label>
                            <input id="password" type="password" placeholder="کلمه عبور خود را وارد کنید" class="form-control" name="password" required autocomplete="current-password">
                        </div>

                        <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label pr-4" for="remember">
                                        مرا به خاطر بسپار
                                    </label>
                                </div>
                        </div>

                        <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block btn-lg m-auto">
                                    <i class="fa fa-sign-in-alt"></i>
                                    ورود
                                </button>
                        </div>
                        <div class="form-group">
                            <div class="mr-auto float-left text-left">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        کلمه عبور خود را فراموش کرده ام
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
