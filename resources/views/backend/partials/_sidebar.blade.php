<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://img.icons8.com/?size=60&id=UG5EO81XNkPs&format=png" class="img-circle"
                    alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{ url('/') }}">
                    <i class="fa fa-th" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header">MASTER DATA</li>
            <li>
                <a href="{{ route('cast.index') }}">
                    <i class="fa fa-cubes" aria-hidden="true"></i>
                    <span>Cast</span>
                </a>
            </li>
            <li>
                <a href="{{ route('genre.index') }}">
                    <i class="fa fa-file-movie-o" aria-hidden="true"></i>
                    <span>Genre</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-film" aria-hidden="true"></i>
                    <span>Film</span>
                </a>
            </li>
            <li class="header">PENGATURAN</li>
            <li>
                <a href="#">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li>
                <a href="https://github.com/libertus-libertus/review-film">
                    <i class="fa fa-github" aria-hidden="true"></i>
                    {{-- <i class="fa fa-book"></i>  --}}
                    <span>Github Documentation</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
