@extends('layouts.app')

@section('title')
بازنشانی کلمه عبور
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <div class="card">
                <div class="card-header text-center">بازنشانی کلمه عبور</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class=" text-md-right">ایمیل</label>
                            <input id="email" type="email" class="form-control" placeholder="ایمیل خود را وارد کنید" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password" class=" text-md-right">کلمه عبور</label>
                            <input id="password" type="password" class="form-control" placeholder="کلمه عبور خود را وارد وارد کنید" name="password" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="text-md-right">تکرار کلمه عبور</label>
                            <input id="password-confirm" type="password" class="form-control" placeholder="تکرار کلمه عبور خود را تکرار کنید" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group ">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    <i class="fa fa-lock"></i>
                                    بازنشانی کلمه عبور
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
