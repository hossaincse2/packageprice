@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Audit Log</h1>
@stop

@section('content')
<div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="" action="{{ url($url) }}" method="get" id="auditLogForm" name="auditLogForm">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="user_type">User Type</label>
                                    <select class="form-control select2" name="user_type" id="user_type" data-placeholder="Select a User type" style="width: 100%;">                                   
                                        <option value="admin">Admin</option>
                                        <option value="customer">Customer</option> 
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_at">Start Date</label>
                                    <input class="form-control" type="date" value="{{date('Y-m-d')}}" id="start_at" name="start_at" >
                                </div>
                            </div>                         
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label  for="end_at">End Date</label>
                                    <input class="form-control" type="date" id="end_at" value="{{date('Y-m-d')}}" name="end_at"  >
                                </div>
                            </div>
                        </div> 
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer ">
                        <div class="col-md-12 ">                                     				
                            <div class="form-group pull-right">
                                <button class="btn btn-success "  type="button" onclick="search();"><span class="glyphicon glyphicon-search"></span> Search </button> 
                                <button class="btn btn-primary " formtarget="_blank" type="submit"><span class="glyphicon glyphicon-list-alt"></span> Print</button> 
                            </div>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
<div class="row">
        <div class="col-xs-12">  
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Audit Logs Show</h3>
            </div> 
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                      <div id="onLoadData">

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
<script type="text/javascript">
            function search() {
                var data = $("#auditLogForm").serialize();
                                      
                $.ajax(
                        {
                            type: 'GET',
                            url: '/admin/report/audit-log-ajax/',
                            data: data,
                            //datatype: json,
                            success: function(data) {
                                $("#onLoadData").html(data);
                                displayDatatable();
                            }
                        }
                );
            }

            window.onload = search;
</script>
@stop

