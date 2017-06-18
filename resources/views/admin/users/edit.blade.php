@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <h1 class="page-header">Chỉnh sửa thành viên: {{ $user->name }}</h1>
    </div>
    <div class="panel-body">
    <form method="POST" action="/admin/users/{{ $user->id }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>

        <div class="form-group">
            @include('layouts.errors')
        </div>
    </form>
    </div>
@endsection
