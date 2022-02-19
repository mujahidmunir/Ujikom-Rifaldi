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
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

            </div>
            <ul class="navbar-nav attr-nav align-items-center">
                <li><a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                    <div class="search_wrap">
                        <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                        <form>
                            <input type="text" placeholder="Search" class="form-control" id="search_input">
                            <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div><div class="search_overlay"></div>
                </li>
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
