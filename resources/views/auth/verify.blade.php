@extends('layouts.app')

@section('title')
    فعال سازی ایمیل
@endsection

@section('content')
    <div class="row ">
        <div class="col-12 col-md-6 m-auto">
            <div class="card">
                <div class="card-header h4 text-center">تایید حساب ایمیل</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            ایمیل فعال سازی برای شما ارسال شد.
                        </div>
                    @endif

                    لطفا ایمیل خود را بررسی کنید و روی لینک فعال سازی کلیک نمایید.
                        <br>
                        <span>
                            اگر ایمیل فعال سازی برای شما ارسال نشده است لطفا دوباره لینک فعال سازی را بزنید.
                        </span>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">درخواست دوباره لینک فعال سازی</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
