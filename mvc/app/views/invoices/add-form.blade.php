@extends('layouts.main')
@section('title-content')
    Thêm hóa đơn
@endsection
@section('content')
    <div class="container">
        <form action="{{getClientUrl('save-add-invoice')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên khách hàng</label>
                                <input type="text" name="customer_name" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['nameerr'])){{$_GET['nameerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="customer_phone_number" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['phoneerr'])){{$_GET['phoneerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="customer_email" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['emailerr'])){{$_GET['emailerr']}} @endif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" name="customer_address" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['addresserr'])){{$_GET['addresserr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Tổng hóa đơn</label>
                                <input type="text" name="total_price" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['priceerr'])){{$_GET['priceerr']}} @endif</span>
                            </div>
                        </div>
                    <input type="submit" name="" id="" value="Thêm" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection