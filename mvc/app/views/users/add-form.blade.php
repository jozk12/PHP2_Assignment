@extends('layouts.main')
@section('title-content')
    Thêm tài khoản
@endsection
@section('content')
    <div class="container">
        <form action="{{getClientUrl('save-add-user')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên</label>
                                <input type="text" name="name" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['nameerr'])){{$_GET['nameerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="avatar" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['fileerr'])){{$_GET['fileerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['emailerr'])){{$_GET['emailerr']}} @endif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" name="password" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['passworderr'])){{$_GET['passworderr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Nhập lại mật khẩu</label>
                                <input type="password" name="cfpassword" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['cfpassworderr'])){{$_GET['cfpassworderr']}} @endif</span>
                            </div>
                        </div>
                    <input type="submit" name="" id="" value="Thêm" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection