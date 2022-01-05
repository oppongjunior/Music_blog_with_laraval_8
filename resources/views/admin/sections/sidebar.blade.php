<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ url("/dashboard") }}">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">Site Dashboard</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse show" id="dashboard" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ url('/dashboard') }}">
                                    <span class="nav-text">Home</span>
                                </a>
                            </li>
                            <li class="active">
                                <a class="sidenav-item-link" href="{{ url('/user/all') }}">
                                    <span class="nav-text">Users</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ route('all.songs') }}">
                                    <span class="nav-text">Songs</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ route('all.blogs') }}">
                                    <span class="nav-text">Blog</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ route('all.genre') }}">
                                    <span class="nav-text">Genre</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ route('all.artist') }}">
                                    <span class="nav-text">Artist</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="{{ route('all.advert') }}">
                                    <span class="nav-text">Advert</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>


                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts" aria-expanded="false" aria-controls="charts">
                        <i class="mdi mdi-chart-pie"></i>
                        <span class="nav-text">Contact Messages</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="charts" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="{{ route('contact.messages') }}">
                                    <span class="nav-text">Messages</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
        <hr class="separator" />
    </div>
</aside>
