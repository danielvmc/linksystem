@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Thông tin khách truy cập</h1>
    </div>

    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>IP</th>
                    <th>User Agent</th>
                    <th>Country</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr class="odd gradeX">
                        <td>{{ $client->ip }}</td>
                        <td>{{ $client->user_agent }}</td>
                        <td>{{ $client->country }}</td>
                        <td>{{ $client->created_at->diffForHumans() }}</td>
                        <td>{{ $client->status }}</td>
                    </tr>
                @endforeach
            </tbody>
    </table>
    </div>
    {{ $clients->links() }}
@endsection
