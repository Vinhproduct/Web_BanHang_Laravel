@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="d-inline">Sửa Thành Viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản Lý Thành Viên</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="card">
        <div class="card-header">
            <div class="col-12 text-right">
        <a href="{{route('admin.user.index')}}" class="btn btn-sm btn-warning">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại
                        </a>
            </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                    <form action="{{route('admin.user.update',['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf  
                        @method("PUT")                
                             <div class="mb-3">
                            <label>Tên thành viên (*)</label>
                            <input type="text" name="name" value="{{ old('name',$user->name) }}"  id="name" placeholder="Nhập tên thành viên" class="form-control" onkeydown="handle_slug(this.value);">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email',$user->email) }}"  id="email" placeholder="Nhập email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone"  value="{{ old('phone',$user->phone) }}" id="phone" placeholder="Nhập số điện thoại" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Địa chỉ</label>
                            <textarea type="address" style="height:95px"  name="address" id="address" placeholder="Nhập địa chỉ" class="form-control">{{ old('address',$user->address) }}</textarea>
                        </div> 
                        </div>
                        <div class="col-md-3"> <div class="mb-3">
                            <label>Mật khẩu</label>
                            <input type="password" value="{{ old('password',$user->password) }}"  name="password" id="password" placeholder="Nhập mật khẩu" class="form-control">
                        </div> 
                        <div class="mb-3">
                                    <label for="roles">Quyền</label>
                                    <select name="roles" id="roles" class="form-control">
                                    <option value="customer" {{($user->roles=="customer")?'selected':''}}>Khách hàng</option>
                                <option value="admin" {{($user->roles=="admin")?'selected':''}}>Quản lý</option>
                                    </select>
                                </div>                      
                        <div class="mb-3">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                            <option value="1" {{($user->status==1)?'selected':''}}>Xuất bản</option>
                                <option value="2" {{($user->status==2)?'selected':''}}>Chưa xuất bản</option>
                            </select>
                        </div>
                        
                            <div class="mb-3">
                            <label>Hình đại diện</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <button type="submit"class="btn btn-success" style="width:293px"> Cập nhật</button>
                        </div>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
