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
                <!-- <li class="breadcrumb-item">Karyawan</li>
                <li class="breadcrumb-item active">Books</li> -->
                <li class="breadcrumb-item active">Department</li>
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
                <h3 class="card-title">Data {{$title}}</h3>

                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                        <a href="/department/create">
                            <button type="button" class="btn btn-block btn-outline-primary btn-sm">INSERT</button>
                        </a>
                    </div>
                </div>
              </div>
            </div>
                          
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>#</td>
                        <td>
                          <a href="/department/show/{{$d->id}}">
                            {{$d->name}}
                          </a>
                        </td>
                        <td>{{$d->code}}</td>
                        <td>
                            <a href="/department/edit/{{$d->id}}">
                                <button type="button" class="btn btn-outline-warning btn-sm">
                                    EDIT
                                </button>
                            </a>
                            <a href="/department/delete/{{$d->id}}">
                                <button type="button" class="btn btn-outline-danger btn-sm">
                                    DELETE
                                </button>
                            </a>
                        </td>
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