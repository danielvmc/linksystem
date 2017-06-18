@extends('layouts.master')

@section('content')
    <div class="col-lg-12">
        <h1 class="page-header">Get token</h1>
    </div>

    <div class="panel-body">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="text" class="form-control" name="password" id="password">
        </div>

        <div class="form-group">
            <label for="real-link">Loai token:</label>
            <select class="form-control">
                <option class="form-control">Android</option>
                <option class="form-control">iOS</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" onclick="getTokens()">Get token</button>
        </div>
    </div>
@endsection

<script>
    function signCreator(data) {
        var sig = "";
    }
    function getTokens() {
        var email = $('#email').val();
        var password = $('#password').val();

        $.ajax({
           url: 'https://api.facebook.com/restserver.php',
           type: 'POST',
           dataType: 'json',
           data: {
                api_key: "3e7c78e35a76a9299309885393b02d97",
                credentials_type: "password",
                email: email,
                format: "JSON",
                generate_machine_id: "1",
                generate_session_cookies: "1",
                locale: "en_US",
                method: "auth.login",
                password: password,
                return_ssl_resources: "0",
                v: "1.0",
                sig: "552e74aaeb50f0561b5074ebb0edf352"
           }
        }).done(function (data) {
            console.log(data);
        });
    }
</script>
