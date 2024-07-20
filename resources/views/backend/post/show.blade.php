@extends('layouts.admin')
@section('title', 'Category')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="d-inline">Quản Lý Bài Viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý bài viết</li>
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
                                <a class="btn btn-sm btn-info" href="{{route('admin.post.index')}}">
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
                                    <td>Chủ đề</td>
                                    <td> {{$row->topic_id}}</td>
                                </tr>
                                <tr>
                                    <td>Tiêu đề</td>
                                    <td> {{$row->title}}</td>
                                </tr>
                                <tr>
                                    <td>Slug</td>
                                    <td> {{$row->slug}}</td>
                                </tr>
                                <tr>
                                    <td>Hình</td>
                                    <td><img style="width:200px"src="{{ asset('images/posts/'.$row->image) }}"
                                    class="img-fluid" alt="{{$row->image}}"></td>
                                </tr>
                              
                                <tr>
                                    <td>Chi tiết</td>
                                    <td> {{$row->detail}}</td>
                                </tr>
                                <tr>
                                    <td>Loại</td>
                                    <td> {{$row->type}}</td>
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






