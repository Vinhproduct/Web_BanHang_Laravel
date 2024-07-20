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
                    <a href="{{route ('admin.category.trash') }}" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i>Thùng rác
                    </a>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        
                    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Tên danh mục (*)</label>
                            <input type="text" value="{{ old('name') }}"  name="name" id="name" placeholder="Nhập tên danh mục" class="form-control" onkeydown="handle_slug(this.value);">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Mô tả</label>
                            <textarea type="text"  value="{{ old('description') }}"  name="description" id="description" placeholder="Nhập mô tả" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Danh mục cha (*)</label>
                            <select name="parent_id" class="form-control">
                                <option value="0">None</option>
                                {!!$htmlparentid!!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Sắp xếp</label>
                            <select name="sort_order" class="form-control">
                                <option value="0">Chọn vị trí</option>
                                {!!$htmlsortorder!!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Hình đại diện</label>
                            <input type="file" name="image" class="form-control">
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
                    </form>
                    </div>
                    <div class="col-md-9">
                     
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:90px">Hình</th>
                            <th>Tên danh mục</th>
                            <th>Danh mục cha</th>
                            <th>Mô tả</th>
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
                              <img src="{{ asset('images/categorys/' .$row->image) }}"
                               class="img-fluid" alt="{{$row->image}}">
                            </td>
                            <td>
                              {{$row->name}}
                            </td>
                            <td>
                            {{$row->parent_id}}
                            </td>
                            <td>
                            {{$row->description}} 
                            </td>
                            <td class="text-center">
                                @php 
                                    $agrs=['id'=>$row->id]
                                @endphp
                                @if ($row->status==1)
                                <a href="{{route('admin.category.status',$agrs)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{route('admin.category.status',$agrs)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif
                                <a href="{{route('admin.category.show',$agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.category.edit',$agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.category.delete',$agrs)}}" class="btn btn-sm btn-danger">
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
        </div>
    </section>
</div>

@endsection
