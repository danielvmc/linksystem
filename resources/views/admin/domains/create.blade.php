@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Thêm Domain</h1>
    </div>
    <div class="panel-body">
    <form method="POST" action="/admin/domains">
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>

        <div class="form-group">
            @include('layouts.errors')
        </div>
    </form>
    </div>
@endsection
