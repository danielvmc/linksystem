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
                    <th>Time</th>
                    <th>Url</th>
                    <th>Status</th>
                    {{-- <th>Country</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr class="odd gradeX">
                        <td><a href="http://whatismyipaddress.com/ip/{{ $client->ip }}">{{ $client->ip }}</a></td>
                        <td>{{ $client->user_agent }}</td>
                        <td>{{ $client->created_at->diffForHumans() }}</td>
                        <td>{{ $client->url }}</td>
                        <td>{{ $client->status }}</td>
                        {{-- <td>{{ $client->country }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
    </table>
    </div>
    {{ $clients->links() }}
@endsection
