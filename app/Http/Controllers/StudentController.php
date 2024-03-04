<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use Hash;
use Auth;
use App\Models\User;
use App\Models\ClassModel;

class StudentController extends Controller
{
    public function list(){
        $data ['getRecord'] = User::getStudent();
        $data ['header_title'] = 'Student List';
        $data ['title'] = 'Student';
        return view('admin.student.list', $data);
    }

    public function add(){

        $data ["getClass"] = ClassModel::getClass();
        $data ['header_title'] = 'Add new Student';
        $data ['title'] = 'Student';
        return view('admin.student.add', $data);
    }

    public function insert(Request $request){
        request()->validate([
            'email' => 'required|email|unique:users',
            'weight' => 'max:10',
            'height' => 'max:10',
            'blood_grup' => 'max:10',
            'admission_number' => 'max:50',
            'religion' => 'max:50',
            'castes' => 'max:50',
            'roll_number' => 'max:50',
        ]);
        $student = new User;
        $student->user_type = 3;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);

        if(!empty($request->caste)){
            $student->caste = trim($request->caste); // tidak wajib
        }

        if(!empty($request->religion)){
            $student->religion = trim($request->religion); // tidak wajib
        }
        if(!empty($request->mobile_number)){
            request()->validate([
                'mobile_number' => 'max:15|min:8',
            ]);
            $student->mobile_number = trim($request->mobile_number); // tidak wajib
        }
        if(!empty($request->blood_grup)){
            $student->blood_grup = trim($request->blood_grup); // tidak wajib
        }
        if(!empty($request->height)){
            $student->height = trim($request->height); // tidak wajib
        }
        if(!empty($request->weight)){
            $student->weight = trim($request->weight); // tidak wajib
        }


        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr). '.' .$ext;
            $file->move('upload/profile/', $filename);
            $student->profile_pic = $filename; // tidak wajib
        }

        $student->admission_date = trim($request->admission_date);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = hash::make($request->password);
        $student->save();
        return redirect(url('admin/student/list'))->with('success', 'Student Successfully created');

    }
    public function edit($id){
        $data ["getRecord"] = User::getSingle($id);
        if (!empty($data ["getRecord"])){
            $data ["getClass"] = ClassModel::getClass();
            $data ['header_title'] = 'Edit Student';
            $data ['title'] = 'Student';
            return view('admin.student.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    // update

    public function update($id, Request $request){
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'weight' => 'max:10',
            'height' => 'max:10',
            'blood_grup' => 'max:10',
            'admission_number' => 'max:50',

            'religion' => 'max:50',
            'castes' => 'max:50',
            'roll_number' => 'max:50',
        ]);
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->date_of_birth = trim($request->date_of_birth);

        if(!empty($request->caste)){
            $student->caste = trim($request->caste); // tidak wajib
        }

        if(!empty($request->religion)){
            $student->religion = trim($request->religion); // tidak wajib
        }
        if(!empty($request->mobile_number)){
            request()->validate([
                'mobile_number' => 'max:15|min:8',
            ]);
            $student->mobile_number = trim($request->mobile_number); // tidak wajib
        }
        if(!empty($request->blood_grup)){
            $student->blood_grup = trim($request->blood_grup); // tidak wajib
        }
        if(!empty($request->height)){
            $student->height = trim($request->height); // tidak wajib
        }
        if(!empty($request->weight)){
            $student->weight = trim($request->weight); // tidak wajib
        }


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

        $student->admission_date = trim($request->admission_date);
        $student->status = trim($request->status);
        $student->email = trim($request->email);

        if(!empty($request->password)){
            $student->password = hash::make($request->password);
        }

        $student->save();
        return redirect(url('admin/student/list'))->with('success', 'Student Successfully Update');
    }

    // delete

    public function delete($id){
        $getRecord = User::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success',  'Student Successfully Delete');
        }else{
            abort(404);
        }
    }
}
