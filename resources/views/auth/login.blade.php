@extends('templates.default-page')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{ asset('public/images/login-title.png') }}" alt="Login title" width="100%">
                </div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <form>
                        <!-- Ma Can Bo input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="maCanBo">Mã cán bộ</label>
                            <input type="text" id="maCanBo" class="form-control" name="maCanBo" />
                        </div>
                      
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="matKhau">Mật khẩu</label>
                            <input type="password" id="matKhau" class="form-control" name="matKhau"/>
                        </div>
                      
                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                                    <label class="form-check-label" for="form2Example31"> Nhớ tài khoản </label>
                                </div>
                            </div>
                      
                            <div class="col">
                                <!-- Simple link -->
                                <a href="#!">Quên mật khẩu?</a>
                            </div>
                        </div>
                      
                        <!-- Submit button -->
                        <button type="button" class="btn btn-primary btn-block mb-4">Đăng nhập</button>
                      
                        <!-- Register buttons -->
                        {{-- <div class="text-center">
                            <p>Not a member? <a href="#!">Register</a></p>
                            <p>or sign up with:</p>
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                        
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>
                        
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>
                        
                            <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-github"></i>
                            </button>
                        </div> --}}
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </section>
@endsection