<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('user.auth.login');
    }
    public function register()
    {
        return view('user.auth.register');
    }

    public function storeuser(Request $request)
    {
        $data = new User;
        $data->name         = $request->name;
        $data->email        = $request->email;
        $data->password     = bcrypt($request->password);
        $data->role         = 0;
        $data->is_mamber    = 1;
        $data->is_admin     = 0;

        $data->save();
        Alert::toast('Register Berhasil', 'success');
        return redirect('/login');
    }

    public function loginproses(Request $request)
    {
        $dataLogin = [
            'email' => $request->email,
            'password'  => $request->password,
        ];

        $user = new User;
        $proses = $user::where('email', $request->email)->first();

        if ($proses->is_active === 0) {
            Alert::toast('Kamu belum register', 'error');
            return back();
        }
        if (Auth::attempt($dataLogin)) {
            Alert::toast('Kamu berhasil login', 'success');
            $request->session()->regenerate();
            return redirect()->intended('/home');
        } else {
            Alert::toast('Email dan Password salah', 'error');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::toast('Kamu berhasil Logout', 'success');
        return redirect('/');
    }
}
