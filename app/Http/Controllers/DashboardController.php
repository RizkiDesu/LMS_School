<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    public function dashboard(){
        $data ['header_title'] = 'Dashboard';
        if (!empty(Auth::check())){
            if(Auth::user()->user_type ==1)
            {
                return view('admin.dashboard',$data);
            }
            else if(Auth::user()->user_type ==2)
            {
                // return "teacher";
                return view('teacher/dashboard',$data);
            }
            else if(Auth::user()->user_type ==3)
            {
                // return "student";
                return view('student.dashboard',$data);
            }
            else if(Auth::user()->user_type ==4)
            {
                // return "parent";
                return view('parent.dashboard',$data);
            }
        }
    }
}
