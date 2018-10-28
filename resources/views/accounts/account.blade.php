@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-6">
            <h1 class="m-0 text-dark">{{$acct->acct_name}}</h1>
            <h5 class="m-0 text-dark">{{$acct->acct_detail}}</h5>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <account acct_id='{!! $acct->acct_id !!}'></account>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
