@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User List Show</h3>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">
                  <div class="col-sm-12">
                  @if(Session::has('message'))
                  <div class="alert @if (Session::has('m-class')) {{ Session::get('m-class') }} @endif show" role="alert">
                  <!-- alert-success -->
                      {{ Session::get('message') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  @endif
                  <table id="package" class="table display table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                   <thead>
                    <tr role="row">
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Auth Token</th> 
                      <th>Action</th>
                    </tr>
                  </thead>
                <tbody>
                  @php $i=1; @endphp
                  @foreach($data as $user) 
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{ $i++ }}</td>
                      <td class="sorting_1">{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->auth_token }}</td> 
                      <td> <a href="{{ url('admin/add-user/'.$user->id) }}">Edit</a> | <a href="{{ url('admin/delete-user/'.$user->id) }}">Delete</a></td>
                    </tr>
                  @endforeach 
                 </tbody>
                <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Auth Token</th> 
                    <th>Action</th>
                </tr>
                </tfoot>
              </table></div>
            </div>
             </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
   
@stop

