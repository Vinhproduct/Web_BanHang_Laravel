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
                    <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại
                    </a>
                </div>
            </div>
        </div>
            <div class="card-body">
            <form action="{{ route('admin.category.update',['id'=>$category->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label>Tên danh mục (*)</label>
                            <input type="text" value="{{ old('name',$category->name) }}"  name="name" id="name" placeholder="Nhập tên danh mục" class="form-control" onkeydown="handle_slug(this.value);">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Mô tả</label>
                            <textarea type="text"   name="description" id="description" placeholder="Nhập mô tả" class="form-control">{{ old('description',$category->description) }}</textarea>
                         
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
                            <select name="status" class="form-control   ">
                                <option value="1" {{($category->status==1)?'selected':''}}>Xuất bản</option>
                                <option value="2" {{($category->status==2)?'selected':''}}>Chưa xuất bản</option>

                            </select>
                        </div>
                        <div class="mb-3">
                           <button type="submit"class="btn btn-success" style=>Cập nhật</button>
                        </div>
                    </form>
            </div>
        </div>
    </section>
</div>

@endsection
