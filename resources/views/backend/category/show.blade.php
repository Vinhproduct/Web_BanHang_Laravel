@extends('layouts.admin')
@section('title', 'Category')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="d-inline">Quản Lý Danh Mục</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý danh mục</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 text-right">
                                <!-- <a href="category_edit.html" class="btn btn-sm btn-primary">
                                    <i class="far fa-edit"></i> Sửa
                                </a>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Xóa
                                </a> -->
                                <a class="btn btn-sm btn-info" href="{{route('admin.category.index')}}">
                                    <i class="fa fa-arrow-left"></i> Về danh sách
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                        
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:30%;">
                                        <strong>Tên trường</strong>
                                    </th>
                                    <th class="text-center" style="width:70%;">Giá trị</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $row)
                                <tr>
                                    <td>Tên</td>
                                    <td> {{$row->name}}</td>
                                </tr>
                                <tr>
                                    <td>Slug</td>
                                    <td> {{$row->slug}}</td>
                                </tr>
                                <tr>
                                    <td>Hình</td>
                                    <td><img style="width:200px"src="{{ asset('images/categorys/'.$row->image) }}"
                                    class="img-fluid" alt="{{$row->image}}"></td>
                                </tr>
                                <tr>
                                    <td>Dang mục cha</td>
                                    <td> {{$row->parent_id}}</td>
                                </tr>
                                <tr>
                                    <td>Sắp xếp</td>
                                    <td> {{$row->sort_order}}</td>
                                </tr>
                                <tr>
                                    <td>Mô tả</td>
                                    <td> {{$row->description}}</td>
                                </tr>
                                <tr>
                                    <td>Tạo bởi</td>
                                    <td> {{$row->created_by}}</td>
                                </tr>
                                <tr>
                                    <td>Cập nhật bởi</td>
                                    <td> {{$row->updated_by}}</td>
                                </tr>
                                <tr>
                                    <td>Ngày tạo</td>
                                    <td> {{$row->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Ngày cập nhật</td>
                                    <td> {{$row->created_by}}</td>
                                </tr>
                                <tr>
                                    <td>Trạng thái</td>
                                    <td> {{$row->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </section>
</div>

@endsection






