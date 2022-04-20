@extends('productmaster')

@section('title')
    Trang chủ
@endsection

@section('content')


    {{-- =================================================
                    Slider
    ================================================= --}}
    <section class="container-fluid">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid" src="{{ URL::asset('storage/slider') }}/1634306571NeoQLED.jpg"
                        alt="Third slide">
                </div>
                <div class="carousel-item active">
                    <img class="d-block w-100 img-fluid"
                        src="{{ URL::asset('storage/slider') }}/csm_banner-news_f409088bcc.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 img-fluid"
                        src="{{ URL::asset('storage/slider') }}/anh-dai-dien-iphone-13-result.jpg" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    {{-- =================================================
                    Main Content
    ================================================= --}}
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="wrapper">
                    {{-- ////////////////////////////
                                Left Bar
                    ///////////////////////////////// --}}
                    {{-- Truy vấn tên Category và số lượng : join and group by
                        https://stackoverflow.com/questions/68430004/mysql-category-with-product-count-not-showing-all-results --}}
                    <div class="d-md-flex align-items-md-center">
                        <div class="h3">Sản phẩm</div>
                        <div class="ml-auto d-flex align-items-center views"> <span class="btn text-success"> <span
                                    class="fas fa-th px-md-2 px-1"></span><span>Grid view</span> </span> <span
                                class="btn">
                                <span class="fas fa-list-ul"></span><span class="px-md-2 px-1">List view</span>
                            </span> <span class="green-label px-md-2 px-1">428</span> <span
                                class="text-muted">Products</span> </div>
                    </div>
                    <div class="d-lg-flex align-items-lg-center pt-2">
                        <div class="form-inline d-flex align-items-center my-2 mr-lg-2 radio bg-light border"> <label
                                class="options">Most Popular <input type="radio" name="radio"> <span
                                    class="checkmark"></span> </label> <label class="options">Cheapest
                                <input type="radio" name="radio" checked> <span class="checkmark"></span> </label>
                        </div>
                        <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2"> <label
                                class="tick">Farm <input type="checkbox" checked="checked"> <span
                                    class="check"></span> </label> <span class="text-success px-2 count">
                                328</span> </div>
                        <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2"> <label
                                class="tick">Bio <input type="checkbox"> <span class="check"></span>
                            </label>
                            <span class="text-success px-2 count"> 72</span>
                        </div>
                        <div class="form-inline d-flex align-items-center my-2 checkbox bg-light border mx-lg-2"> <label
                                class="tick">Czech republic <input type="checkbox"> <span
                                    class="check"></span>
                            </label> <span class="border px-1 mx-2 mr-3 font-weight-bold count"> 12</span> <select
                                name="country" id="country" class="bg-light">
                                <option value="" hidden>Country</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="Uk">UK</option>
                            </select> </div>
                    </div>
                    <div class="d-sm-flex align-items-sm-center pt-2 clear">
                        <div class="text-muted filter-label">Applied Filters:</div>
                        <div class="green-label font-weight-bold p-0 px-1 mx-sm-1 mx-0 my-sm-0 my-2">Selected Filtre
                            <span class=" px-1 close">&times;</span>
                        </div>
                        <div class="green-label font-weight-bold p-0 px-1 mx-sm-1 mx-0">Selected Filtre <span
                                class=" px-1 close">&times;</span> </div>
                    </div>
                    <div class="filters"> <button class="btn btn-success" type="button" data-toggle="collapse"
                            data-target="#mobile-filter" aria-expanded="true" aria-controls="mobile-filter">Filter<span
                                class="px-1 fas fa-filter"></span></button> </div>
                    {{-- ////////////////////////////
                                Phần Di Động 
                        //////////////////////////// --}}
                    <div id="mobile-filter">
                        <div class="py-3">
                            <h5 class="font-weight-bold">Phân loại</h5>
                            <ul class="list-group">
                                <li
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                    Điện thoại di động
                                    <span class="badge badge-primary badge-pill">328</span>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                    Tablet
                                    <span class="badge badge-primary badge-pill">112</span>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                    Điện thoại Android
                                    <span class="badge badge-primary badge-pill">32</span>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                    iPad
                                    <span class="badge badge-primary badge-pill">48</span>
                                </li>
                                <li
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                    Điện thoại cũ
                                    <span class="badge badge-primary badge-pill">16</span>
                                </li>
                            </ul>
                        </div>
                        <div class="py-3">
                            <h5 class="font-weight-bold">Brands</h5>
                            <form class="brand">
                                <div class="form-inline d-flex align-items-center py-1"> <label
                                        class="tick">Samsung
                                        <input type="checkbox"> <span class="check"></span> </label> </div>
                                <div class="form-inline d-flex align-items-center py-1"> <label class="tick">Apple
                                        <input type="checkbox" checked> <span class="check"></span> </label>
                                </div>
                                <div class="form-inline d-flex align-items-center py-1"> <label
                                        class="tick">Motorola
                                        <input type="checkbox" checked> <span class="check"></span> </label>
                                </div>
                                <div class="form-inline d-flex align-items-center py-1"> <label class="tick">
                                        Nokia <input type="checkbox"> <span class="check"></span> </label>
                                </div>
                                <div class="form-inline d-flex align-items-center py-1"> <label
                                        class="tick">Xiaomi
                                        <input type="checkbox"> <span class="check"></span> </label> </div>
                            </form>
                        </div>
                        <div class="py-3">
                            <h5 class="font-weight-bold">Rating</h5>
                            <form class="rating">
                                <div class="form-inline d-flex align-items-center py-2"> <label class="tick"><span
                                            class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="form-inline d-flex align-items-center py-2"> <label class="tick">
                                        <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="form-inline d-flex align-items-center py-2"> <label
                                        class="tick"><span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="form-inline d-flex align-items-center py-2"> <label
                                        class="tick"><span class="fas fa-star"></span> <span
                                            class="fas fa-star"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                                <div class="form-inline d-flex align-items-center py-2"> <label class="tick">
                                        <span class="fas fa-star"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <span
                                            class="far fa-star px-1 text-muted"></span> <input type="checkbox"> <span
                                            class="check"></span> </label> </div>
                            </form>
                        </div>
                    </div>

                    <div class="content py-md-0 py-3">

                        {{-- ////////////////////////////
                                Phần Desktop
                        //////////////////////////// --}}
                        <section id="sidebar">

                            <div class="py-3">
                                <h5 class="font-weight-bold">Phân loại</h5>
                                <ul class="list-group">
                                    <li
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                        Điện thoại di động
                                        <span class="badge badge-primary badge-pill">328</span>
                                    </li>
                                    <li
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                        Tablet
                                        <span class="badge badge-primary badge-pill">112</span>
                                    </li>
                                    <li
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                        Điện thoại Android
                                        <span class="badge badge-primary badge-pill">32</span>
                                    </li>
                                    <li
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                        iPad
                                        <span class="badge badge-primary badge-pill">48</span>
                                    </li>
                                    <li
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center category">
                                        Điện thoại cũ
                                        <span class="badge badge-primary badge-pill">16</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="py-3">
                                <h5 class="font-weight-bold">Brands</h5>
                                <form class="brand">
                                    <div class="form-inline d-flex align-items-center py-1">
                                        <label class="tick">Samsung
                                            <input type="checkbox">
                                            <span class="check"></span>
                                        </label>
                                    </div>
                                    <div class="form-inline d-flex align-items-center py-1">
                                        <label class="tick">Apple <input type="checkbox" checked> <span
                                                class="check"></span> </label>
                                    </div>
                                    <div class="form-inline d-flex align-items-center py-1">
                                        <label class="tick">Motorola <input type="checkbox" checked> <span
                                                class="check"></span> </label>
                                    </div>
                                    <div class="form-inline d-flex align-items-center py-1"> <label
                                            class="tick">
                                            Nokia <input type="checkbox"> <span class="check"></span> </label>
                                    </div>
                                    <div class="form-inline d-flex align-items-center py-1"> <label
                                            class="tick">
                                            Xiaomi <input type="checkbox"> <span class="check"></span>
                                        </label>
                                    </div>
                                </form>
                            </div>
                            <div class="py-3">
                                <h5 class="font-weight-bold">Rating</h5>
                                <form class="rating">
                                    <div class="form-inline d-flex align-items-center py-2"> <label
                                            class="tick"><span class="fas fa-star"></span> <span
                                                class="fas fa-star"></span> <span class="fas fa-star"></span>
                                            <span class="fas fa-star"></span> <span class="fas fa-star"></span>
                                            <input type="checkbox"> <span class="check"></span> </label>
                                    </div>
                                    <div class="form-inline d-flex align-items-center py-2"> <label
                                            class="tick"> <span class="fas fa-star"></span> <span
                                                class="fas fa-star"></span> <span class="fas fa-star"></span>
                                            <span class="fas fa-star"></span> <span
                                                class="far fa-star px-1 text-muted"></span> <input type="checkbox">
                                            <span class="check"></span> </label> </div>
                                    <div class="form-inline d-flex align-items-center py-2"> <label
                                            class="tick"><span class="fas fa-star"></span> <span
                                                class="fas fa-star"></span> <span class="fas fa-star"></span>
                                            <span class="far fa-star px-1 text-muted"></span>
                                            <span class="far fa-star px-1 text-muted"></span> <input type="checkbox">
                                            <span class="check"></span> </label> </div>
                                    <div class="form-inline d-flex align-items-center py-2"> <label
                                            class="tick"><span class="fas fa-star"></span> <span
                                                class="fas fa-star"></span> <span
                                                class="far fa-star px-1 text-muted"></span> <span
                                                class="far fa-star px-1 text-muted"></span> <span
                                                class="far fa-star px-1 text-muted"></span> <input type="checkbox">
                                            <span class="check"></span> </label> </div>
                                    <div class="form-inline d-flex align-items-center py-2"> <label
                                            class="tick"> <span class="fas fa-star"></span> <span
                                                class="far fa-star px-1 text-muted"></span>
                                            <span class="far fa-star px-1 text-muted"></span> <span
                                                class="far fa-star px-1 text-muted"></span> <span
                                                class="far fa-star px-1 text-muted"></span> <input type="checkbox">
                                            <span class="check"></span> </label> </div>
                                </form>
                            </div>
                        </section>

                        {{-- ////////////////////////////
                                Production Section
                        //////////////////////////// --}}
                        <section id="products">
                            <div class="container py-3">
                                <form action="{{url('san-pham/them-gio-hang')}}" method="post">
                                    @csrf
                                    <div class="row">

                                        @foreach ($dssp as $sp)
                                            <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1">
                                                <div class="card p-1">
                                                    <a
                                                        href="{{ url('/san-pham') }}/chi-tiet-san-pham/{{ $sp->ten_url }}">
                                                        <img class="card-img-top"
                                                            src="{{ URL::asset('storage/san_pham') }}/{{ $sp->hinh1 }}">
                                                    </a>

                                                    <div class="card-body">
                                                        <a
                                                            href="{{ url('/san-pham') }}/chi-tiet-san-pham/{{ $sp->ten_url }}">
                                                            <h6 class="font-weight-bold pt-1">{{ $sp->ten_san_pham }}
                                                        </a>
                                                        </h6>
                                                        {{-- <div class="text-muted description">Space for small product
                                                        description
                                                    </div> --}}
                                                        <div class="d-flex align-items-center product"> <span
                                                                class="fas fa-star"></span> <span
                                                                class="fas fa-star"></span> <span
                                                                class="fas fa-star"></span> <span
                                                                class="fas fa-star"></span> <span
                                                                class="far fa-star"></span> </div>
                                                        <div
                                                            class="d-flex align-items-center justify-content-between pt-3">
                                                            <div class="d-flex flex-column">
                                                                <div class="h6 font-weight-bold">
                                                                    {{ number_format($sp->don_gia) }} VND</div>
                                                                {{-- <div class="text-muted rebate">48.56</div> --}}
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <input type="number" class="form-control"
                                                                        name="quantity-{{ $sp->ma_san_pham }}"
                                                                        id="quantity-{{ $sp->ma_san_pham }}"
                                                                         value="1"
                                                                        aria-describedby="helpId" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <button type="submit" name="addCart" value="{{ $sp->ma_san_pham }}"
                                                                    data-id="{{ $sp->ma_san_pham }}" class="btn btn-primary addCart">Buy
                                                                    now</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        {{-- <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-md-0 pt-4">
                                        <div class="card"> <img class="card-img-top"
                                                src="{{ URL::asset('storage/san_pham') }}/2.png">
                                            <div class="card-body">
                                                <h6 class="font-weight-bold pt-1">Product title</h6>
                                                <div class="text-muted description">Space for small product description
                                                </div>
                                                <div class="d-flex align-items-center product"> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="far fa-star"></span> </div>
                                                <div class="d-flex align-items-center justify-content-between pt-3">
                                                    <div class="d-flex flex-column">
                                                        <div class="h6 font-weight-bold">36.99 USD</div>
                                                        <div class="text-muted rebate">48.56</div>
                                                    </div>
                                                    <div class="btn btn-primary">Buy now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-0 pt-4">
                                        <div class="card"> <img class="card-img-top"
                                                src="{{ URL::asset('storage/san_pham') }}/3.jpg">
                                            <div class="card-body">
                                                <h6 class="font-weight-bold pt-1">Product title</h6>
                                                <div class="text-muted description">Space for small product description
                                                </div>
                                                <div class="d-flex align-items-center product"> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="far fa-star"></span> </div>
                                                <div class="d-flex align-items-center justify-content-between pt-3">
                                                    <div class="d-flex flex-column">
                                                        <div class="h6 font-weight-bold">36.99 USD</div>
                                                        <div class="text-muted rebate">48.56</div>
                                                    </div>
                                                    <div class="btn btn-primary">Buy now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-4 pt-4">
                                        <div class="card"> <img class="card-img-top"
                                                src="{{ URL::asset('storage/san_pham') }}/4.jpg">
                                            <div class="card-body">
                                                <h6 class="font-weight-bold pt-1">Product title</h6>
                                                <div class="text-muted description">Space for small product description
                                                </div>
                                                <div class="d-flex align-items-center product"> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="far fa-star"></span> </div>
                                                <div class="d-flex align-items-center justify-content-between pt-3">
                                                    <div class="d-flex flex-column">
                                                        <div class="h6 font-weight-bold">36.99 USD</div>
                                                        <div class="text-muted rebate">48.56</div>
                                                    </div>
                                                    <div class="btn btn-primary">Buy now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-4 pt-4">
                                        <div class="card"> <img class="card-img-top"
                                                src="{{ URL::asset('storage/san_pham') }}/1.jpeg">
                                            <div class="card-body">
                                                <h6 class="font-weight-bold pt-1">Product title</h6>
                                                <div class="text-muted description">Space for small product description
                                                </div>
                                                <div class="d-flex align-items-center product"> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="far fa-star"></span> </div>
                                                <div class="d-flex align-items-center justify-content-between pt-3">
                                                    <div class="d-flex flex-column">
                                                        <div class="h6 font-weight-bold">36.99 USD</div>
                                                        <div class="text-muted rebate">48.56</div>
                                                    </div>
                                                    <div class="btn btn-primary">Buy now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-lg-4 pt-4">
                                        <div class="card"> <img class="card-img-top"
                                                src="{{ URL::asset('storage/san_pham') }}/2.png">
                                            <div class="card-body">
                                                <h6 class="font-weight-bold pt-1">Product title</h6>
                                                <div class="text-muted description">Space for small product description
                                                </div>
                                                <div class="d-flex align-items-center product"> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="fas fa-star"></span> <span
                                                        class="far fa-star"></span> </div>
                                                <div class="d-flex align-items-center justify-content-between pt-3">
                                                    <div class="d-flex flex-column">
                                                        <div class="h6 font-weight-bold">36.99 USD</div>
                                                        <div class="text-muted rebate">48.56</div>
                                                    </div>
                                                    <div class="btn btn-primary">Buy now</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('unique-js')
    <script src="{{ URL::asset('resources') }}/js/cart.js"></script>
@endsection
