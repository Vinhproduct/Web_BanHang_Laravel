@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="d-inline">Tất Cả Thành Viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tất cả thành viên</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header text-right">
            <a href="{{route('admin.user.create')}}" class="btn btn-sm btn-success">Thêm</a>
                <a class="btn btn-sm btn-danger" href="{{route('admin.user.trash')}}">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    Thùng rác
</a>
            </div>
            <div class="card-body">
                
                    
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th class="text-center" style="width:90px">Hình</th>
                            <th>Tên thành viên</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Quyền</th>
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
                              <img src="{{ asset('images/users/'.$row->image) }}"
                               class="img-fluid" alt="{{$row->image}}">
                            </td>
                            <td>
                              {{$row->name}}
                            </td>
                            <td>
                            {{$row->email}}
                            </td>
                            <td>
                            {{$row->phone}} 
                            </td>
                            <td>
                            {{$row->address}} 
                            </td>
                            <td>
                            {{$row->roles}} 
                            </td>
                            <td class="text-center">
                            @php 
                                    $agrs=['id'=>$row->id]
                                @endphp
                            @if ($row->status==1)
                                <a href="{{route('admin.user.status',$agrs)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                @else
                                <a href="{{route('admin.user.status',$agrs)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                @endif
                                <a href="{{route('admin.user.show',$agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.user.edit',$agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.user.delete',$agrs)}}" class="btn btn-sm btn-danger">
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
    </section>
</div>

@endsection
