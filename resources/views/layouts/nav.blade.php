
<!-- Navigation -->
<blockquote>
    {{ $quote->sentence }}
</blockquote>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ auth()->user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="/"><i class="fa fa-edit fa-fw"></i> Tạo Link Spam</a>
                        </li>
                        <li>
                            <a href="/link-ad"><i class="fa fa-youtube fa-fw"></i> Tạo Link Ad</a>
                        </li>
                        <li>
                            <a href="/links"><i class="fa fa-list fa-fw"></i> Danh sách link</a>
                        </li>

                        <li>
                            <a href="/linksad"><i class="fa fa-list-ul fa-fw"></i> Danh sách link Ad</a>
                        </li>

                        <li>
                            <a href="/reports"><i class="fa fa-flag fa-fw"></i> Báo cáo link xấu</a>
                        </li>

                        <li>
                            <a href="/setting"><i class="fa fa-key fa-fw"></i> Đổi mật khẩu</a>
                        </li>

                        @if(auth()->user()->isAdmin())
                            @include('layouts.admin-nav')
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
