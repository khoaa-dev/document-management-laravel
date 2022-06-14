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
                            <a href="" class="nav-link" style="font-size: 20px">Trang chủ</a>
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
                    @guest
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loginView') }}" style="font-size: 20px">{{ __('Đăng nhập') }}</a>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>