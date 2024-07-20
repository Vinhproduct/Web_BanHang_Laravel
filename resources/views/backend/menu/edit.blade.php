@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lý Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản lý menu</li>
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
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-warning">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại
                    </a>
                </div>
            </div>
        </div>
            <div class="card-body">
                            <form action="{{route('admin.menu.update',['id'=>$menu->id]) }}" method="post"enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="mb-3">
                                <label>Tên menu (*)</label>
                                <input type="text" name="name" id="name" 
                                    class="form-control" value="{{ old('name',$menu->name) }}">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label>Link</label>
                                <input type="text" name="link" id="link" 
                                    class="form-control" value="{{old('link',$menu->link) }}">
                            </div>
                            <div class="mb-3">
                                    <label >Vị trí</label>
                                    <select name="position" class="form-control">
                                <option value="0">Chọn vị trí </option>
                                <option value="mainmenu" {{($menu->position=="mainmenu")?'selected':''}}>Mainmenu</option>
                                <option value="footermenu" {{($menu->position=="footermenu")?'selected':''}}>Footermenu</option>

                                    
                            </select>
                                </div>
                            <div class="mb-3">
                                <label>Parent_id</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">None</option>
                                    {!!$htmlparentid!!}
                                    
                                </select>
                            </div>
                      

                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                <option value="1" {{($menu->status==1)?'selected':''}}>Xuất bản</option>
                                <option value="2" {{($menu->status==2)?'selected':''}}>Chưa xuất bản</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success">
                                    Cập nhật 
                                </button>
                        </div>
                     
            
        
    </section>
</div>
<!-- /.CONTENT -->
@endsection