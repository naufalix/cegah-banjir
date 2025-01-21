<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(){
        return view('login',[
            "title" => "Login | Cegah Banjir",
        ]);
    }
    public function index2(){
        return view('register',[
            "title" => "Register | Cegah Banjir",
        ]);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error','Username/Password salah');
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name'=>'required',
            'type'=>'required',
            'email'=>'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'location'=>'required',
            'phone'=>'required',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['description'] = "";
        
        // Check Email
        if(User::whereEmail($request->email)->first()){
            return back()->with('error','Email telah terpakai');
        }
        // Check Username
        if(User::whereUsername($request->username)->first()){
            return back()->with('error','Username telah terpakai');
        }
        // Create user
        User::create($validatedData);
        return redirect('/login')->with('success','Akun berhasil dibuat');
        
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('/login');
    }
}
