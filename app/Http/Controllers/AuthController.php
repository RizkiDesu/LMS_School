<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        // dd(Hash::make(1234567890));
        if (!empty(Auth::check())){
            if(Auth::user()->user_type ==1){
                return redirect('/admin/dashboard');
            }
            else if(Auth::user()->user_type ==2){
                return redirect('/teacher/dashboard');
            }
            else if(Auth::user()->user_type ==3){
                return redirect('/student/dashboard');
            }
            else if(Auth::user()->user_type ==4){
                return redirect('/parent/dashboard');
            }
        }
        return view('auth.login');
    }

    public function authlogin(Request $request)
    {
        $remember = !empty($request-> remember) ? true : false;
        if(Auth::attempt(['email' => $request -> email, 'password' => $request -> password], true)){
            if(Auth::user()->user_type ==1){
                return redirect('/admin/dashboard');
            }
            else if(Auth::user()->user_type ==2){
                return redirect('/teacher/dashboard');
            }
            else if(Auth::user()->user_type ==3){
                return redirect('/student/dashboard');
            }
            else if(Auth::user()->user_type ==4){
                return redirect('/parent/dashboard');
            }
        }else{
            return redirect()->back()->with('error', 'Please enter currect email and password.');
        }
        // dd($request->all());
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }

    public function PostForgotPassword(Request $request)
    {
        // dd($request->all());
        $user = User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Pleace check your email and reset password');
        }
        else
        {
            return redirect()->back()->with('error', 'Email not found in the system.');
        }
    }

    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);

        if(!empty($user))
        {
            $data['user']= $user;
            return view('auth.reset',$data);

        }
        else
        {
            abort(404);
        }
    }

    public function Postreset($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url(''))->with('success', 'password succrssfully reset');
        }
        else{
            return redirect()->back()->with('error', 'Password and confirm password does not match.');
        }
    }
}
