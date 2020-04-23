<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
{{--        <img src="../../dist/img/AdminLTELogo.png"--}}
{{--             alt="AdminLTE Logo"--}}
{{--             class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
        <span class="brand-text font-weight-light text-center" style="font-size: 20px">Laravel Vue Blog System </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @auth
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                    <span style="color: #8a8e93; font-size: 15px">{{Auth::user()->email}}</span>
                @endauth
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <router-link to="/dashboard" class="nav-link">
                        <i class="nav-icon fa fa-tachometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/category" class="nav-link">
                        <i class="nav-icon fas fa-divide"></i>
                        <p>
                            Category
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/post" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Post
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </router-link>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../charts/chartjs.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"
                       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p class="text">Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>