@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Đơn Hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
        <section class="content">
        <div class="card">
        <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                     
                        <a href="" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="row">
            
                   
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:190px">Người dùng</th>
                            <th>Tên đơn hàng</th>
                            <th style="width:140px" >Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th class="text-center" style="width:190px">Chức năng</th>
                            <th class="text-center" style="width:30px">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $row)
                        <tr>
                            <td class="text-center">
                              <input type="checkbox">
                            </td>
                            <td class="text-center">
                            {{$row->username}}
                            </td>
                            <td>
                              {{$row->name}}
                            </td>
                            <td>
                            {{$row->phone}}
                            </td>
                            <td>
                            {{$row->email}} 
                            </td>
                            <td>
                            {{$row->address}} 
                            </td>
                            <td class="text-center">
                            <a href="{{route("admin.order.status",['id'=>$row->id])}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{route("admin.order.show",['id'=>$row->id])}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route("admin.order.edit",['id'=>$row->id])}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route("admin.order.destroy",['id'=>$row->id])}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                {{$row->id}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        
</div>
            </div>
        </div>
    </section>
</div>
<!-- /.CONTENT -->
@endsection 
