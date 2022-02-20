<header class="header_wrap fixed-top header_with_topbar dark_skin main_menu_uppercase">

    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.html">
                <img class="logo_light" src="{{asset('menu/assets/images/logo_light.png')}}" alt="logo">
                <img class="logo_dark" src="{{asset('menu/assets/images/logo_dark.png')}}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                <span class="ion-android-menu"></span>
            </button>
            <div class="navbar-collapse justify-content-end collapse show" id="navbarSupportedContent" style="">
                <ul class="navbar-nav">
                    <li class="dropdown">
                        <a href="{{route('logout')}}" class="nav-link fa fa-sign-out" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Log Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
            <ul class="navbar-nav attr-nav align-items-center">
                <li><a class="nav-link cart_trigger" href="javascript:void(0);"><i class="linearicons-cart"></i><span class="cart_count">0</span></a>
                    <div class="cart_box">
                        <div class="cart_header">
                            <h3>Your Cart</h3>
                        </div>
                        <ul class="cart_list">


                        </ul>

                        <div class="cart_footer">
                            <p class="cart_total"><strong>Total:</strong> Rp <span class="price_symbole total">0</span></p>
                            <p class="cart_buttons"><a href="#" class="btn btn-default btn-radius checkout">Checkout</a></p>
                        </div>
                    </div>
                </li>

            </ul>
        </nav>
    </div>
</header>

@push('js')

@endpush
