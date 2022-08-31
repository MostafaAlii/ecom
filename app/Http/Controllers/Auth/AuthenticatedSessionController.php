<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthenticatedSessionController extends Controller {
    public function create() {
        return view('dashboard.auth.admin.login', ['PageTitle' => trans('dashboard/auth.auth_page_title')]);
    }

    public function store(LoginRequest $request) {
        $request->authenticate();
        $request->session()->regenerate();
        $notification = array(
            'message' => auth()->user()->name .' '. trans('dashboard/auth.welcome_back'),
            'alert-type' => 'success'
        );
        return redirect()->intended(RouteServiceProvider::HOME)->with($notification);
    }

    public function destroy(Request $request) {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $notification = array(
            'message' => trans('dashboard/auth.logout_success'),
            'alert-type' => 'warning'
        );
        return redirect()->route('login')->with($notification);
    }
}
