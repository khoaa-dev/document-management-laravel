<nav class="navbar navbar-expand-lg navbar-light bg-light pt-0">
    <div class="container d-flex flex-column">
        <div class="row">
            <div class="col-12">
                <a href="" class="navbar-brand pt-0">
                    <img src="{{ asset('public/images/banner-ute.jpg') }}" alt="Banner" width="100%">
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <img src="{{ asset('public/images/title.png') }}" alt="Title" width="100%">
            </div>
        </div>
        

        <div class="row w-100">
            <div class="col-12 d-flex flex-row">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-3">
                            <a href="{{ route('home') }}" class="nav-link" style="font-size: 20px">Trang chủ</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a href="" class="nav-link" style="font-size: 20px">Thông báo</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a href="" class="nav-link" style="font-size: 20px">Tìm kiếm</a>
                        </li>
                        <li class="nav-item mr-3">
                            <a href="" class="nav-link" style="font-size: 20px">Hướng dẫn sử dụng</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="d-flex align-items-center">
                    <ul class="navbar-nav">
                        @empty(Session::get('canBo'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loginView') }}" style="font-size: 20px">{{ __('Đăng nhập') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" 
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-size: 20px">
                                    {{ Session::get('canBo')->hoTen }}
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown"
                                    style="font-size: 16px; width: 200px">
                                    @if (Session::get('canBo')->maQuyen == 1)
                                        {{-- <a class="nav-link" href="{{ route('admin') }}">{{ __('Trang quản trị') }}</a> --}}
                                        <a class="dropdown-item" href="" onclick="event.preventDefault();
                                                                    document.getElementById('admin-form').submit();">
                                            {{ __('Trang quản trị') }}
                                        </a>
                                    @endif
                                        
                                    @if (Session::get('canBo')->maQuyen == 2 || Session::get('canBo')->maQuyen == 3)
                                        <a class="dropdown-item" href="">
                                            {{ __('Quản lý văn bản') }}
                                        </a>    
                                    @endif
        
                                    <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Đăng xuất') }}
                                    </a>
        
                                    {{-- <form id="profile-form" action="{{ route('profile') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> --}}
        
                                    {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> --}}
        
                                    {{-- <form id="admin-form" action="{{ route('admin') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form> --}}
        
        
                                </div>
                            </li>
                        @endempty
                    </ul>
                        
                </div>
            </div>
        </div>
    </div>
</nav>