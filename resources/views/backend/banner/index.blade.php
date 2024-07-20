@extends('layouts.admin')
@section('title', 'Banner')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý banner</li>
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
                     
                        <a href="{{route ('admin.banner.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                    <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label>Tên banner (*)</label>
                                    <input type="text" name="name" id="name" placeholder="Nhập tên banner"
                                        class="form-control">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </div> 
                                <div class="mb-3">
                                    <label>Liên kết</label>
                                    <input type="text" name="link" id="link" placeholder="Nhập link" class="form-control" value="{{ old('link') }}"> 
                                </div>
                                 <div class="mb-3">
                                    <label for="description">Mô tả (*)</label>
                                    <textarea type="text" id="description" name="description" id="description" placeholder="Nhập mô tả danh mục"
                                        class="form-control" onkeydown="handle_slug(this.value);"value="{{ old('description') }}"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label >Vị trí</label>
                                    <select name="position" class="form-control">
                                <option value="0">Chọn vị trí </option>
                                <option value="slidershow">Slidershow</option>
                                    
                            </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình ảnh</label>
                                    <input type="file" name="image" id="image" placeholder="Nhập Image"
                                        class="form-control">
                                </div>
                       
                                 <div class="mb-3">
                            <label>Sắp xếp</label>
                            <select name="sort_order" class="form-control">
                                <option value="0">Chọn vị trí </option>
                                      {!!$htmlsortorder!!}
                            </select>
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
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:90px">Hình</th>
                            <th>Tên banner</th>
                            <th>Mô tả</th>
                            <th>Liên kết</th>
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
                              <img src="{{ asset('images/banner/'.$row->image) }}"
                               class="img-fluid" alt="{{$row->image}}">
                            </td>
                            <td>
                              {{$row->name}}
                            </td>
                            <td>
                            {{$row->description}}
                            </td>
                            <td>
                            {{$row->link}} 
                            </td>
                            <td class="text-center">
                            @php 
                                    $agrs=['id'=>$row->id]
                                @endphp
                            @if ($row->status==1)
                                <a href="{{route('admin.banner.status',$agrs)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{route('admin.banner.status',$agrs)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif
                                <a href="{{route('admin.banner.show',$agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.banner.edit',$agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.banner.delete',$agrs)}}" class="btn btn-sm btn-danger">
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