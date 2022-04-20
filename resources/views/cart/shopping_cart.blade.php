@extends('oganimaster')

<?php $active_section = 'Pages'; ?>

@section('title')
    Shopping Cart
@endsection

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>{{ __('all departments') }}</span>
                        </div>
                        <ul>
                            @foreach ($loai_san_pham as $item)
                                <li><a href="#">{{ $item->ten_loai_san_pham }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ url('san-pham/tim-san-pham') }}" method="POST">
                                @csrf
                                <div class="hero__search__categories">{{ __('all categories') }}
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" name="find_product" placeholder="{{ __('what do you need?') }}">
                                <button type="submit" class="site-btn">{{ __('search') }}</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{ $cua_hang->dien_thoai }}</h5>
                                <span>{{ __('support 24/7 time') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ URL::asset('storage') }}/banner/breadcrumb.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ __('shopping cart') }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>{{ __('shopping cart') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    @if (session('shopping_cart_alert'))
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="alert alert-primary">
                            {{ session('shopping_cart_alert') }}
                        </div>
                        <a href="{{ url('khach-hang/login') }}"
                            class="badge badge-primary p-3 h3">{{ __('login') }}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (Cart::count() == 0)
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="alert alert-danger">
                            {{ __('cart is empty') }}
                        </div>
                        <a href="{{ url('san-pham') }}"
                            class="badge badge-primary p-3 h3">{{ __('continue shopping') }}</a>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product">{{__('products')}}</th>
                                        <th>{{__('price')}}</th>
                                        <th>{{__('quantity')}}</th>
                                        <th>{{__('total')}}</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $item)
                                        <tr>
                                            <td class="shoping__cart__item">

                                                <img src="{{ URL::asset('storage') }}/san_pham/{{ $item->options->hinh1 }}"
                                                    alt="" width="70vw">
                                                <h5>{{ $item->name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ number_format($item->price) }}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $item->qty }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{ number_format($item->price * $item->qty) }}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a href="{{ url("cart/delete-item/$item->rowId") }}"
                                                    class="badge badge-danger p-2">
                                                    <i class="fa fa-trash-o font-weight-bold"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{ url('san-pham') }}" class="primary-btn cart-btn">{{__('continue shopping')}}</a>
                            <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                {{__('upadate cart')}}</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>{{__('cart total')}}</h5>
                            <ul>
                                <li>{{__('total')}} <span>{{ Cart::subtotal() }}</span></li>
                            </ul>

                            <a href="{{ url('cart/dat-hang') }}" class="primary-btn">{{__('proceed to checkout')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Shoping Cart Section End -->
@endsection
