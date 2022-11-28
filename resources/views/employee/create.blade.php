@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">{{$title}}</h1>
        </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Department</li>
                <li class="breadcrumb-item">Position</li>
                <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <form role="form" action="/employee/store" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Name">
                    @if ($errors->has('name'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('name')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Enter Address">
                    @if ($errors->has('address'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('address')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Adress">
                    @if ($errors->has('email'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('email')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone">
                    @if ($errors->has('phone'))
                      <div class="alert alert-danger">
                        <ul>
                          <li>{{$errors->first('phone')}}</li>
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Position</label>
                    <select name="position_id" class="custom-select">
                      @foreach($position as $pos)
                        <option value="{{$pos->id}}">{{$pos->name}} - {{$pos->department->name}}</option>
                      @endforeach
                    </select>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection