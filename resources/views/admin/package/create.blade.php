@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Package</h1>
@stop

@section('content')
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            @if(Session::has('message'))
          <div class="alert alert-danger   show" role="alert">
              {{ Session::get('message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif

          @if($errors->has('exception'))
          <div class="alert alert-danger show"role="alert">
              {!! $errors->first('exception') !!}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="">
            {!! csrf_field() !!}
              <div class="box-body">
                <div class="form-group {{ $errors->has('package_name') ? 'has-error' : ''}}">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" name="package_name" value="{{old('package_name', $package->package_name) }}" id="exampleInputEmail1" placeholder="Package Name">
                  {!! $errors->first('package_name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
                  <label for="type">Type</label>
                  <select class="form-control" name="type" id="type">
                    <option value="">Select Type</option>
                    <option value="free">Free</option>
                    <option value="fixed">One-time purchase</option>
                    <option value="monthly">Monthly subscription</option>
                    <option value="yearly">Yearly subscription</option>
                  </select>
                  {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group {{ $errors->has('query_limit') ? 'has-error' : ''}}">
                  <label for="query_limit">Query Limit</label>
                  <input type="text" class="form-control" name="query_limit" id="query_limit" placeholder="Query Limit">
                  {!! $errors->first('query_limit', '<p class="help-block">:message</p>') !!}
                </div> 
                <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" name="price" id="price" value="{{old('price', $package->price) }}" placeholder="Price">
                  {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                </div>  
                <div class="form-group {{ $errors->has('api_key') ? 'has-error' : ''}}">
                   <input type="hidden" class="form-control" name="api_key" value="5487874sdff" id="api_key" placeholder="apikey">
                </div> 
              </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

           
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          
         
        </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

