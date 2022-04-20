<!DOCTYPE html>
{{-- <html lang="zxx"> --}}

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('resources/ogani_resources') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('resources/ogani_resources') }}/css/font-awesome.min.css"
        type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('resources/ogani_resources') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('resources/ogani_resources') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('resources/ogani_resources') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('resources/ogani_resources') }}/css/owl.carousel.min.css"
        type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('resources/ogani_resources') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('resources/ogani_resources') }}/css/style.css" type="text/css">

    @section('unique-css')

    @show

    {{-- ICON BROWSER TAB --}}
    <link rel="SHORTCUT ICON" href="{{ URL::asset('storage') }}/thuong_hieu/phoneshop_icon.ico" type="image/x-icon" />
    <link rel="ICON" href="{{ URL::asset('storage') }}/thuong_hieu/phoneshop_icon.ico" type="image/ico" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ URL::asset('storage') }}/thuong_hieu/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                @if (Cart::count() == 0)
                    <li><i class="fa fa-shopping-bag"></i></li>
                @else
                    <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>{{ Cart::count() }}</span></a></li>
                @endif
            </ul>
            <div class="header__cart__price"><span>{{ Cart::subtotal() }} VND</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                @if (session('locale') == 'en')
                    <img src="{{ URL::asset('resources/ogani_resources') }}/img/en.jpg" alt="" width="25px">
                    <div>{{ __('english') }}</div>
                @else
                    <img src="{{ URL::asset('resources/ogani_resources') }}/img/vi.png" alt="" width="25px">
                    <div>{{ __('vietnamese') }}</div>
                @endif

                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="{!! route('change-language', ['vi']) !!}">{{ __('vietnamese') }}</a></li>
                    <li><a href="{!! route('change-language', ['en']) !!}">{{ __('english') }}</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                @if (session('khach_hang'))
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i> {{ session('khach_hang')->ten_kh }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="{{ url('khach-hang/logout') }}">{{ __('logout') }}</a>
                        </div>
                    </div>
                @else
                    <a href="{{ url('khach-hang/login') }}"><i class="fa fa-user"></i>{{ __('login') }}</a>
                @endif
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li @if ($active_section == 'Home')
                    class="active"
                    @endif><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li @if ($active_section == 'Shop')
                    class="active"
                    @endif><a href="{{ url('san-pham') }}">{{ __('shop') }}</a></li>
                <li @if ($active_section == 'Pages')
                    class="active"
                    @endif><a href="{{ url('cart') }}">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="{{ url('cart') }}">Shoping Cart</a></li>
                    </ul>
                </li>
                <li @if ($active_section == 'News')
                    class="active"
                    @endif><a href="{{ url('tin-tuc') }}">{{ __('blog') }}</a></li>
                <li @if ($active_section == 'Contact')
                    class="active"
                    @endif><a href="{{ url('lien-he') }}">{{ __('contact') }}</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="{{ $cua_hang->facebook_url }}"><i class="fa fa-facebook"></i></a>
            <a href="{{ $cua_hang->twitter_url }}"><i class="fa fa-twitter"></i></a>
            {{-- <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>{{ $cua_hang->email }}</li>
                {{-- <li>Free Shipping for all Order of $99</li> --}}
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header fixed-top" style="background-color: white">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>{{ $cua_hang->email }}</li>
                                {{-- <li>Free Shipping for all Order of $99</li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="{{ $cua_hang->facebook_url }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $cua_hang->twitter_url }}"><i class="fa fa-twitter"></i></a>
                                {{-- <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a> --}}
                            </div>
                            <div class="header__top__right__language">
                                @if (session('locale') == 'en')
                                    <img src="{{ URL::asset('resources/ogani_resources') }}/img/en.jpg" alt=""
                                        width="35px">
                                    <div>{{ __('english') }}</div>
                                @else
                                    <img src="{{ URL::asset('resources/ogani_resources') }}/img/vi.png" alt=""
                                        width="35px">
                                    <div>{{ __('vietnamese') }}</div>
                                @endif
                                {{-- <img src="{{ URL::asset('resources/ogani_resources') }}/img/language.png" alt="">
                                <div>English</div> --}}
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="{!! route('change-language', ['vi']) !!}">{{ __('vietnamese') }}</a></li>
                                    <li><a href="{!! route('change-language', ['en']) !!}">{{ __('english') }}</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                @if (session('khach_hang'))
                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-user"></i> &ensp; {{ session('khach_hang')->ten_kh }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <a class="dropdown-item"
                                                href="{{ url('khach-hang/logout') }}">{{ __('logout') }}</a>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ url('khach-hang/login') }}"><i
                                            class="fa fa-user"></i>{{ __('login') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ URL::asset('storage') }}/thuong_hieu/logo.png"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li @if ($active_section == 'Home')
                                class="active"
                                @endif
                                ><a href="{{ url('') }}"><i class="fa fa-home"></i></a></li>
                            <li @if ($active_section == 'Shop')
                                class="active"
                                @endif
                                ><a href="{{ url('san-pham') }}">{{ __('shop') }}</a></li>
                            <li @if ($active_section == 'Pages')
                                class="active"
                                @endif><a href="{{ url('cart') }}">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="{{ url('cart') }}">Shoping Cart</a></li>
                                </ul>
                            </li>
                            <li @if ($active_section == 'News')
                                class="active"
                                @endif><a href="{{ url('tin-tuc') }}">{{ __('blog') }}</a></li>
                            <li @if ($active_section == 'Contact')
                                class="active"
                                @endif><a href="{{ url('lien-he') }}">{{ __('contact') }}</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                            @if (Cart::count() == 0)
                                <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i></a></li>
                            @else
                                <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i>
                                        <span>{{ Cart::count() }}</span></a></li>
                            @endif
                        </ul>
                        <div class="header__cart__price"><span>{{ Cart::subtotal() }} VND</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <div style="height: 22vh; width: 100%"></div>


    <!-- Header Section End -->
    {{-- ==========================================
    ============================================
    ============================================= --}}


    @yield('content')


    {{-- ==========================================
    ============================================
    ============================================= --}}
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{ URL::asset('storage') }}/thuong_hieu/logo.png"
                                    alt=""></a>
                        </div>
                        <ul>
                            <li>{{ __('address') }}: {{ $cua_hang->dia_chi }}</li>
                            <li>{{ __('phone') }}: {{ $cua_hang->dien_thoai }}</li>
                            <li>Email: {{ $cua_hang->email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>{{ __('all departments') }}</h6>
                        <ul>
                            @foreach ($loai_san_pham as $item)
                                <li>
                                    <a href="{{ url("san-pham/loai-san-pham/$item->ma_loai_san_pham") }}">{{ $item->ten_loai_san_pham }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="{{ $cua_hang->facebook_url }}"><i class="fa fa-facebook"></i></a>
                            {{-- <a href="#"><i class="fa fa-instagram"></i></a> --}}
                            <a href="{{ $cua_hang->twitter_url }}"><i class="fa fa-twitter"></i></a>
                            {{-- <a href="#"><i class="fa fa-pinterest"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img
                                src="{{ URL::asset('resources/ogani_resources') }}/img/payment-item.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ URL::asset('resources/ogani_resources') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ URL::asset('resources') }}/js/popper.js"></script>
    <script src="{{ URL::asset('resources/ogani_resources') }}/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('resources/ogani_resources') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ URL::asset('resources/ogani_resources') }}/js/jquery-ui.min.js"></script>
    <script src="{{ URL::asset('resources/ogani_resources') }}/js/jquery.slicknav.js"></script>
    <script src="{{ URL::asset('resources/ogani_resources') }}/js/mixitup.min.js"></script>
    <script src="{{ URL::asset('resources/ogani_resources') }}/js/owl.carousel.min.js"></script>
    <script src="{{ URL::asset('resources/ogani_resources') }}/js/main.js"></script>

    @section('unique-js')

    @show

</body>

</html>
