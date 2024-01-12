@extends('frontend.main_master')

@section('content')

@section('title')
LARGURDA E-Commerce
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <!-- === ========= SECTION – HERO ==== ======= -->
                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($sliders as $slider)
                        <a href="{{ route('shop.page') }}">
                            <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
                                @if ($slider->title == NULL)

                                @else
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="big-text">{{ $slider->title }} </div>
                                        <div class="excerpt hidden-xs"> <span>{{ $slider->description }}</span>
                                        </div>
                                        <div class="button-holder"> <button href="{{ route('shop.page') }}"
                                                class="btn-lg btn btn-uppercase btn-primary shop-now-button">Belanja
                                                Sekarang</button>
                                        </div>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->

                                @endif
                            </div>
                        </a>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.owl-carousel -->
                </div>
                <!-- ==== ===== SECTION – HERO : END === ============== -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6 col-sm-3 col-lg-3">
                            <div class="info-boxes-inner">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-truck" style="color: #FEF266; font-size: 30px"
                                                aria-hidden="true"></i>
                                            <h4 class="info-box-heading green">Pengiriman Cepat</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Kurir pengiriman yang handal</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-lg-3">
                            <div class="info-boxes-inner">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-check" style="color: #FEF266; font-size: 30px"
                                                aria-hidden="true"></i>
                                            <h4 class="info-box-heading green">Kualitas Terjamin</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">3 Bulan garansi produk</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-lg-3">
                            <div class="info-boxes-inner">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-money" style="color: #FEF266; font-size: 30px"
                                                aria-hidden="true"></i>
                                            <h4 class="info-box-heading green">Pembayaran Mudah</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Bisa Cash On Delivery</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3 col-lg-3">
                            <div class="info-boxes-inner">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-user" style="color: #FEF266; font-size: 30px"
                                                aria-hidden="true"></i>
                                            <h4 class="info-box-heading green">Admin Bersahabat</h4>
                                        </div>
                                    </div>
                                    <h6 class="text">Admin yang ramah dan edukatif</h6>
                                </div>
                            </div>
                        </div>
                        <!-- .col -->

                    </div>
                    <!-- /.row -->
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->


                <!-- = ===== SCROLL TABS =============== ========== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">PRODUK KAMI</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all"
                                    data-toggle="tab">Semua</a>
                            </li>
                            @foreach($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{ $category->id }}"
                                    data-toggle="tab">{{ $category->category_name }}</a></li>
                            @endforeach
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">

                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                    </div>
                                                    <!-- /.image -->
                                                    @php
                                                    $amount = $product->product_price - $product->product_discount;
                                                    $discount = ($amount/$product->product_price) * 100;
                                                    @endphp

                                                    <div>
                                                        @if ($product->product_discount == NULL)
                                                        @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                            {{ $product->product_name }}
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if ($product->product_discount == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_price, 0, '', '.') }}
                                                        </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_discount, 0, '', '.') }}
                                                        </span> <span
                                                            class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                                    </div>
                                                    @endif
                                                    <!-- /.product-price -->
                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Kerajang" data-toggle="modal"
                                                                    data-target="#exampleModal" id="{{ $product->id }}"
                                                                    onclick="productView(this.id)"> <i
                                                                        class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Keranjang</button>
                                                            </li>
                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Wishlist" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)"> <i
                                                                    class="fa fa-heart"></i> </button>
                                                            <li class="lnk"> <a data-toggle="tooltip"
                                                                    class="add-to-cart"
                                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"
                                                                    title="Detail Produk"> <i class="fa fa-signal"
                                                                        aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    @endforeach
                                    <!--  // end all optionproduct foreach  -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->

                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @php
                                    $catwiseProduct =
                                    App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp

                                    @forelse($catwiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <img src="{{ asset($product->product_thambnail) }}" alt="">
                                                    </div>
                                                    <!-- /.image -->

                                                    @php
                                                    $amount = $product->product_price - $product->product_discount;
                                                    $discount = ($amount/$product->product_price) * 100;
                                                    @endphp

                                                    <div>
                                                        @if ($product->product_discount == NULL)
                                                        <div class="tag new"><span>baru</span></div>
                                                        @else
                                                        <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a
                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                            {{ $product->product_name }}
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>

                                                    @if ($product->product_discount == NULL)
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_price, 0, '', '.') }}
                                                        </span> </div>
                                                    @else
                                                    <div class="product-price"> <span class="price">
                                                            Rp{{ number_format($product->product_discount, 0, '', '.') }}
                                                        </span> <span
                                                            class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                                    </div>
                                                    @endif
                                                    <!-- /.product-price -->
                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Kerajang" data-toggle="modal"
                                                                    data-target="#exampleModal" id="{{ $product->id }}"
                                                                    onclick="productView(this.id)"> <i
                                                                        class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Keranjang</button>
                                                            </li>
                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Wishlist" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)"> <i
                                                                    class="fa fa-heart"></i> </button>
                                                            <li class="lnk"> <a data-toggle="tooltip"
                                                                    class="add-to-cart"
                                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"
                                                                    title="Detail Produk"> <i class="fa fa-signal"
                                                                        aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->

                                    @empty
                                    <h5 class="text-danger">Produk Tidak Ditemukan</h5>

                                    @endforelse
                                    <!--  // end all optionproduct foreach  -->




                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @endforeach
                        <!-- end categor foreach -->

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- ============================================== SCROLL TABS : END ============================================== -->

                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                {{-- <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner1.png') }}" alt="">
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6 col-sm-6">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner2.png') }}" alt="">
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div> --}}
            </div>

            {{-- <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- === ===== HOT DEALS ======= ===== -->
                @include('frontend.common.hot_deals')
                <!-- === === HOT DEALS: END ====== ===== -->

                

            </div>
            <!-- ============================================== SIDEBAR : END ============================================== --> --}}

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder">
                <!-- == === FEATURED PRODUCTS == ==== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">PRODUK TERBARU</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($new_product as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="{{ asset($product->product_thambnail) }}" alt="">
                                        </div>
                                        <!-- /.image -->

                                        @php
                                        $amount = $product->product_price - $product->product_discount;
                                        $discount = ($amount/$product->product_price) * 100;
                                        @endphp

                                        <div>
                                            @if ($product->product_discount == NULL)
                                            <div class="tag new"><span>baru</span></div>
                                            @else
                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                {{ $product->product_name }}
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        @if ($product->product_discount == NULL)
                                        <div class="product-price"> <span class="price">
                                                Rp{{ number_format($product->product_price, 0, '', '.') }} </span>
                                        </div>
                                        @else
                                        <div class="product-price"> <span class="price">
                                                Rp{{ number_format($product->product_discount, 0, '', '.') }} </span>
                                            <span
                                                class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                        </div>
                                        @endif
                                        <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" type="button" title="Kerajang"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        id="{{ $product->id }}" onclick="productView(this.id)"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn"
                                                        type="button">Keranjang</button>
                                                </li>
                                                <button class="btn btn-primary icon" type="button" title="Wishlist"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i
                                                        class="fa fa-heart"></i> </button>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"
                                                        title="Detail Produk"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- == ==== FEATURED PRODUCTS : END ==== === -->
                <!-- == === FEATURED PRODUCTS == ==== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">BEST SELLER</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($best_seller as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="{{ asset($product->product_thambnail) }}" alt="">
                                        </div>
                                        <!-- /.image -->

                                        @php
                                        $amount = $product->product_price - $product->product_discount;
                                        $discount = ($amount/$product->product_price) * 100;
                                        @endphp

                                        <div>
                                            @if ($product->product_discount == NULL)
                                            @else
                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                {{ $product->product_name }}
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        @if ($product->product_discount == NULL)
                                        <div class="product-price"> <span class="price">
                                                Rp{{ number_format($product->product_price, 0, '', '.') }} </span>
                                        </div>
                                        @else
                                        <div class="product-price"> <span class="price">
                                                Rp{{ number_format($product->product_discount, 0, '', '.') }} </span>
                                            <span
                                                class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                        </div>
                                        @endif
                                        <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" type="button" title="Kerajang"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        id="{{ $product->id }}" onclick="productView(this.id)"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn"
                                                        type="button">Keranjang</button>
                                                </li>
                                                <button class="btn btn-primary icon" type="button" title="Wishlist"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i
                                                        class="fa fa-heart"></i> </button>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"
                                                        title="Detail Produk"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- == ==== FEATURED PRODUCTS : END ==== === -->

                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs" style="margin-top: 30px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/SALE.png') }}" alt="">
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- == ===== WIDE PRODUCTS : END ====== ====== -->

                <!-- == === FEATURED PRODUCTS == ==== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">KOLEKSI TERBARU</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($new_arrival as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="{{ asset($product->product_thambnail) }}" alt="">
                                        </div>
                                        <!-- /.image -->

                                        @php
                                        $amount = $product->product_price - $product->product_discount;
                                        $discount = ($amount/$product->product_price) * 100;
                                        @endphp

                                        <div>
                                            @if ($product->product_discount == NULL)
                                            <div class="tag new"><span>baru</span></div>
                                            @else
                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                {{ $product->product_name }}
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        @if ($product->product_discount == NULL)
                                        <div class="product-price"> <span class="price">
                                                Rp{{ number_format($product->product_price, 0, '', '.') }} </span>
                                        </div>
                                        @else
                                        <div class="product-price"> <span class="price">
                                                Rp{{ number_format($product->product_discount, 0, '', '.') }} </span>
                                            <span
                                                class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                        </div>
                                        @endif
                                        <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" type="button" title="Kerajang"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        id="{{ $product->id }}" onclick="productView(this.id)"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn"
                                                        type="button">Keranjang</button>
                                                </li>
                                                <button class="btn btn-primary icon" type="button" title="Wishlist"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i
                                                        class="fa fa-heart"></i> </button>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"
                                                        title="Detail Produk"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- == ==== FEATURED PRODUCTS : END ==== === -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">PRODUK PROMO</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                        @foreach($product_promo as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <img src="{{ asset($product->product_thambnail) }}" alt="">
                                        </div>
                                        <!-- /.image -->

                                        @php
                                        $amount = $product->product_price - $product->product_discount;
                                        $discount = ($amount/$product->product_price) * 100;
                                        @endphp

                                        <div>
                                            @if ($product->product_discount == NULL)
                                            <div class="tag new"><span>Promo</span></div>
                                            @else
                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a
                                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                {{ $product->product_name }}
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        @if ($product->product_discount == NULL)
                                        <div class="product-price"> <span class="price">
                                                Rp{{ number_format($product->product_price, 0, '', '.') }} </span>
                                        </div>
                                        @else
                                        <div class="product-price"> <span class="price">
                                                Rp{{ number_format($product->product_discount, 0, '', '.') }} </span>
                                            <span
                                                class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                        </div>
                                        @endif
                                        <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" type="button" title="Kerajang"
                                                        data-toggle="modal" data-target="#exampleModal"
                                                        id="{{ $product->id }}" onclick="productView(this.id)"> <i
                                                            class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn"
                                                        type="button">Keranjang</button>
                                                </li>
                                                <button class="btn btn-primary icon" type="button" title="Wishlist"
                                                    id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i
                                                        class="fa fa-heart"></i> </button>
                                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"
                                                        title="Detail Produk"> <i class="fa fa-signal"
                                                            aria-hidden="true"></i> </a> </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @endforeach
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- == ==== FEATURED PRODUCTS : END ==== === -->
            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->

        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->
@endsection