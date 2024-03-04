@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ !empty($header_title)? $title : '' }} List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Add New {{ !empty($title)? $title : '' }}</a>
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
                    <h3 class="card-title">Search {{ !empty($header_title)? $title : '' }} </h3>
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
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option {{ (Request::get('gender')=='Male') ? 'selected' : ''}} value="Male">Male</option>
                            <option {{ (Request::get('gender')=='Female') ? 'selected' : ''}} value="Female">Female</option>
                            <option {{ (Request::get('gender')=='Other') ? 'selected' : ''}} value="Other">Other</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                      <label>Occupation</label>
                      <input type="text" class="form-control" name="occupation" value="{{ Request::get('occupation') }}" placeholder="Occupation" >
                    </div>

                    <div class="form-group col-md-2">
                      <label>Address</label>
                      <input type="text" class="form-control" name="address" value="{{ Request::get('address') }}" placeholder="Address" >
                    </div>

                    <div class="form-group col-md-2">
                      <label>Mobile Number</label>
                      <input type="text" class="form-control" name="mobile_number" value="{{ Request::get('mobile_number') }}" placeholder="Mobile Number" >
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
                        <label>Created Date</label>
                        <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}">
                        <div style="color: red">{{ $errors->first('date') }}</div>
                    </div>
                    <div>
                      <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Search</button>
                      <a href="{{ url('admin/parent/list') }}" class="btn btn-success" style="margin-top: 32px;">Reset</a>
                  </div>

                    </div>
                </form>
              </div>


            @include('_message')

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ !empty($header_title)? $title : '' }} List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Profile Pic</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Gender</th>
                      <th>Phone</th>
                      <th>Occupation</th>
                      <th>Address</th>
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
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->gender }}</td>
                        <td>{{ $value->mobile_number }}</td>
                        <td>{{ $value->occupation }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>

                        
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at )) }}</td>
                        <td>
                            <a href="{{ url('admin/parent/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/parent/my-student/'.$value->id) }}" class="btn btn-secondary">My Student</a>
                            <a href="{{ url('admin/parent/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>

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
