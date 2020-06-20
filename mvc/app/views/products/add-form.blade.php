@extends('layouts.main')
@section('title-content')
    Thêm sản phẩm
@endsection
@section('content')
    <div class="container">
        <form action="{{getClientUrl('save-add-product')}}" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name="name" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['nameerr'])){{$_GET['nameerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="image" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['fileerr'])){{$_GET['fileerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="cate_id" id="" class="form-control">
                                    @foreach ($cates as $ca)
                                        <option value="{{$ca->id }}">
                                            {{$ca->cate_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" name="price" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['priceerr'])){{$_GET['priceerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Đánh giá</label>
                                <input type="text" name="star" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['starerr'])){{$_GET['starerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Lượt xem</label>
                                <input type="text" name="views" id="" class="form-control">
                                <span class="text-danger">@if(isset($_GET['viewerr'])){{$_GET['viewerr']}} @endif</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <textarea name="short_desc" id="" cols="30" rows="5" class="form-control"></textarea>
                                <span class="text-danger">@if(isset($_GET['short_descerr'])){{$_GET['short_descerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả chi tiết</label>
                                <textarea name="detail" id="" cols="30" rows="5" class="form-control"></textarea>
                                <span class="text-danger">@if(isset($_GET['detailerr'])){{$_GET['detailerr']}} @endif</span>
                            </div>
                        </div>
                    <input type="submit" name="" id="" value="Thêm" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection