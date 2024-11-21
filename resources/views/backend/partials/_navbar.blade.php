<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>L</b>S</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>LIN</b>Station</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            @auth
            <ul class="nav navbar-nav">
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            @endauth

            @guest
            <ul class="nav navbar-nav">
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="{{ route('login') }}">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        Masuk
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        Daftar
                    </a>
                </li>
            </ul>
            @endguest
        </div>

    </nav>
</header>
