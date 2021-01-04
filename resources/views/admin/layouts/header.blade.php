<nav class="navbar navbar-expand-lg navbar-light  bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand text-light" href="{{url('/admin')}}">پنل مدیریت</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{url('admin/articles')}}">گردشگری</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{url('admin/products')}}">محصولات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{url('admin/users')}}">کاربران</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{url('admin/comments')}}">کامنت ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{url('admin/contacts')}}">ارتباط با ما</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">


                <!-- Authentication Links -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            @if(auth()->user()->photo_id)
                                <img src="{{auth()->user()->photo->path}}" alt="" width="40" class="rounded-circle" height="40">
                            @else
                                <img src="{{asset('images/avatars2.png')}}" width="40" class="rounded-circle" height="40" alt="">
                            @endif
                            <span class="text-light">{{ auth()->user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                            <span class="pr-3">مدیریت سایت</span>
                            <hr>
                            <a href="{{url('admin/profile')}}" class="dropdown-item">پروفایل</a>
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

            </ul>
        </div>
    </div>
</nav>

