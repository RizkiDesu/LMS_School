@extends('layout.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> {{ !empty($header_title)? $title : '' }}</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            @include('_message')

          <div class="col-md-12">
            <div class="card card-primary">
              <!-- form start -->
              <form method="post" action="">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="old_password"  placeholder="Old Password" >
                    </div>

                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" name="new_password"  placeholder="New Password" >
                    </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

@endsection
