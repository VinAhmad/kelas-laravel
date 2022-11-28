@extends('layouts.master')

@section('content-header')
<div class="container-fluid">
  <div class="row mb-2">
  <div class="col-sm-6">
    <h1 class="m-0 text-dark">{{$title}} - {{$data->name}}</h1>
        </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{$title}} - {{$data->name}}</li>
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
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data {{$title}} - {{$data->name}}</h3>
            </div>
                          
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Position</th>
                      <th>Code</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data->position as $pos)
                        <tr>
                            <td>#</td>
                            <td>{{$pos->name}}</td>
                            <td>{{$pos->code}}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>

@endsection