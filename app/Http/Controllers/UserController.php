<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\query;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


class UserController extends Controller
{
    public function register(Request $req){
        // dd($req);
$data = $req->validate([
    'name' => 'required',
    'email' => 'required|email',
    'password' => 'required|string|min:8|confirmed',
]);
$user = User::create([
    'name' => $data['name'],
    'email' => $data['email'],
    'password' => bcrypt($data['password']), // Hash the password before saving
]);
if($user){
    return redirect()->route('login');
}else{
    return redirect()->back()->with('error', 'Failed to register user. Please try again.')->withInput();
}
    }

    public function login(Request $req){
        $credentials = $req->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);
       if(Auth::attempt($credentials)){
           return redirect()->route('home');
       }else{
        return redirect()->back()->with('error', 'Invalid Credentials, Try Again');
       }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function forgot(){
        return view('auth.forgot');
    }
    public function forgotPassword(Request $req){
        // dd($req);
         $email = $req->validate([
            'email'=> 'required|email'
         ]);
         $user = DB::table('users')->where('email', $email['email'])->first();
        //  dd($user);
         if($user){
            // $status = Password::sendResetLink(
            //     $req->only('email')
            // );
            // return $status === Password::RESET_LINK_SENT
            //     ? back()->with(['status' => __($status)])
            //     : back()->withErrors(['email' => __($status)]);
            return redirect()->route('setPassword', ['token'=> $user->id]);
            // return redirect()->route('setPassword', ['query'=> $user->id]);
         }else{
            return redirect()->back()->with('error', 'User with this email does not exist! please Sign up First!');
         }
    }

//     public function setPassword(Request $req, $query){
//         return view('auth.setPassword', ['query'=> $query]);
//    }

public function setPassword(Request $req, $token){
    return view('auth.setPassword', ['token'=> $token]);
}

   public function resetPassword(Request $req, $query){
      $data = $req->validate([
        'password' => 'required|string|min:8|confirmed'
      ]);
      $user = DB::table('users')->where('id', $query)->first();
      if($user){
        DB::table('users')->where('id', $query)->update(['password' => bcrypt($data['password'])]);
       return redirect()->route('home')->with('success', 'Password Reset Successfully!');
      }else{
        return redirect()->back()->with('error', 'User not found. Please Sign Up First');
      }

   }

   public function userQueries(Request $req){
    $data = $req->validate([
        'name'=> 'required',
        'email'=> 'required|email',
        'message'=> 'required|max:255'
    ]);
    $query = query::create([
        'name'=> $data['name'],
        'email'=> $data['email'],
        'message'=> $data['message']
    ]);
    if($query){
        return redirect()->route('home')->with('success', 'Your Query has been posted successfully!');
    }else{
        return redirect()->back()->with('error', 'Something went wrong in posting your query. Please try again later!');
    }
   }
}
