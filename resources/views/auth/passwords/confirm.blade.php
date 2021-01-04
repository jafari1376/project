@extends('layouts.app')

@section('title')
تایید کلمه عبور
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 m-auto">
            <div class="card">
                <div class="card-header">تایید کلمه عبور</div>

                <div class="card-body">
                    لطفا کله عبور خود را دوباره تایید کنید.

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group">
                            <label for="password" class="text-md-right">کلمه عبور</label>
                            <input id="password" type="password" class="form-control" placeholder="کلمه عبور خود را وارد کنید" name="password" required autocomplete="current-password">
                        </div>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    <i class="fa fa-lock"></i>
                                    تایید کلمه عبور
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        آیا کلمه عبور خود را فراموش کرده اید؟
                                    </a>
                                @endif
                            </div>
                    </form>
                </div>
            </div>
    </div>
@endsection
