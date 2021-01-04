<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">سایت گردشگری</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline m-auto" method="POST" action="{{url('/searches')}}">
                @csrf
                {{method_field('PATCH')}}
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="جستجو" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">جستجو</button>
            </form>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/articles')}}">نمایش همه مناطق گردشگری</a>
                </li>
                <li class="nav-item"><a href="{{url('/contact-us')}}" class="nav-link">ارتباط با ما</a></li>
                <li class="nav-item"><a href="{{url('/about')}}" class="nav-link">درباره ما</a></li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ورود</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">ثبت نام</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" class="nav-link dropdown-toggle">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="text-warning">
                                @if(Session::has('cart'))
                                {{Session::get('cart')->totalQty}}
                                @else
                                0
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{url('/cart')}}" class="dropdown-item">رفتن به سبد خرید</a>
                            <a class="dropdown-item" href="{{ url('/payment') }}">
                                پرداخت
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if(auth()->check())

                                @if(auth()->user()->photo_id)
                                    <img src="{{auth()->user()->photo->path}}" alt="" width="40" class="rounded-circle" height="40">
                                @else
                                    <img src="{{asset('images/avatars2.png')}}" width="40" class="rounded-circle" height="40" alt="">
                                @endif

                                    {{ auth()->user()->name }}
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{url('/profile')}}" class="dropdown-item">پروفایل</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                خروج
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

