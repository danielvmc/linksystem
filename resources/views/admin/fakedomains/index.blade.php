@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Danh sách Domain</h1>
    </div>

    <div class="panel-body">

    <div class="panel-body">
        <form method="POST" action="/admin/fake-domains">
            {{ csrf_field() }}

            <div class="form-group">
            <input type="text" class="form-control" name="name" id="name">
        </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>

        </form>

        <hr>


    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Domain</th>
                    <th>Ngày thêm</th>
                    <th class="fit">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($domains as $domain)
                    <tr class="odd gradeX">
                        <td>
                            <a href="http://{{ $domain->name }}">{{ $domain->name }}</a>
                        </td>
                        <td>{{ $domain->created_at}}</td>
                        <td class="fit">
                            <form action="{{ url('admin/fake-domains/'.$domain->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
