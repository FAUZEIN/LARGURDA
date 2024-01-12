@foreach($products as $product)
<div class="category-product-inner wow fadeInUp">
    <div class="products">
        <div class="product-list product">
            <div class="row product-list-row">
                <div class="col col-sm-4 col-lg-4">
                    <div class="product-image">
                        <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>
                    </div>
                    <!-- /.product-image -->
                </div>
                <!-- /.col -->
                <div class="col col-sm-8 col-lg-8">
                    <div class="product-info">
                        <h3 class="name">
                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                {{ $product->product_name }} 
                            </a>
                        </h3>
                        <div class="rating rateit-small"></div>

                        @if ($product->product_discount == NULL)
                        <div class="product-price"> <span class="price"> Rp{{ number_format($product->product_price, 0, '', '.') }} </span> </div>
                        @else
                        <div class="product-price"> <span class="price"> Rp{{ number_format($product->product_discount, 0, '', '.') }} </span> <span
                                class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span> </div>
                        @endif

                        <!-- /.product-price -->
                        <div class="description m-t-10">
                            {{ $product->short_descp }} 
                        </div>
                        <div class="cart clearfix animate-effect">
                            <div class="action">
                                <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> 
                                            <i class="fa fa-shopping-cart"></i> </button>
                                        <button class="btn btn-primary cart-btn" type="button">Keranjang</button>
                                    </li>
                                    <li class="lnk wishlist"> 
                                        <a class="add-to-cart" href="detail.html" title="Wishlist"> 
                                            <i class="icon fa fa-heart"></i> 
                                        </a> 
                                    </li>
                                    <li class="lnk"> 
                                        <a class="add-to-cart" href="detail.html" title="Compare"> 
                                            <i class="fa fa-signal"></i> 
                                        </a> 
                                    </li>
                                </ul>
                            </div>
                            <!-- /.action -->
                        </div>
                        <!-- /.cart -->
                    </div>
                    <!-- /.product-info -->
                </div>
                <!-- /.col -->
            </div>

            @php
            $amount = $product->product_price - $product->product_discount;
            $discount = ($amount/$product->product_price) * 100;
            @endphp

            <!-- /.product-list-row -->
            <div>
                @if ($product->product_discount == NULL)
                <div class="tag new"><span>baru</span></div>
                @else
                <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                @endif
            </div>
        </div>
        <!-- /.product-list -->
    </div>
    <!-- /.products -->
</div>
<!-- /.category-product-inner -->
@endforeach