@include('Resources.HeaderResources')

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>

                        <li>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="{{ asset('assets/img/user.png') }}" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">{{ session()->get('Authentication_login') }}</div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ Route('logout') }}" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">
                            <span class="logo-name">ALI CORPORATION</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown">
                            <a href="{{ Route('view.loginView') }}" class="nav-link"><i
                                    data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="lock"></i><span>Admin</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ Route('view.admin') }}">Add Admin</a></li>
                                <li><a class="nav-link" href="{{ Route('view.alladmin') }}">All Admin</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="user"></i><span>Customer</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ Route('view.customer') }}">Add Customer</a></li>
                                <li><a class="nav-link" href="{{ Route('view.allcustomer') }}">All Customer</a></li>
                            </ul>
                        </li>


                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="file-text"></i><span>Installments</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ Route('view.todayinstallment') }}">Today Installments</a></li>
                                <li><a class="nav-link" href="{{ Route('view.pendinginstallment') }}">All Pending Installment </a></li>
                            
                                <li><a class="nav-link" href="{{ Route('view.ajaxview') }}">Ajax </a></li>

                            </ul>
                        </li>
                    </ul>


                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- add content here -->

