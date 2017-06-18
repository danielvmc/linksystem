@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Thông tin của bạn</h1>
    </div>
    <div class="panel-body">
        <form method="POST" action="/setting">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="old_password">Mật khẩu cũ:</label>
                <input type="password" class="form-control" name="old_password" id="old_password">
            </div>

            <div class="form-group">
                <label for="new_password">Mật khẩu mới:</label>
                <input type="password" class="form-control" name="new_password" id="new_password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>
            </div>
        </form>
    </div>
@endsection
