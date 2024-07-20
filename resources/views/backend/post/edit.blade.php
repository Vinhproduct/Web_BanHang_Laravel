@extends('layouts.admin')
@section('title', 'Post')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Bài Viết</h1>
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
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                       
                        <a href="{{route('admin.post.index')}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
             
                    <form action="{{route('admin.post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label>Tiêu đề bài viết (*)</label>
                            <input type="text" name="title" id="title" placeholder="Nhập tên chủ đề" class="form-control" value="{{ old('title',$post->title) }}">
                            @error('title')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Chọn chủ đề (*)</label>
                            <select name="topic_id" class="form-control">
                                <option value="0">None</option>
                                {!! $htmlTopicId !!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Ảnh bài viết</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Chi tiết (*)</label>
                            <input type="text" name="detail" id="detail" placeholder="Nhập chi tiết" class=" form-control" value="{{ old('detail',$post->detail) }}">
                        </div>
                        <div class="mb-3">
                            <label>Mô tả (*)</label>
                            <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả danh mục" class="form-control">{{ old('description',$post->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Loại</label>
                            <select  name="type" class="form-control">
                                <option value="0">Loại</option>
                                <option value="post" {{($post->type=="post")?'selected':''}}>Post</option>                                
                                <option value="page" {{($post->type=="page")?'selected':''}}>Page</option>                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                            <option value="1" {{($post->status==1)?'selected':''}}>Xuất bản</option>
                                    <option value="2" {{($post->status==2)?'selected':''}}>Chưa xuất bản</option>
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