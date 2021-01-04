@extends('layouts.app')

@section('title')
ثبت نام در سایت
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header h4 text-center">ثبت نام</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="name" class="text-md-right">نام و نام خانوادگی</label>
                                <input id="name" type="text" class="form-control" placeholder="نام و نام خانوادگی خود را وارد کنید" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>

                        <div class="form-group ">
                            <label for="email" class="text-md-right">ایمیل</label>
                            <input id="email" type="email" class="form-control" placeholder="ایمیل خود را واردکنید" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>

                        <div class="form-group ">
                            <label for="password" class="text-md-right">کلمه عبور</label>
                                <input id="password" type="password" class="form-control" placeholder="کلمه عبور خود را وارد کنید" name="password" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="text-md-right">تکرار کلمه عبور</label>
                                <input id="password-confirm" type="password" placeholder="تکرار کلمه عبور را وارد کنید" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    <i class="fa fa-user"></i>
                                    ثبت نام
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
