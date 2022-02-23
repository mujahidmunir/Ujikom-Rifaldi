<div class="page-main-header">
    <div class="main-header-right row m-0 ">
        <div class="main-header-left" >
            <div class="logo-wrapper"><a href="{{URL::to('user/dashboard')}}"><img
                        src="{{URL::to('images/logo/coffe-logo.png')}}" style="width:75%;" alt=""></a>
            </div>
            <div class="dark-logo-wrapper"><a href="{{URL::to('user/dashboard')}}">
                    <img class="img-fluid" src="{{URL::to('images/logo/coffe-logo.png')}}" style="width:75%;" alt=""></a>
            </div>
        </div>
        <div class="left-menu-header col ">

        </div>
        <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="onhover-dropdown p-0">

                </li>
                <li>
                    <div>
                        <h6>@if(Auth::guest()) @else {{Auth::user()->name}} @endif</h6>
                    </div>
                </li>
                <li class="onhover-dropdown">

                    <button class="btn btn-primary-light float-end mb-2" type="button">
                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>Log out
                        </a>
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
        <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
    </div>
</div>
