<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <div class="sidebar-user text-center">
                        <h6 class="mt-3 f-14 f-w-600">{{Auth::user()->name}}</h6>
                </div>
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown"><a class="nav-link mb-2" href="{{url('/')}}"><span>Menu</span></a> </li>
                    <li class="dropdown"><a class="nav-link mb-2" href="{{url('/orders')}}"><span>Orders</span></a> </li>


                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
