@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ !empty($title)? $title : '' }} List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add New {{ !empty($title)? $title : '' }}</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Search {{ !empty($title)? $title : '' }} </h3>
                </div>
                <!-- form start -->
                <form method="get" action="">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Name" >
                        </div>
                        <div class="form-group col-md-2">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ Request::get('last_name') }}" placeholder="Last Name" >
                        </div>

                        <div class="form-group col-md-2">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ Request::get('email') }}" placeholder="Email" >
                            <div style="color: red">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Admission Number</label>
                            <input type="text" class="form-control" name="admission_number" value="{{ Request::get('admission_number') }}" placeholder="Admission Number" >
                        </div>
                        <div class="form-group col-md-2">
                            <label>Roll Number</label>
                            <input type="text" class="form-control" name="roll_number" value="{{ Request::get('roll_number') }}" placeholder="Roll Number" >
                        </div>
                        <div class="form-group col-md-2">
                            <label>Class</label>
                            <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name') }}" placeholder="Class" >
                        </div>
                        <div class="form-group col-md-2">
                            <label>Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option {{ (Request::get('gender')=='Male') ? 'selected' : ''}} value="Male">Male</option>
                                <option {{ (Request::get('gender')=='Female') ? 'selected' : ''}} value="Female">Female</option>
                                <option {{ (Request::get('gender')=='Other') ? 'selected' : ''}} value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                          <label>Caste</label>
                          <input type="text" class="form-control" name="caste" value="{{ Request::get('caste') }}" placeholder="Caste" >
                        </div>

                        <div class="form-group col-md-2">
                          <label>Religion</label>
                          <input type="text" class="form-control" name="religion" value="{{ Request::get('religion') }}" placeholder="Religion" >
                        </div>

                        <div class="form-group col-md-2">
                          <label>Mobile Number</label>
                          <input type="text" class="form-control" name="mobile_date" value="{{ Request::get('mobile_date') }}" placeholder="Mobile Number" >
                        </div>
                        
                        <div class="form-group col-md-2">
                          <label>Blood Grup</label>
                          <input type="text" class="form-control" name="blood_grup" value="{{ Request::get('blood_grup') }}" placeholder="Blood Grup" >
                        </div>

                        <div class="form-group col-md-2">
                          <label>Status</label>
                          <select name="status" id="status" class="form-control" >
                            <option value="">Select Status</option>
                            <option {{ (Request::get('status')==100) ? 'selected' : ''}} value="100">Active</option>
                            <option {{ (Request::get('status')==1) ? 'selected' : ''}} value="1">Inactive</option>
                          </select>
                        </div>

                        <div class="form-group col-md-2">
                          <label>Admission Date</label>
                          <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date') }}">
                          <div style="color: red">{{ $errors->first('admission_date') }}</div>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Created Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}">
                            <div style="color: red">{{ $errors->first('date') }}</div>
                        </div>


                        <div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Search</button>
                            <a href="{{ url('admin/student/list') }}" class="btn btn-success" style="margin-top: 32px;">Reset</a>
                        </div>
                    </div>
                </form>
              </div>


            @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ !empty($title)? $title : '' }} List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Parent Name</th>
                      <th>Email</th>
                      <th>Admission Number</th>
                      <th>Roll Number</th>
                      <th>Class</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Caste</th>
                      <th>Religion</th>
                      <th>Mobile Number</th>
                      <th>Admission Date</th>
                      <th>Blood Grup</th>
                      <th>Height</th>
                      <th>Weight</th>
                      <th>Status</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>
                            @if (!@empty($value->getProfile()))
                            <img src="{{ $value->getProfile() }}" style="height: 50px; width: 50px; border-radius: 50px">
                            @endif
                        </td>
                        <td>{{ $value->name }} {{$value->last_name}}</td>
                        <td>{{ $value->parent_name }} {{$value->parent_last_name}}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->admission_number }}</td>
                        <td>{{ $value->roll_number }}</td>
                        <td>{{ $value->class_name }}</td>
                        <td>{{ $value->gender }}</td>
                        <td style="min-width: 100px">
                            @if (!@empty($value->date_of_birth))
                            {{date('d-m-Y', strtotime($value->date_of_birth))}}
                            @endif
                        </td>
                        <td>{{ $value->caste }}</td>
                        <td>{{ $value->religion }}</td>
                        <td>{{ $value->mobile_number }}</td>
                        <td style="min-width: 100px">
                            @if (!@empty($value->admission_date))
                            {{date('d-m-Y', strtotime($value->admission_date))}}
                            @endif
                        <td>{{ $value->blood_grup }}</td>
                        <td>{{ $value->height }}</td>
                        <td>{{ $value->weight }}</td>
                        <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at )) }}</td>
                        <td style="min-width: 50px">
                            <a href="{{ url('admin/student/edit/'.$value->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ url('admin/student/delete/'.$value->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float:right">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
                {{-- {!! $getRecord->append() !!} --}}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
