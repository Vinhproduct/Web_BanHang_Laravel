@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<!-- CONTENT -->
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thùng Rác Chủ Đề</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Thùng rác chủ đề</li>
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
                    
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px">#</th>
                            <th>Tên chủ đề</th>
                            <th>Mô tả</th>
                          
                            <th class="text-center" style="width:190px">Chức năng</th>
                            <th class="text-center" style="width:30px">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listTopic as $row)
                        <tr>
                            <td class="text-center">
                              <input type="checkbox">
                            </td>
                            <td>
                              {{$row->name}}
                            </td>
                            <td>
                            {{$row->description}}
                            </td>
                          
                            <td class="text-center">
                            @php 
                                    $agrs=['id'=>$row->id]
                                @endphp
                                <div class="row justify-content-center">

                                <a href="{{route('admin.topic.show', $agrs)}}" class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.topic.restore', $agrs)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <form action="{{route('admin.topic.destroy',$agrs)}}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger" name="delete" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
</div>
                            </td>
                            <td>
                                {{$row->id}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </section>
</div>
<!-- /.CONTENT -->
@endsection