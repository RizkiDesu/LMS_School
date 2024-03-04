@extends('layout.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit {{ !empty($header_title)? $title : '' }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>First Name <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="name" required value="{{ old('name', $getRecord->name)}}" placeholder="First Name" >
                            <div style="color: red">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Last Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="last_name" required value="{{ old('last_name', $getRecord->last_name)}}" placeholder="Last Name" >
                            <div style="color: red">{{ $errors->first('last_name') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Admission Number<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="admission_number" required value="{{ old('admission_number', $getRecord->admission_number)}}" placeholder="Admission Number" >
                            <div style="color: red">{{ $errors->first('admission_number') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Roll Number</label>
                            <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number', $getRecord->roll_number)}}" placeholder="Roll Number" >
                            <div style="color: red">{{ $errors->first('roll_number') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Class<span style="color: red">*</span></label>
                            <select name="class_id" id="class_id" required class="form-control">
                                <option value="">Select Class</option>
                                @foreach ($getClass as $value )
                                    <option {{ (old('class_id',  $getRecord->class_id) == $value->id) ? 'selected' : ''}} value="{{ $value->id }}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            <div style="color: red">{{ $errors->first('class_id') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Gender
                                <span style="color: red">*</span>
                            </label>
                            <select name="gender" id="gender" required class="form-control">
                                <option value="">Select Gender</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Other') ? 'selected' : ''}} value="Other">Other</option>
                            </select>
                            <div style="color: red">{{ $errors->first('gender') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Date of Birth<span style="color: red">*</span> </label>
                            <input type="date" class="form-control" name="date_of_birth" required value="{{ old('date_of_birth', $getRecord->date_of_birth)}}" placeholder="Date of Birth" >
                            <div style="color: red">{{ $errors->first('date_of_birth') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Caste</span></label>
                            <input type="text" class="form-control" name="caste" value="{{ old('caste', $getRecord->caste)}}" placeholder="Caste" >
                            <div style="color: red">{{ $errors->first('castes') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Religion</span></label>
                            <input type="text" class="form-control" name="religion" value="{{ old('religion', $getRecord->religion)}}" placeholder="Religion" >
                            <div style="color: red">{{ $errors->first('religion') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number)}}" placeholder="Mobile Number" >
                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Admission Date<span style="color: red">*</span></label>
                            <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date', $getRecord->admission_date)}}" placeholder="Admission Date" required>
                            <div style="color: red">{{ $errors->first('admission_date') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic">
                            <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                            @if(!@empty($getRecord->getProfile()))
                                <img src="{{ $getRecord->getProfile() }}" style="width: auto; height: 50px" alt="">
                            @endif
                        </div>


                        <div class="form-group col-md-6">
                            <label>Blood Grup</label>
                            <input type="text" class="form-control" name="blood_grup" value="{{ old('blood_grup', $getRecord->blood_grup)}}" placeholder="Blood Grup">
                            <div style="color: red">{{ $errors->first('blood_grup') }}</div>
                        </div>



                        <div class="form-group col-md-6">
                            <label>Height</label>
                            <input type="text" class="form-control" name="height" value="{{ old('height', $getRecord->height)}}" placeholder="Height">
                            <div style="color: red">{{ $errors->first('height') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Weight</label>
                            <input type="text" class="form-control" name="weight" value="{{ old('weight', $getRecord->weight)}}" placeholder="Weight">
                            <div style="color: red">{{ $errors->first('weight') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Status
                                <span style="color: red">*</span>
                            </label>
                            <select name="status" id="status" required class="form-control">
                                <option value="">Select Status</option>
                                <option {{ (old('status', $getRecord->status)== 0 ) ? 'selected' : ''}}  value="0">Active</option>
                                <option {{ (old('status', $getRecord->status)== 1 ) ? 'selected' : ''}}  value="1">Inactive</option>
                            </select>
                            <div style="color: red">{{ $errors->first('status') }}</div>
                        </div>


                    </div>

                    <hr/>

                  <div class="form-group">
                    <label>Email address<span style="color: red">*</span></label>
                    <input type="email" class="form-control" name="email" required value="{{ old('email', $getRecord->email)}}" placeholder="Email" >
                    <div style="color: red">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Password</span></label>
                    <input type="text" class="form-control"  name="password" placeholder="Password">
                    <p>Due you wan to change password pleace add new password</p>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>


              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

@endsection
