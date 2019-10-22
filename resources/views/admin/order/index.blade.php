@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Customer Order</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order List Show</h3>
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
                      <th>Order Number</th>
                      <th>Payment Method</th>
                      <th>User Name</th>
                      <th>Package Name</th>
                      <th>Package Type</th>
                      <th>Package Price</th>
                      <th>Package Query Limit</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                <tbody>
                  @php $i=1; @endphp
                  @foreach($data as $order)
                    <tr role="row" class="odd">
                      <td class="sorting_1">{{ $i++ }}</td>
                      <td class="sorting_1">{{ $order->order_number }}</td>
                      <td>{{ $order->payment_method }}</td>
                      <td>{{ $order->user->name }}</td>
                      <td>{{ $order->package->package_name }}</td>
                      <td>{{ $order->package->type }}</td>
                      <td>${{ $order->package->price }}</td>
                      <td>{{ $order->package->query_limit }}</td>
                      <td> <a href="{{ url('admin/add-order/'.$order->id) }}">Edit</a> | <a href="{{ url('admin/delete-order/'.$order->id) }}">Delete</a></td>
                    </tr>
                  @endforeach
                 </tbody>
                <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Order Number</th>
                    <th>Payment Method</th>
                    <th>User Name</th>
                    <th>Package Name</th>
                    <th>Package Type</th>
                    <th>Package Price</th>
                    <th>Package Query Limit</th>
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

