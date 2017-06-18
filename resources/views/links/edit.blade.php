@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
    </div>
    <div class="panel-body">
        <form method="POST" action="{{ url('admin/links/'.$link->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $link->title }}">
            </div>

            <div class="form-group">
                <label for="fake_link">Link giả:</label>
                <input type="text" class="form-control" name="fake_link" id="fake_link" value="{{ $link->fake_link }}">
            </div>

            <div class="form-group">
                <label for="real_link">Link bài:</label>
                <input type="text" class="form-control" name="real_link" id="real_link" value="{{ $link->real_link }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sửa link</button>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div
            </div>
        </form>
    </div>
@endsection
