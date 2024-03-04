@extends('layout.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New {{ !empty($header_title)? $title : '' }}</h1>
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
                            <input type="text" class="form-control" name="name" required value="{{ old('name')}}" placeholder="First Name" >
                            <div style="color: red">{{ $errors->first('name') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Last Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="last_name" required value="{{ old('last_name')}}" placeholder="Last Name" >
                            <div style="color: red">{{ $errors->first('last_name') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender
                                <span style="color: red">*</span>
                            </label>
                            <select name="gender" id="gender" required class="form-control">
                                <option value="">Select Gender</option>
                                <option {{ (old('gender')=='Male') ? 'selected' : ''}} value="Male">Male</option>
                                <option {{ (old('gender')=='Female') ? 'selected' : ''}} value="Female">Female</option>
                                <option {{ (old('gender')=='Other') ? 'selected' : ''}} value="Other">Other</option>
                            </select>
                            <div style="color: red">{{ $errors->first('gender') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Occupation</span></label>
                            <input type="text" class="form-control" name="occupation" value="{{ old('occupation')}}" placeholder="Occupation" >
                            <div style="color: red">{{ $errors->first('occupation') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Mobile Number<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number')}}" placeholder="Mobile Number" required>
                            <div style="color: red">{{ $errors->first('mobile_number') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Address<span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="address" value="{{ old('address')}}" placeholder="Address" required>
                            <div style="color: red">{{ $errors->first('address') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" id="profile_pic">
                            <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status
                                <span style="color: red">*</span>
                            </label>
                            <select name="status" id="status" required class="form-control">
                                <option value="">Select Status</option>
                                <option {{ (old('status')==0) ? 'selected' : ''}}  value="0">Active</option>
                                <option {{ (old('status')==1) ? 'selected' : ''}}  value="1">Inactive</option>
                            </select>
                            <div style="color: red">{{ $errors->first('status') }}</div>
                        </div>
                    </div>

                    <hr/>

                  <div class="form-group">
                    <label>Email address<span style="color: red">*</span></label>
                    <input type="email" class="form-control" name="email" required value="{{ old('email')}}" placeholder="Email" >
                    <div style="color: red">{{ $errors->first('email') }}</div>
                  </div>
                  <div class="form-group">
                    <label>Password<span style="color: red">*</span></label>
                    <input type="password" class="form-control"  name="password" required placeholder="Password">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

@endsection
