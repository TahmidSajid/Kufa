<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ asset('dashboard-assets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard-assets') }}/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('dashboard-assets') }}/plugins/pace/pace.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Theme Styles -->
    <link href="{{ asset('dashboard-assets') }}/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('dashboard-assets') }}/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dashboard-assets') }}/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard-assets') }}/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        @if (auth()->user()->profile_image)
                            <img src="{{ asset('uploads/profile_photos') }}/{{ auth()->user()->profile_image }}">
                        @else
                            <img src="{{ asset('dashboard-assets') }}/images/avatars/avatar.png">
                        @endif
                        <span class="activity-indicator"></span>
                        <span class="user-info-text">{{ auth()->user()->name }}<br><span
                                class="user-state-info">active</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li>
                        <a href="{{ route('home') }}"><i class="material-icons-two-tone">manage_accounts</i>Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="material-icons-two-tone">post_add</i><i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i>Banners</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('banner.index') }}">View Banners</a>
                                <a href="{{ route('banner.create') }}">Add Banner</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('about_me') }}"><i class="material-icons-two-tone">person</i>About me</a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}"><i
                                class="material-icons-two-tone">settings</i>Services</a>
                    </li>
                    <li>
                        <a href=""><i class="material-icons-two-tone">folder_special</i><i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i>Portfolio</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('portfolio.create') }}">Add Portfolio</a>
                                <a href="{{ route('portfolio.index') }}">View Portfolio</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('fact.index') }}"><i class="material-icons-two-tone">numbers</i>Facts</a>
                    </li>
                    <li>
                        <a href=""><i class="material-icons-two-tone">comment</i><i
                                class="material-icons has-sub-menu">keyboard_arrow_right</i>Testimonial</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('testimonial.index') }}">View Testimonial</a>
                                <a href="{{ route('testimonial.create') }}">Add Testimonial</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('brand.index') }}"><i
                                class="material-icons-two-tone">branding_watermark</i>Brands</a>
                    </li>
                    <li>
                        <a href="{{ route('email.index') }}"><i class="material-icons-two-tone">mail</i>Contact
                            Mails</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i
                                            class="material-icons">first_page</i></a>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown"
                                        data-bs-toggle="dropdown"><i class="fa-solid fa-right-from-bracket" style="font-size: 25px"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end language-dropdown"
                                        aria-labelledby="languageDropDown">
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item" type="submit">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>
    <!-- Javascripts -->
    <script src="{{ asset('dashboard-assets') }}/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/js/main.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/js/custom.js" type="module"></script>
    <script src="{{ asset('dashboard-assets') }}/js/pages/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('alertSweet')
    @yield('alertlogin')
</body>

</html>
