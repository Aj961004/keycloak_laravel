<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('openid.login')->get('/login', function() {
    return 'login';
})->name('login');


Route::middleware('auth')->group(function() {
    Route::get('teste', function() {  return 'hello world'; })->name('teste');

    Route::get('home', function() {
        $username = Auth::user()->getAuthIdentifier();
        return view('home', compact('username'));
    })->name('home');

    Route::get('info', function() {
        $user = Auth::user()->toArray();
        return view('info', compact('user'));
    })->name('info');

    Route::get('gerente', function() {
        if (!Gate::allows('gerente')) {
            return view('proibido');
        } else {
            $user = Auth::user()->toArray();
            $username = $user['preferred_username'];
            $roles = $user['roles'];
            return view('gerente', compact('username', 'roles'));
        }
    })->name('gerente');

    Route::get('admin', function() {
        if (!Gate::allows('administrador')) {
            return view('proibido');
        } else {
            $user = Auth::user()->toArray();
            $username = $user['preferred_username'];
            $roles = $user['roles'];
            return view('admin', compact('username', 'roles'));
        }
    })->name('admin');

    Route::get('desenvolvedor', function() {
        if (!Gate::allows('desenvolvedor')) {
            return view('proibido');
        } else {
            $user = Auth::user()->toArray();
            $username = $user['preferred_username'];
            $roles = $user['roles'];
            return view('desenvolvedor', compact('username', 'roles'));
        }
    })->name('desenvolvedor');

    Route::get('logout', function (Request $request) {
        $Keycloak = resolve('Keycloak');
        $state = session('oauth2state');
        $request->session()->flush();
        Cookie::forget('access_token');
        Cookie::forget('refresh_token');
        Cookie::forget('expires');
        return redirect($Keycloak->getLogoutUrl(['redirect_uri' => config('keycloak.redirectLogoutUri'), 'state' => '']));
   })->name("logout");

});

