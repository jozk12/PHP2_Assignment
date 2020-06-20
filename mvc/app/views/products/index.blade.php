@extends('layouts.main')
@section('title-content')
    Sản phẩm
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length">
                                <label for="">
                                    Show
                                    <select name="" id=""
                                            class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stars</th>
                            <th>Views</th>
                            <th colspan="2">
                                <a href="<?= getClientUrl('add-product') ?>">
                                    <button class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Thêm</button>
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <td>{{$p->id}} </td>
                                <td>{{$p->name}}</td>
                                <td><img src="{{BASE_URL. $p->image}}" alt="" width="100px"></td>
                                <td>{{$p->getName->cate_name}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->star}} &nbsp;<span class="fa fa-star checked"
                                                             style="color: #ffff00"></span>
                                </td>
                                <td>{{$p->views}}</td>
                                <td>
                                    <a href="<?= getClientUrl('edit-product', ['id' => $p->id]) ?>">
                                        <button class="btn btn-success"><i class="fas fa-edit"></i>&nbsp; Sửa
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= getClientUrl('remove-product', ['id' => $p->id]) ?>">
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp; Xóa
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row pt-4">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                Showing {{$offset+1}}
                                to
                                @if ($offset+$total_product_one_page < count($getAllProduct))
                                    {{$offset+$total_product_one_page}}
                                @else
                                    {{count($getAllProduct)}}
                                @endif
                                of {{count($getAllProduct)}} entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers text-right">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous @if($page==1) disabled @endif">
                                        <a href="{{getClientUrl('product',['page'=>1])}}"
                                           class="page-link">First</a>
                                    </li>
                                    <li class="paginate_button page-item previous @if($page==1) disabled @endif">
                                        <a href="{{getClientUrl('product',['page'=>$page-1])}}"
                                           class="page-link"><<</a>
                                    </li>
                                    @for($i = 1; $i <= $total_page; $i++)
                                        @if ($i < $page+3 && $i > $page-3)
                                            <li class="paginate_button page-item @if($page==$i) active @endif">
                                                <a href="{{getClientUrl('product',['page'=>$i])}}"
                                                   class="page-link">
                                                    {{$i}}
                                                </a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="paginate_button page-item next @if($page==$total_page) disabled @endif">
                                        <a href="{{getClientUrl('product',['page'=>$page+1])}}"
                                           class="page-link">>></a>
                                    </li>
                                    <li class="paginate_button page-item next @if($page==$total_page) disabled @endif">
                                        <a href="{{getClientUrl('product',['page'=>$total_page])}}"
                                           class="page-link">Last</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection