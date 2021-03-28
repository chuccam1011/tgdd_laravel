<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRegisterRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin extends Controller
{
    public function getFormLogin(Request $request)
    {
        $isRegistered = $request->input('register');
        $name = $request->input('name');
        return view('admin.auth.login', [
            'isRegistered' => $isRegistered,
            'name' => $name
        ]);
    }

    public function submitFromLogin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'A Username is required',
            'password.required' => 'A password is required',
        ]);
        $credentials = $request->only('name', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return redirect()->route('admin-login')->withErrors([
            'error' => 'The  provided credentials do not match our records.',
        ]);
    }


    public function getFormRegister()
    {
        return view('admin.auth.register');

    }

    public function submitFromRegister(AdminRegisterRequest $request)
    {
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->gender = $request->gender;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->age = $request->age;
        $admin->avatar = $request->avatar;
        $admin->type = $request->type;
        $admin->save();

        return redirect()->route('admin-login', [
            'register' => "Register Successfully",
            'name' => $admin->name
        ]);

    }

}
