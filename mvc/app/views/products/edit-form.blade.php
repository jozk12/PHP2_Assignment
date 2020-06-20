@extends('layouts.main')
@section('title-content')
    Sửa sản phẩm
@endsection
@section('content')
    <body>
    <div class="container">
        <form action="{{getClientUrl('save-edit-product')}}" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="{{$model->id}}" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name="name" id="" class="form-control" value="{{$model->name}}">
                                <span class="text-danger">@if(isset($_GET['nameerr'])){{$_GET['nameerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="image" id="" class="form-control">
                                <img src="{{BASE_URL.$model->image}}" width="515px" alt="">
                                <span class="text-danger">@if(isset($_GET['fileerr'])){{$_GET['fileerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="cate_id" id="" class="form-control">
                                    @foreach ($cates as $ca)
                                        <option value="{{$ca->id }}"
                                                @if($ca->id==$model->cate_id)
                                                selected
                                                @endif>
                                            {{$ca->cate_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" name="price" id="" class="form-control" value="{{$model->price}}">
                                <span class="text-danger">@if(isset($_GET['priceerr'])){{$_GET['priceerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Đánh giá</label>
                                <input type="text" name="star" id="" class="form-control" value="{{$model->star}}">
                                <span class="text-danger">@if(isset($_GET['starerr'])){{$_GET['starerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Lượt xem</label>
                                <input type="text" name="views" id="" class="form-control" value="{{$model->views}}">
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
                                <textarea name="short_desc" id="" cols="30" rows="5"
                                          class="form-control">{{$model->short_desc}}</textarea>
                                <span class="text-danger">@if(isset($_GET['short_descerr'])){{$_GET['short_descerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả chi tiết</label>
                                <textarea name="detail" id="" cols="30" rows="5"
                                          class="form-control">{{$model->detail}}</textarea>
                                <span class="text-danger">@if(isset($_GET['detailerr'])){{$_GET['detailerr']}} @endif</span>
                            </div>
                        </div>
                    <input type="submit" name="" id="" value="Lưu" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection