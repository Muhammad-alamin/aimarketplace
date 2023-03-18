<!-- start: header -->
<header class="header">
    <div class="logo-container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('front/assets/img/demos/business-consulting/slides/logo.png') }}" width="75" height="35" alt="Porto Admin" />
        					</a>

                            <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>					</div>
    </div>


    <!-- start: search & user box -->
    <div class="header-right">
        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/%21logged-user.jpg" />
                </figure>
                <div class="profile-info" data-lock-name="John Doe" data-lock-email="">
                    <span class="name">{{ auth()->user()->name }}</span>
                    <span class="role">Administrator</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled mb-2">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route('admin.profile') }}"><i class="fas fa-user"></i> My Profile</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route('admin.profile.pic')}}"><i class="fas fa-user"></i> Change Profile Pic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link border-bottom-0" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                         <em class="icon ni ni-signout"></em><span> <i class="fas fa-power-off"></i>Log out</span>
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end: search & user box -->
</header>
<!-- end: header -->
