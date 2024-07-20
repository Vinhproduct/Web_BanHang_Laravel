@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Chủ Đề</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý chủ đề</li>
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
                       
                        <a href="{{route('admin.topic.index')}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">

<form action="{{route('admin.topic.update',['id'=>$topic->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label>Tên chủ đề (*)</label>
                                <input type="text" name="name" id="name" placeholder="Nhập tên chủ đề" class="form-control" value="{{ old('name',$topic->name) }}">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Mô tả (*)</label>
                                <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả" class="form-control">{{ old('description',$topic->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Sắp xếp</label>
                                <select name="sort_order" class="form-control">
                                    <option value="0">Chọn vị trí</option>
                                    {!!$htmlsortorder!!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                <option value="1" {{($topic->status==1)?'selected':''}}>Xuất bản</option>
                                <option value="2" {{($topic->status==2)?'selected':''}}>Chưa xuất bản</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">
                                    Cập nhật
                                </button>
                        </form>
                                        </div>
                             
     
    </section>
</div>
<!-- /.CONTENT -->
@endsection