<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="ecommerce, market, shop, mart, cart, deal, multipurpose, marketplace">
    <meta name="description" content="Carrot - Multipurpose eCommerce HTML Template.">
    <meta name="author" content="ashishmaraviya">
    <title>{{ $web_title }}</title>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo/newfavicon1.png') }}">

    <!-- Icon CSS -->
    <link rel="stylesheet" href="{{ asset('css/vendor/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/remixicon.css') }}">

    <!-- Vendor -->

    <link rel="stylesheet" href="{{ asset('css/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/range-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery.slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/slick-theme.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>

<body class="body-bg-6">

    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-header">
                        <a href="{{ url('/') }}" class="cr-logo">
                            <img src="{{ asset('img/logo/ecomlogo.png') }}" alt="logo" class="logo" style="height:70px">
                            <img src="{{ asset('img/logo/ecomlogo.png') }}" alt="logo" class="dark-logo">
                        </a>
                        <form class="cr-search" action="{{ route('search.products') }}" method="POST">
                            @csrf
                            @method('POST')

                            <input class="search-input" type="text" placeholder="Search For items..." name="value" value="{{ $search }}">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>All Categories</option>
                                <option value="2">Herbal First Aid</option>
                                <option value="3">Beverages</option>
                                <option value="4">Home Care</option>
                                <option value="5">Skincares</option>
                                <option value="6">Remedies</option>
                                <option value="7">Hair Care</option>
                                <option value="1">Supplements Products</option>
                            </select>
                            <button type="submit" class="search-btn" style="border: 1px solid rgba(18, 172, 100, 0.486)">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>
                        @if (Auth::user())
                        <div class="cr-right-bar">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle cr-right-bar-item" href="{{ route('user.dashboard') }}">
                                        <i class="ri-user-3-line"></i>
                                        <span>{{ Auth::user()->username }}</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile.view') }}">Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('order.page') }}">My Orders</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="{{ route('cart.page') }}" class="cr-right-bar-item" id="cartLink">
                                <i class="ri-shopping-cart-line"></i>
                                <span>Cart</span>
                                <span class="position-absolute start-100 badge bg-danger text-white" id="cartBadge" style="top: 1.1rem; border-radius: 50px; font-size: 14px; display: none;"></span>
                            </a>
                        </div>
                        @else
                        <div class="cr-right-bar">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle cr-right-bar-item" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Account</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/register') }}">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="{{ route('cart.page') }}" class="cr-right-bar-item ">
                                <i class="ri-shopping-cart-line"></i>
                                <span>Cart</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="cr-fix" id="cr-main-menu-desk">
            <div class="container">
                <div class="cr-menu-list">
                    <div class="cr-category-icon-block">
                        <div class="cr-category-men">
                            <div class="cr-category-toggle">

                                {{-- <i class="ri-menu-2-line"></i> --}}
                            </div>
                        </div>
                        {{-- <div class="cr-cat-dropdown">
                            <div class="cr-cat-block">
                                <div class="cr-cat-tab">
                                    <div class="cr-tab-list nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="true">
                                            Dairy &amp; Bakery</button>
                                        <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-profile" type="button" role="tab"
                                            aria-controls="v-pills-profile" aria-selected="false" tabindex="-1">
                                            Fruits &amp; Vegetable</button>
                                        <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-messages" type="button" role="tab"
                                            aria-controls="v-pills-messages" aria-selected="false" tabindex="-1">
                                            Snack &amp; Spice</button>
                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-settings" type="button" role="tab"
                                            aria-controls="v-pills-settings" aria-selected="false" tabindex="-1">
                                            Juice &amp; Drinks </button>
                                        <a class="nav-link" href="#">
                                            View All </a>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Dairy</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="#">Milk</a></li>
                                                        <li><a href="#">Ice cream</a>
                                                        </li>
                                                        <li><a href="#">Cheese</a></li>
                                                        <li><a href="#">Frozen
                                                                custard</a>
                                                        </li>
                                                        <li><a href="#">Frozen
                                                                yogurt</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Bakery</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="#">Cake and
                                                                Pastry</a>
                                                        </li>
                                                        <li><a href="#">Rusk Toast</a>
                                                        </li>
                                                        <li><a href="#">Bread &amp;
                                                                Buns</a>
                                                        </li>
                                                        <li><a href="#">Chocolate
                                                                Brownie</a>
                                                        </li>
                                                        <li><a href="#">Cream Roll</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                            aria-labelledby="v-pills-profile-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Fruits</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="#">Cauliflower</a>
                                                        </li>
                                                        <li><a href="#">Bell
                                                                Peppers</a></li>
                                                        <li><a href="#">Broccoli</a>
                                                        </li>
                                                        <li><a href="#">Cabbage</a>
                                                        </li>
                                                        <li><a href="#">Tomato</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Vegetable</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="#">Cauliflower</a>
                                                        </li>
                                                        <li><a href="#">Bell
                                                                Peppers</a></li>
                                                        <li><a href="#">Broccoli</a>
                                                        </li>
                                                        <li><a href="#">Cabbage</a>
                                                        </li>
                                                        <li><a href="#">Tomato</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                            aria-labelledby="v-pills-messages-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Snacks</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="#">French
                                                                fries</a></li>
                                                        <li><a href="#">potato
                                                                chips</a></li>
                                                        <li><a href="#">Biscuits &amp;
                                                                Cookies</a></li>
                                                        <li><a href="#">Popcorn</a>
                                                        </li>
                                                        <li><a href="#">Rice Cakes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">Spice</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="#">Cinnamon
                                                                Powder</a>
                                                        </li>
                                                        <li><a href="#">Cumin
                                                                Powder</a></li>
                                                        <li><a href="#">Fenugreek
                                                                Powder</a>
                                                        </li>
                                                        <li><a href="#">Pepper
                                                                Powder</a>
                                                        </li>
                                                        <li><a href="#">Long Pepper</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                            aria-labelledby="v-pills-settings-tab">
                                            <div class="tab-list row">
                                                <div class="col">
                                                    <h6 class="cr-col-title">Juice</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="#">Mango Juice</a>
                                                        </li>
                                                        <li><a href="#">Coconut
                                                                Water</a>
                                                        </li>
                                                        <li><a href="#">Tetra Pack</a>
                                                        </li>
                                                        <li><a href="#">Apple
                                                                Juices</a></li>
                                                        <li><a href="#">Lychee
                                                                Juice</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col">
                                                    <h6 class="cr-col-title">soft drink</h6>
                                                    <ul class="cat-list">
                                                        <li><a href="#">Breizh Cola</a>
                                                        </li>
                                                        <li><a href="#">Green Cola</a>
                                                        </li>
                                                        <li><a href="#">Jolt Cola</a>
                                                        </li>
                                                        <li><a href="#">Mecca Cola</a>
                                                        </li>
                                                        <li><a href="#">Topsia Cola</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <style>
                        #navmob {
                            /* background-color: rgba(255, 255, 255, 0.922); */
                            padding: 5px;
                            margin: 17px 0px;
                        }

                    </style>
                    <nav class="navbar navbar-expand-lg">
                        <a href="javascript:void(0)" class="navbar-toggler shadow-none">
                            <i class="ri-menu-3-line"></i>
                        </a>
                        <div class="cr-header-buttons" id="navmob">
                            @if (Auth::user())
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#">
                                        <i class="ri-user-3-line"></i>
                                        {{-- <span>{{ Auth::user()->username }}</span> --}}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('user.dashboard') }}">Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('order.page') }}">My Orders</a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @else
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#">
                                        <i class="ri-user-3-line"></i>
                                        {{-- <span>Account</span> --}}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/register') }}">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @endif

                            @if (Auth::user())
                            <a href="{{ route('cart.page') }}" class="cr-right-bar-item" id="cartLink">
                                <i class="ri-shopping-cart-line"></i>
                                <span id="cartBadge" style="
                                position: absolute;
                                left: 95%;
                                top: 1.2rem;
                                background-color: #dc3545;
                                color: #fff;
                                border-radius: 50%;
                                font-size: 8px;
                                padding: 2px 5px;
                                display: inline-block; display: {{ $cartCount > 0 ? 'inline-block' : 'none' }}">
                                    @if ($cartCount < 10) {{ $cartCount }} @else 9+ @endif </span>
                            </a>
                            {{-- <a href="{{ route('cart.page') }}" class="cr-right-bar-item" id="cartLink">
                                <i class="ri-shopping-cart-line"></i>
                                <span>Cart</span>
                                <span class="position-absolute start-100 badge bg-danger text-white" id="cartBadge" style="top: 1.1rem; border-radius: 50px; font-size: 14px; display: none;"></span>
                            </a> --}}
                            @else
                            <a href="{{ route('login') }}" class="cr-right-bar-item">
                                <i class="ri-shopping-cart-line"></i>
                            </a>
                            @endif
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ url('/products-list') }}">
                                        Our Products
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Herbal
                                                Supplements
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">
                                                Herbal Teas</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Herbal
                                                Extracts</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Essential
                                                Oils</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Herbal Skincare
                                                Products
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Herbal Hair Care
                                                Products
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Herbal Remedies

                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Herbal Beverages
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        Brands
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Himalaya Herbal
                                                Healthcare
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Nature's Way</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Celestial
                                                Seasoningss
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">doTERRA</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Plant
                                                Therapy</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Hyland's</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Guayaki Yerba
                                                Mate</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Mrs. Meyer's
                                                Clean Day</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Badger Balm</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/about-us') }}">
                                        About us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/blog') }}">
                                        Blog
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/contact-us') }}">
                                        Contact us
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                                        More
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/shop') }}">Shop
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/products-list') }}">Product-List</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="cr-calling">
                        <i class="ri-phone-line"></i>
                        <a href="tel:{{ $comp_mob }}">{{ $comp_mob }}</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile menu -->
    <div class="cr-sidebar-overlay"></div>
    <div id="cr_mobile_menu" class="cr-side-cart cr-mobile-menu">
        <div class="cr-menu-title">
            <span class="menu-title">My Menu</span>
            <button type="button" class="cr-close">×</button>
        </div>
        <div class="cr-menu-inner">
            <div class="cr-menu-content">
                <ul>
                    <li class="dropdown drop-list">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Our Products</a>
                        <ul class="sub-menu">
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Himalaya Herbal Healthcare
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Nature's Way</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Celestial Seasoningss
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">doTERRA</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Plant Therapy</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Hyland's</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Guayaki Yerba Mate</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Mrs. Meyer's Clean Day</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Badger Balm</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <span class="menu-toggle"></span>
                        <a href="javascript:void(0)" class="dropdown-list">Brands</a>
                        <ul class="sub-menu">
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Himalaya Herbal Healthcare
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Nature's Way</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Celestial Seasoningss
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">doTERRA</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Plant Therapy</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Hyland's</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Guayaki Yerba Mate</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Mrs. Meyer's Clean Day</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/products-list') }}">Badger Balm</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('/about-us') }}">About us</a>
                    </li>
                    <li>
                        <a href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @yield('content')
    @extends('layouts.js')
    @extends('layouts.footer')
