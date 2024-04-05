
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
    <link rel="icon" href="{{ asset('adm/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('adm/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('adm/css/plugins/style.css') }}">
</head>

<body class="">
    <nav class="pcoded-navbar menupos-fixed menu-light ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Menu</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('adm.company.detail.page') }}"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Company Details</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Product Details</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('adm.add.category.page') }}">Add Category</a></li>
                            <li><a href="{{ route('adm.all.category.page') }}">All Category</a></li>
                            <li><a href="{{ route('adm.all.brands.page') }}">All Brands</a></li>
                            <li><a href="{{ route('adm.add.product.page') }}">Add Product</a></li>
                            <li><a href="{{ route('adm.all.products.page') }}">All Product</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('adm.all.order.page') }}"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Recent Orders</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('adm.datewise.order.page') }}"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Datewise Orders</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Homepage Banners</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('adm.main.banner') }}">Main Banner</a></li>
                            <li><a href="{{ route('adm.middle.banner') }}">Middle Banner</a></li>
                            <li><a href="{{ route('adm.last.banner') }}">Last Banner</a></li>
                        </ul>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Homepage Sections</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('adm.home.section.page') }}">Add Home Section</a></li>
                            <li><a href="{{ route('adm.assign.section.page') }}">Assign Products to section</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('adm.rating.page') }}"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Product Ratings</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('adm.offer.page') }}"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Create Offers</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('adm.all.user') }}"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">All Users</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('adm.blog.page') }}"><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">All Blog</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('adm.logout') }}"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Logout</span></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <header class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#"><span></span></a>
            <a href="#" class="b-brand">
                <h6 style="color: #fff;">Admin</h6>
                <!-- <img src="slogo.png" style="width: 150px;" class="logo">
                <img src="slogo_icon.png" alt="" class="logo-thumb"> -->
            </a>
            <a href="#" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="#" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search here">
                        <button type="button" class="btn-close" aria-label="Close">
                        </button>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('adm/images/user/avatar-4.jpg') }}" class="img-radius wid-40" alt="User-Profile-Image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-notification">
                            <div class="pro-head">
                                <img src="{{ asset('adm/images/user/avatar-4.jpg') }}" class="img-radius" alt="User-Profile-Image">
                                <span>Super  Admin </span>
                                <a href="{{ route('adm.logout') }}" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="#" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                                <li><a href="#" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
                                <li><a href="{{ route('adm.logout') }}" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>


    <section class="header-user-list">
        <a href="#" class="h-close-text"><i class="feather icon-x"></i></a>
        <ul class="nav nav-tabs" id="chatTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active text-uppercase border-0" id="chat-tab" data-bs-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true"><i class="feather icon-message-circle me-2"></i>Chat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase border-0" id="user-tab" data-bs-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false"><i class="feather icon-users me-2"></i>User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase border-0" id="setting-tab" data-bs-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false"><i class="feather icon-settings me-2"></i>Setting</a>
            </li>
        </ul>
        <div class="tab-content" id="chatTabContent">
            <div class="tab-pane fade show active" id="chat" role="tabpanel" aria-labelledby="chat-tab">
                <div class="h-list-header">
                    <div class="input-group">
                        <input type="text" id="search-friends" class="form-control" placeholder="Search Friend . . .">
                    </div>
                </div>
            </div>
        </div>
    </section>
