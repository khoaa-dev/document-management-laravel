@extends('templates.default-page')

@section('content')
    <div class="container">
        <div class="row mr-1 ml-1">
            <div class="col-2" style="border: 1px solid #ccc">
                <!-- sidebar menu -->
                <div class="mt-2">
                    {{-- <h3 class="mb-2 text-center ">Danh mục quản lý</h3> --}}
                    <img src="{{ asset('public/images/category-title.png') }}" alt="Category title" width="100%" height="30px" class="mb-3">
                    <ul class="d-flex flex-column list-unstyled" style="font-size: 20px">
                        <li><a href="{{ route('come-docs-management') }}"><i class="fa-solid fa-book mr-1 mb-3"></i>Văn bản đến</a>
                        </li>
                        <li><a href="{{ route('out-docs-management') }}"><i class="fa-solid fa-book mr-1"></i>Văn bản đi</a>
                        </li>
                    </ul>
                </div>
                <!-- /sidebar menu -->
            </div>
            <div class="col-10" style="border: 1px solid #ccc">
                @yield('docs-body')
            </div>
        </div>
    </div>
@endsection