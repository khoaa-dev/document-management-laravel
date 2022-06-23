<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin(Request $request) {
        $maCanBo = $request->input('maCanBo');
        $matKhau = $request->input('matKhau');
        $canBo = DB::table('can_bo')->where('maCanBo', '=', $maCanBo)
                                    ->where('matKhau', '=', $matKhau)
                                    ->first();
        if(is_null($canBo)) {
            return redirect('auth.login');
        } else {
            // Session::put('canBo', $canBo);
            Session::put('canBo', $canBo);
            return view('home')
                    ->with('canBo', $canBo);
        }

        // if( Auth::attempt(['maCanBo' => $maCanBo, 'matKhau' => $matKhau])) {
		// 	// Kiểm tra đúng email và mật khẩu sẽ chuyển trang
		// 	return redirect('home');
		// } else {
		// 	// Kiểm tra không đúng sẽ hiển thị thông báo lỗi
		// 	Session::flash('error', 'Email hoặc mật khẩu không đúng!');
		// 	return redirect('auth.login');
		// }
    }

    public function logout() {
        Session::forget('canBo');
        Session::forget('maDonVis');
        return redirect('home');
    }
}
