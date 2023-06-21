        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/home" class="brand-link">
                <img src="{{ asset('template/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Invoice</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    {{-- <img class="avatar rounded image" alt="Image placeholder"
                        src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&amp;background=4e73df&amp;color=ffffff&amp;size=100" /> --}}
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/view-quotation"
                                class="nav-link {{ request()->is('view-quotation') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-hand-holding-usd"></i>
                                <p>
                                    Quotations
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/view-bast" class="nav-link {{ request()->is('beritaacara') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    Berita Acara
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('view-spk') }}"
                                class="nav-link {{ request()->is('view-spk') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    SPK
                                </p>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('users*', 'roles*') ? 'menu-is-opening menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('users*', 'roles*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Data Master
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}"
                                        class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}"
                                        class="nav-link  {{ request()->is('roles*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->

            </div>
            <!-- /.sidebar -->
        </aside>
