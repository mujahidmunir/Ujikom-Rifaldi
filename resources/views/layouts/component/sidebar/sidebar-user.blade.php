<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="{{URL::to('images/logo/user.png')}}" alt="">
                    <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
                        <h6 class="mt-3 f-14 f-w-600">{{Auth::user()->name}}</h6></a>
                </div>
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>General </h6>
                        </div>
                    </li>
                    <li class="dropdown"><a class="nav-link mb-2" href=""><i data-feather="home"></i><span>Dashboard</span></a>

                    </li>
                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="calendar"></i><span>Journey</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="">Create Jurney</a></li>
                            <li><a href="">List Jurney</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link " href=""><i data-feather="list"></i><span>Categorry</span></a>
                    </li>


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
