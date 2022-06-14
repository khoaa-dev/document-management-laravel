@extends('templates.default-page')

@section('content')
    <div class="container">
        {{-- Slide --}}
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('public/images/slide-1.jpg') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('public/images/slide-2.jpg') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('public/images/slide-3.jpg') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Banner 2 --}}
        <div class="row mt-3">
            <div class="col-12">
                <img src="{{ asset('public/images/banner-ute-2.jpg') }}" alt="" width="100%">
            </div>
        </div>

        {{-- News --}}
        <div class="row mt-3">
            <div class="col-12">
                <h3 class="text-uppercase">Tin tức</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <img src="{{ asset('public/images/news-1.jpg') }}" alt="" width="100%" height="200px">
            </div>
            <div class="col-8">
                <a href=""><h3>Trường Đại học Sư phạm Kỹ thuật – Đại học Đà Nẵng tổ chức Hội nghị nâng cao năng lực ngoại ngữ cho sinh viên</h3></a>
                <small>11 THÁNG 06 2022</small>
                <p class="mt-4">Nhằm phân tích, đánh giá tình hình giảng dạy, học tập và kiểm tra ngoại ngữ của sinh viên Trường Đại học Sư phạm Kỹ thuật cũng như thảo luận, đề xuất các giải pháp góp phần triển khai có hiệu quả việc nâng cao chất lượng đào tạo, năng lực ngoại ngữ cho sinh viên.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4">
                <img src="{{ asset('public/images/news-2.jpg') }}" alt="" width="100%" height="200px">
            </div>
            <div class="col-8">
                <a href=""><h3>Đà Nẵng vững bước trên hành trình chuyển đổi số: Đào tạo, chuẩn bị nguồn nhân lực chuyển đổi số</h3></a>
                <small>04 THÁNG 06 2022</small>
                <p class="mt-4">Chuyển đổi số đang đi sâu vào từng ngành, từng lĩnh vực, tạo ra cuộc cách mạng về năng suất lao động, văn hóa tổ chức và làm thay đổi thói quen, cuộc sống của mỗi người. Không nằm ngoài dòng chảy đó, ngành giáo dục Đà Nẵng xác định chuyển đổi số là động lực phát triển, hướng đi mới và đã triển khai chuyển đổi số trên các lĩnh vực đào tạo, nghiên cứu khoa học,…</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4">
                <img src="{{ asset('public/images/news-3.jpg') }}" alt="" width="100%" height="200px">
            </div>
            <div class="col-8">
                <a href=""><h3>Các giảng viên của Trường ĐH Sư phạm Kỹ thuật được Thành phố Đà Nẵng khen thưởng vì có thành tích trong hoạt động khoa học công nghệ, sáng tạo kỹ thuật</h3></a>
                <small>11 THÁNG 06 2022</small>
                <p class="mt-4">Các giảng viên của Trường Đại học Sư phạm Kỹ thuật - Đại học Đà Nẵng đã được nhận Bằng khen của Chủ tịch Ủy ban Nhân dân và của Ban tổ chức Hội thi STKT thành phố.</p>
            </div>
        </div>

        {{-- pagination --}}
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Trang tiếp</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
