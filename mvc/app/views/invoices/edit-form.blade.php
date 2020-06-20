@extends('layouts.main')
@section('title-content')
    Sửa hóa đơn
@endsection
@section('content')
    <body>
    <div class="container">
        <form action="{{getClientUrl('save-edit-invoice')}}" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="{{$model->id}}" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên khách hàng</label>
                                <input type="text" name="customer_name" id="" class="form-control"
                                       value="{{$model->customer_name}}">
                                <span class="text-danger">@if(isset($_GET['nameerr'])){{$_GET['nameerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="customer_phone_number" id="" class="form-control"
                                       value="{{$model->customer_phone_number}}">
                                <span class="text-danger">@if(isset($_GET['phoneerr'])){{$_GET['phoneerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="customer_email" id="" class="form-control"
                                       value="{{$model->customer_email}}">
                                <span class="text-danger">@if(isset($_GET['emailerr'])){{$_GET['emailerr']}} @endif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" name="customer_address" id="" class="form-control"
                                           value="{{$model->customer_address}}">
                                    <span class="text-danger">@if(isset($_GET['addresserr'])){{$_GET['addresserr']}} @endif</span>
                                </div>
                                <div class="form-group">
                                    <label for="">Tổng hóa đơn</label>
                                    <input type="text" name="total_price" id="" class="form-control"
                                           value="{{$model->total_price}}">
                                    <span class="text-danger">@if(isset($_GET['priceerr'])){{$_GET['priceerr']}} @endif</span>
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