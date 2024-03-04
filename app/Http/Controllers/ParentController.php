<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Hash;
use Auth;
use App\Models\User;
use App\Models\ClassModel;

class ParentController extends Controller
{
    public function list(){
        $data ['getRecord'] = User::getParent();
        $data ['header_title'] = 'Parent List';
        $data ['title'] = 'Parent';
        return view('admin.parent.list', $data);
    }

    public function add(){

        $data ['header_title'] = 'Add new Parent';
        $data ['title'] = 'Parent';
        return view('admin.parent.add', $data);
    }

    public function insert(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users',
            'religion' => 'max:50',
            'occupation' => 'max:255',
            'address' => 'max:255',
            'mobile_number' => 'max:15|min:8',
        ]);
        $student = new User;
        $student->user_type = 4;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->occupation = trim($request->occupation);
        $student->address = trim($request->address);
        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr). '.' .$ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename; // tidak wajib
        }
        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = hash::make($request->password);
        $student->save();
        return redirect(url('admin/parent/list'))->with('success', 'Parent Successfully created');
    }

    public function edit($id){
        $data ["getRecord"] = User::getSingle($id);
        if (!empty($data ["getRecord"])){
            $data ['header_title'] = 'Edit Parent';
            $data ['title'] = 'Parent';
            return view('admin.parent.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'religion' => 'max:50',
            'occupation' => 'max:255',
            'address' => 'max:255',
            'mobile_number' => 'max:15|min:8',
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->occupation = trim($request->occupation);
        $student->address = trim($request->address);

        if(!empty($request->file('profile_pic'))){
            if(!empty($student->getProfile())){
                unlink('upload/profile/' . $student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr). '.' .$ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename; // tidak wajib
        }

        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);

        if(!empty($request->password)){
            $student->password = hash::make($request->password);
        }

        $student->save();
        return redirect(url('admin/parent/list'))->with('success', 'Parent Successfully Update');
    }

    public function delete($id){
        $getRecord = User::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success',  'Parent Successfully Delete');
        }else{
            abort(404);
        }
    }


    public function myStudentent($id){
        $data ['getParent'] = User::getSingle($id);
        $data ['parent_id'] = $id;
        $data ['getSearchStudent'] = User::getSearchStudent();
        $data ['getRecord'] = User::getMyStudent($id);
        $data ['header_title'] = 'Parent Student List';
        $data ['title'] = 'Student';
        return view('admin.parent.my_studentent', $data);
    }


    public function AssignStudentParent($student_id, $parent_id){
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();

        return redirect()->back()->with('success',  'Parent Successfully Assign');

    }

    public function AssignStudentParentDelete($student_id){
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();

        return redirect()->back()->with('success',  'Parent Successfully Assign Delete ');

    }

    // AssignStudentParentDelete
}
