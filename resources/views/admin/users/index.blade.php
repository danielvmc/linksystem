@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <h1 class="page-header">Danh sách thành viên</h1>
    </div>
    <ul class="list-group">
        <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Tên đăng nhập</th>
                    <th>Tổng Bài</th>
                    <th>Tổng click bài</th>
                    <th class="fit">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="odd gradeX">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->links->count() }}</td>
                        <td>{{ $user->links->sum('clicks') }}</td>
                        <td class="fit">
                            <a class="btn btn-primary" href="{{ url('/admin/users/'.$user->id.'/edit') }}"><i class="fa fa-edit"></i> Sửa</a>
                            <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
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
        </div>
    </ul>
    </div>
@endsection




    <!-- /.panel-heading -->
