@extends('layout.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Class List</h1>
          </div>
          <div class="col-sm-6" style="text-align: right">
            <a href="{{ url('admin/subject/add') }}" class="btn btn-primary">Add New {{ !empty($title)? $title : '' }}</a>
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
                        <div class="form-group col-md-3">
                            <label>{{ !empty($header_title)? $title : '' }} Name</label>
                            <input type="text" class="form-control" name="name" value="{{ Request::get('name') }}" placeholder="Name" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>{{ !empty($header_title)? $title : '' }} Type</label>
                            <select name="type" class="form-control" >
                                <option value="">Select Type</option>
                                <option {{ (Request::get('type') == 'theory') ? 'selected'  : ''}} value="theory">Theory</option>
                                <option {{ (Request::get('type') == 'practical') ? 'selected'  : ''}} value="practical">Practical</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" value="{{ Request::get('date') }}">
                            <div style="color: red">{{ $errors->first('date') }}</div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Search</button>
                            <a href="{{ url('admin/subject/list') }}" class="btn btn-success" style="margin-top: 32px;">Reset</a>
                        </div>
                    </div>
                </form>
              </div>


            @include('_message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">subject List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Subject Name</th>
                      <th>Subject Type</th>
                      <th>Subject Status</th>
                      <th>Create By</th>
                      <th>Create Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getRecord as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>

                        <td>
                            @if ($value->type=='theory')
                                Theory
                            @else
                                Practical
                            @endif
                        </td>

                        <td>
                            @if ($value->status==0)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at )) }}</td>
                        <td>
                            <a href="{{ url('admin/subject/edit/'.$value->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/subject/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                    @endforeach

                  </tbody>
                </table>
                <div style="padding: 10px; float:right">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
                <div style="padding: 10px; float:right">
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
