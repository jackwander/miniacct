@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-6">
            <h1 class="m-0 text-dark">Accounts</h1>
          </div><!-- /.col -->
          <div class="col-lg-6">
            <ol class="breadcrumb float-lg-right">
              <li class="breadcrumb-item active">
                <i class="fas fa-credit-card"></i>
                Accounts
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <accounts user_id='{!!Auth::user()->id!!}'></accounts>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
