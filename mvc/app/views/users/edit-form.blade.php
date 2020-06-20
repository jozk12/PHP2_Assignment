@extends('layouts.main')
@section('title-content')
    Sửa tài khoản
@endsection
@section('content')
    <body>
    <div class="container">
        <form action="{{getClientUrl('save-edit-user')}}" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="{{$model->id}}" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên</label>
                                <input type="text" name="name" id="" class="form-control" value="{{$model->name}}">
                                <span class="text-danger">@if(isset($_GET['nameerr'])){{$_GET['nameerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="avatar" id="" class="form-control">
                                <img src="{{BASE_URL.$model->avatar}}" width="515" alt="">
                                <span class="text-danger">@if(isset($_GET['fileerr'])){{$_GET['fileerr']}} @endif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="" class="form-control"
                                           value="{{$model->email}}">
                                    <span class="text-danger">@if(isset($_GET['emailerr'])){{$_GET['emailerr']}} @endif</span>
                                </div>
                            </div>
                        </div>
                    <input type="submit" name="" id="" value="Lưu" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection