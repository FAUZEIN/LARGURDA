@php

$product_promo =
App\Models\Product::where('product_promo',1)->where('product_discount','!=',NULL)->orderBy('id','DESC')->limit(3)->get();
@endphp

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs" style="margin-top: 10px">
    <h3 class="section-title">PROMO</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

        @foreach($product_promo as $product)
        <div class="item item-carousel">
            <div class="products">
                <div class="product">
                    <div class="product-image">
                        <div class="image"> <a
                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img
                                    src="{{ asset($product->product_thambnail) }}" alt=""></a>
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
                                href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                {{ $product->product_name_en }}
                            </a>
                        </h3>
                        <div class="rating rateit-small"></div>
                        <div class="description"></div>

                        @if ($product->product_discount == NULL)
                        <div class="product-price"> <span class="price">
                                Rp{{ $product->product_price }} </span> </div>
                        @else
                        <div class="product-price"> <span class="price">
                                Rp{{ $product->product_discount }} </span> <span
                                class="price-before-discount">Rp{{ $product->product_price }}</span>
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
                                        title="Kerajanng" data-toggle="modal"
                                        data-target="#exampleModal" id="{{ $product->id }}"
                                        onclick="productView(this.id)"> <i
                                            class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn"
                                        type="button">Keranjang</button>
                                </li>
                                <button class="btn btn-primary icon" type="button" title="Wishlist"
                                    id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i
                                        class="fa fa-heart"></i> </button>
                                <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart"
                                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"
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
        @endforeach
        <!-- // end hot deals foreach -->
    </div>
    <!-- /.sidebar-widget -->
</div>