@extends('layouts.main')
@section('title-content')
    Tài khoản
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th colspan="2">
                                <a href="<?= getClientUrl('add-user') ?>">
                                    <button class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Thêm</button>
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $u)
                            <tr>
                                <td>{{$u->id}} </td>
                                <td>{{$u->name}}</td>
                                <td><img src="{{BASE_URL. $u->avatar}}" alt="" width="100px"></td>
                                <td>{{$u->email}}</td>
                                <td>
                                    <a href="<?= getClientUrl('edit-user', ['id' => $u->id]) ?>">
                                        <button class="btn btn-success"><i class="fas fa-edit"></i>&nbsp; Sửa</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= getClientUrl('remove-user', ['id' => $u->id]) ?>">
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
                                @if ($offset+$total_user_one_page < count($getAllUser))
                                    {{$offset+$total_user_one_page}}
                                @else
                                    {{count($getAllUser)}}
                                @endif
                                of {{count($getAllUser)}} entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="dataTables_paginate paging_simple_numbers text-right">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous @if($page==1) disabled @endif">
                                        <a href="{{getClientUrl('user',['page'=>1])}}" class="page-link">First</a>
                                    </li>
                                    <li class="paginate_button page-item previous @if($page==1) disabled @endif">
                                        <a href="{{getClientUrl('user',['page'=>$page-1])}}" class="page-link"><<</a>
                                    </li>
                                    @for($i = 1; $i <= $total_page; $i++)
                                        @if ($i < $page+3 && $i > $page-3)
                                            <li class="paginate_button page-item @if($page==$i) active @endif" >
                                                <a href="{{getClientUrl('user',['page'=>$i])}}" class="page-link">
                                                    {{$i}}
                                                    </a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="paginate_button page-item next @if($page==$total_page) disabled @endif">
                                        <a href="{{getClientUrl('user',['page'=>$page+1])}}" class="page-link">>></a>
                                    </li>
                                    <li class="paginate_button page-item next @if($page==$total_page) disabled @endif">
                                        <a href="{{getClientUrl('user',['page'=>$total_page])}}" class="page-link">Last</a>
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