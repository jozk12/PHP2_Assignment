@extends('layouts.main')
@section('title-content')
    Sửa loại sản phẩm
@endsection
@section('content')
    <body>
    <div class="container">
        <form action="{{getClientUrl('save-edit-category')}}" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="{{$model->id}}" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên loại</label>
                                <input type="text" name="cate_name" id="" class="form-control"
                                       value="{{$model->cate_name}}">
                                <span class="text-danger">@if(isset($_GET['nameerr'])){{$_GET['nameerr']}} @endif</span>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="desc" id="" cols="30" rows="3"
                                          class="form-control">{{$model->desc}}</textarea>
                                <span class="text-danger">@if(isset($_GET['descerr'])){{$_GET['descerr']}} @endif</span>
                            </div>
                        </div>
                        <input type="submit" name="" id="" value="Lưu" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection