<div class="inner-wrapper">
    <!-- start: sidebar -->
    <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
            <div class="sidebar-title">
                Navigation
            </div>
            <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <div class="nano">
            <div class="nano-content">
                <nav id="menu" class="nav-main" role="navigation">

                    <ul class="nav nav-main">
                        <li>
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-parent">
                            <a class="nav-link" href="#">
                                <span>Category</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a class="nav-link" href="{{ route('admin.category') }}">
                                        Add Category
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.category.list') }}">
                                        List of Category
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent">
                            <a class="nav-link" href="#">
                                <span>Slider</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a class="nav-link" href="{{ route('admin.slider') }}">
                                        Add slider
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.slider.list') }}">
                                        List of slider
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-parent">
                            <a class="nav-link" href="#">
                                <span>Product</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a class="nav-link" href="{{ route('admin.products') }}">
                                        Add Product
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.products.list') }}">
                                        List of Product
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent">
                            <a class="nav-link" href="#">
                                <span>User Management</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a class="nav-link" href="{{ route('admin.professional') }}">
                                        Add user
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.professional.list') }}">
                                        user list
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.professional.list') }}">
                                        Manage customer
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.professional.list') }}">
                                        Manage seller
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent">
                            <a class="nav-link" href="#">
                                <span>Approval</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a class="nav-link" href="{{ route('admin.projects') }}">
                                        Product - Approval
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.projects') }}">
                                        Seller - Approval
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.projects') }}">
                                        Rating - Approval
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span>Orders</span>
                            </a>
                        </li>
                        <li class="nav-parent">
                            <a class="nav-link" href="#">
                                <span>Sales Report</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a class="nav-link" href="{{ route('admin.projects') }}">
                                        Daily - Report
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.projects') }}">
                                        Monthly - Report
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{ route('admin.projects') }}">
                                        Yearly - Report
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span>Subscription</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <span>Backup</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <script>
                // Maintain Scroll Position
                if (typeof localStorage !== 'undefined') {
                    if (localStorage.getItem('sidebar-left-position') !== null) {
                        var initialPosition = localStorage.getItem('sidebar-left-position'),
                            sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                        sidebarLeft.scrollTop = initialPosition;
                    }
                }
            </script>


        </div>

    </aside>

    @yield('content')

</div>
