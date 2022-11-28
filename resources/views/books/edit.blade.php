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
                <li class="breadcrumb-item">Karyawan</a></li>
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
              <form role="form" action="/books/update" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{$data->id}}">
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" value="{{$data->title}}" name="title" placeholder="Enter Nama">
                  </div>
                  <div class="form-group">
                    <label>Author</label>
                    <input type="text" class="form-control"  value="{{$data->author}}" name="author" placeholder="Enter Alamat">
                  </div>

                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="text" class="form-control"  value="{{$data->tahun}}" name="tahun" placeholder="Enter Jabatan">
                  </div>

                  <div class="form-group">
                    <label>Publisher</label>
                    <input type="text" class="form-control"  value="{{$data->publisher}}" name="publisher" placeholder="Enter Jabatan">
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