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
              <form method="post" action="">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="name" class="form-control" name="name" value="{{ $getRecord->name }}" placeholder="Class Name" >
                    </div>
                    <div class="form-group">
                        <label>{{ !empty($header_title)? $title : '' }} Type</label>
                        <select name="type" class="form-control" >
                            <option value="">Select Type</option>
                            <option {{ ($getRecord->type == 'theory') ? 'selected'  : ''}} value="theory">Theory</option>
                            <option {{ ($getRecord->type == 'practical') ? 'selected'  : ''}} value="practical">Practical</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" >
                            <option {{ ($getRecord->status == 0) ? 'selected'  : ''}} value="0">Active</option>
                            <option {{ ($getRecord->status == 1) ? 'selected'  : ''}} value="1">Inactive</option>
                        </select>
                    </div>

                </div>
                <!-- /.card-body -->
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
