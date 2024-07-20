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
                       
                        <a href="{{route('admin.post.trash')}}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                    <form action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Tiêu đề bài viết (*)</label>
                            <input type="text" name="title" id="title" placeholder="Nhập tên chủ đề" class="form-control" value="{{ old('title') }}">
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
                            <input type="text" name="detail" id="detail" placeholder="Nhập chi tiết" class=" form-control" value="{{ old('detail') }}">
                        </div>
                        <div class="mb-3">
                            <label>Mô tả (*)</label>
                            <textarea rows="3" name="description" id="description" placeholder="Nhập mô tả danh mục" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Loại</label>
                            <select  name="type" class="form-control">
                                <option value="0">Loại</option>
                                <option value="post">Post</option>
                                <option value="page">Page</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
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
                            <th>Chủ đề</th>
                            <th>Tiêu đề</th>
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
                              <img src="{{asset('images/posts/'.$row->image) }}"class="img-fluid" alt="{{$row->image}}">                       
                            </td>
                            <td>
                              {{$row->topicname}}
                            </td>
                            <td>
                            {{$row->title}}
                            </td>
                            <td>
                            {{$row->description}} 
                            </td>
                            <td class="text-center">
                            @php 
                                    $agrs=['id'=>$row->id]
                                @endphp
                            @if ($row->status==1)
                                <a href="{{route('admin.post.status',$agrs)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{route('admin.post.status',$agrs)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif
                                <a href="{{route('admin.post.show', $agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.post.edit', $agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.post.delete', $agrs)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                {{$row->id}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table></div>  
            </div>
        </div>
    </section>
</div>
<!-- /.CONTENT -->
@endsection