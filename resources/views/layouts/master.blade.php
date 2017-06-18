@include('layouts.header')

<body>

    <div id="wrapper">

        @include('layouts.nav')

        <div id="page-wrapper">
            <div class="row">
                @yield('content')

@if (session()->has('flash_notification.message'))
    <div id="flash-message" class="alert alert-{{ session('flash_notification.level') }}">
        {!! session('flash_notification.message') !!}
    </div>
@endif
            </div>

        </div>


    </div>

@include('layouts.footer')

</body>

</html>
