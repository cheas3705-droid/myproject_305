<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerLihat()
    {
        return view('users.register');
    }

    public function registerSubmit(Request $request)
    {
    $request->validate([
        'username' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:1',
    ]);

        $data = new User();
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();

        return redirect()->route('login');
    }

    public function loginLihat()
    {
        return view('users.login');
    }
    public function loginSubmit(Request $request)
    {
        $data = User::where('username', $request->username)->first();

        if($data && Hash::check($request->password,$data->password)){
            Auth::login($data);
            $request->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'ចូលប្រព័ន្ធបានជោគជ័យ');
        }
        return redirect()->route('login')->with('failed','ឈ្មោះអ្នកប្រើប្រាស់ និង លេខសម្ងាត់ អាចនឹងមិនត្រឹមត្រូវ');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
