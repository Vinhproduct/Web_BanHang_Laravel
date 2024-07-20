@extends('layouts.admin')
@section('title', 'Brand')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Thương Hiệu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý thương hiệu</li>
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
                    <a href="{{route('admin.brand.trash')}}" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                                <div class="mb-3">
                                    <label>Tên thương hiệu (*)</label>
                                    <input type="text" name="name" id="name" placeholder="Nhập tên thương hiệu"value="{{ old('name') }}"
                                        class="form-control">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div
                                > <div class="mb-3">
                                    <label for="description">Mô tả (*)</label>
                                    <textarea type="text" id="description" name="description" id="description" placeholder="Nhập mô tả"
                                        class="form-control" onkeydown="handle_slug(this.value);" value="{{ old('description') }}"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Sắp xếp</label>
                                         <select name="sort_order" class="form-control">
                                            <option value="0">Chọn vị trí</option>
                                            {!!$htmlsortorder!!}
                                         </select>  
                                 </div>
                               

                                <div class="mb-3">
                                    <label>Hình ảnh</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                               
                                <div class="mb-3">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Xuất bản</option>
                                        <option value="2">Chưa xuất bản</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success">
                                    Thêm 
                                </button>
                            </form>                       
                        </div>                  
                <div class="col-md-9">
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:90px">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Slug</th>
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
                              <img src="{{ asset('images/brands/'.$row->image) }}"
                               class="img-fluid" alt="{{$row->image}}">
                            </td>
                            <td>
                              {{$row->name}}
                            </td>
                            <td>
                            {{$row->slug}}
                            </td>
                            <td>
                            {{$row->description}} 
                            </td>
                            <td class="text-center">
                            @php 
                                    $agrs=['id'=>$row->id]
                                @endphp
                            @if ($row->status==1)
                                <a href="{{route('admin.brand.status',$agrs)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{route('admin.brand.status',$agrs)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif
                                <a href="{{route('admin.brand.show',$agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.brand.edit',$agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.brand.delete',$agrs)}}" class="btn btn-sm btn-danger">
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