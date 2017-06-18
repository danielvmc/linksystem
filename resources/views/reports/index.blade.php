@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Những trang web khi trên điện thoại thì không chuyển về site mình</h1>
    </div>
    <div class="panel-body">
        <form method="POST" action="/reports">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="site_name">Trang web:</label>
                <input type="text" class="form-control" name="site_name" id="site_name">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Gửi trang</button>
            </div>

            <div class="form-group">
                @include('layouts.errors')
            </div>

        </form>

        <hr>

        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Trang web</th>
                    <th >Người báo cáo</th>
                    <th>Thời gian</th>
                    {{-- <th class="fit">Thao tác</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($sites as $site)
                    <tr class="odd gradeX">
                        <td><a href="{{ $site->site_name }}">{{ $site->site_name }}</a></td>
                        <td>{{ $site->username }}</td>
                        <td>{{ $site->created_at->diffForHumans() }}</td>
                        {{-- <td class="fit">
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> Xoá
                                </button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
