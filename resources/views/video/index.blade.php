@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <h1 class="page-header">Danh sách link</h1>
    </div>

    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        @if (!auth()->user()->isAdmin())
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Link video</th>
                    <th>Link bài</th>
                    <th>Link đăng</th>
                    <th>Clicks</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($links as $link)
                    <tr class="odd gradeX">
                        <td>{{ str_limit($link->title, 20) }}</td>
                        <td><a href="{{ $link->video_link }}">{{ str_limit($link->video_link, 25) }}</td>
                        <td><a href="{{ $link->real_link }}">{{ str_limit($link->real_link, 25) }}</td>
                        <td><a href="{{ $link->full_link }}">{{ str_limit($link->full_link, 25) }}</a></td>
                        {{-- <td><a href="{{ $link->tiny_url_link }}">{{ $link->tiny_url_link }}</a></td> --}}
                        <td>{{ Redis::get('links.clicks'. $link->link_basic) ?? 0 }}</td>
                        <td>{{ $link->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach

            </tbody>
            {{ $links->links() }}
        @else
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Link video</th>
                    <th>Link bài</th>
                    <th>Link đăng</th>
              {{--       <th>Link tinyurl</th> --}}
                    <th class="fit">Clicks</th>
                    <th class="fit">Creator</th>
                    <th class="fit">Time</th>
                    {{-- <th class="fit">Thao tác</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($linksAdmin as $link)
                    <tr class="odd listeX">
                        <td>{{ str_limit($link->title, 25) }}</td>
                        <td><a href="{{ $link->video_link }}">{{ str_limit($link->video_link, 25) }}</a></td>
                        <td><a href="{{ $link->real_link }}">{{ str_limit($link->real_link, 25) }}</a></td>
                        <td><a href="{{ $link->full_link }}">{{ str_limit($link->full_link, 25) }}</a></td>
                        {{-- <td><a href="{{ $link->tiny_url_link }}">{{ $link->tiny_url_link }}</a></td> --}}
                        <td class="fit">{{ Redis::get('links.clicks'. $link->link_basic) ?? 0}}</td>
                        <td class="fit">{{ $link->user_name }}</td>
                        <td class="fit">{{ $link->created_at->diffForHumans() }}</td>
                       {{--  <td class="fit">
                            <a class="btn btn-primary" href="{{ url('admin/links/'.$link->id . '/edit') }}"><i class="fa fa-edit"></i> Sửa</a>
                            <form action="{{ url('admin/links/'.$link->id) }}" method="POST">
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
            {{ $linksAdmin->links() }}
        @endif
        </table>

    </div>
@endsection
