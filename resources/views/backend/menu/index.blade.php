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
                    <a href="{{route('admin.menu.trash')}}" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash" aria-hidden="true"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                
                            <form action="{{route('admin.menu.store')}}" method="post"enctype="multipart/form-data">
                                @csrf
                            <div class="mb-3">
                                <label>Tên menu (*)</label>
                                <input type="text" name="name" id="name"
                                    class="form-control" value="{{ old('name') }}">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label>Liên kết</label>
                                <input type="text" name="link" id="link"
                                    class="form-control" value="{{old('link')}}">
                            </div>
                          
                            <div class="mb-3">
                                <label>Parent_id</label>
                                <select name="parent_id" class="form-control">
                                    <option value="0">None</option>
                                    {!!$htmlparentid!!}
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                    <label >Vị trí</label>
                                    <select name="position" class="form-control">
                                <option value="0">Chọn vị trí </option>
                                <option value="mainmenu">Mainmenu</option>
                                <option value="footermenu">Footermenu</option>
                                    
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

                        </div>
                        <div class="col-md-9">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th  style="width:150px">Tên menu</th>                        
                            <th class="text-center">Menu cha</th>
                            <th class="text-center">Link</th>
                            <th class="text-center">Vị trí</th>
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
                            <td>
                              {{$row->name}}
                            </td>
                            <td class="text-center">
                              {{$row->parent_id}}
                            </td>
                            <td class="text-center">
                            {{$row->link}}
                            </td>
                            <td class="text-center">
                            {{$row->position}} 
                            </td>
                            <td class="text-center">
                            @php 
                                    $agrs=['id'=>$row->id]
                                @endphp
                            @if ($row->status==1)
                                <a href="{{route('admin.menu.status',$agrs)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{route('admin.menu.status',$agrs)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif
                                <a href="{{route('admin.menu.show',$agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.menu.edit',$agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.menu.delete',$agrs)}}" class="btn btn-sm btn-danger">
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