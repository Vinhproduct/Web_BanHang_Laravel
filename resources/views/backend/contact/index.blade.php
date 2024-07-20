@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Liên Hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý liên hệ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
        <section class="content">
        <div class="card">
            <div class="card-header text-right">
                <button class="btn btn-sm btn-danger">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    Thùng rác
                </button>
            </div>
            <div class="card-body">
            <div class="row">
                    
                    <!-- <form action="{{route('admin.contact.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Tên liên hệ (*)</label>
                            <input type="text" name="name" id="name"  class="form-control" onkeydown="handle_slug(this.value);">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" id="phone"  class="form-control">
                            @error('phone')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" id="email"  class="form-control">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Tiêu đề</label>
                            <input type="text" name="title" id="title"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nội dung</label>
                            <input type="text" name="content" id="content"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Người dùng (*)</label>
                            <select name="user_id" class="form-control">
                                <option value="">Chọn người dùng</option>
                                {!!$htmluserid!!}             
                                           </select>
                        </div>
                        <div class="mb-3">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
                            </select>
                        </div>
                        <div class="mb-3">
                           <button type="submit"class="btn btn-success" style=> Thêm</button>
                        </div>
                    </form> -->
                   
                  
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:120px">Người dùng</th>
                            <th>Tên liên hệ</th>
                            <th style="width:140px" >Số điện thoại</th>
                            <th>Email</th>
                            <th>Content</th>
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
                            {{$row->content}} 
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
