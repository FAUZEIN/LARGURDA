@extends('frontend.main_master')
@section('content')

@section('title')
Keranjang
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Keranjang</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">Produk</th>
                                        <th class="cart-description item"></th>
                                        <th class="cart-product-name item">Kuantitas</th>
                                        <th class="cart-product-name item">Sub Total</th>
                                        <th class="cart-edit item">Opsi</th>
                                    </tr>
                                </thead><!-- /thead -->
                                <tbody id="cartPage">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 cart-shopping-total">
                @if(Session::has('coupon'))
                @else
                <div id="couponField" style="margin-top: 20px">
                    <h5>Kupon Diskon</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" class="form-control text-input" placeholder="Masukkan Kupon Disini ..."
                                id="coupon_name">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" onclick="applyCoupon()">Gunakan</button>
                        </div>
                    </div>
                </div>
                @endif

                <hr>
                <div id="couponCalField">
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">Beli
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.sigin-in-->
</div>
<br>
<br>
<br>

@endsection