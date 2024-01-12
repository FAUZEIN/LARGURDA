@extends('frontend.main_master')
@section('content')

@section('title')
Transfer Bank Manual
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Transfer Bank Manual</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Total Pembayaran </h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li>
                                            @if(Session::has('coupon'))

                                            <strong>SubTotal: </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}
                                            <hr>

                                            <strong>Kupon : </strong>
                                            {{ session()->get('coupon')['coupon_name'] }}
                                            ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                            <hr>

                                            <strong>Diskon Kupon : </strong>
                                            Rp{{ number_format( session()->get('coupon')['discount_amount'], 0, '', '.') }}
                                            <hr>

                                            <strong>Total Bayar : </strong>
                                            Rp{{ number_format(session()->get('coupon')['total_amount'], 0, '', '.') }}
                                            <hr>

                                            @else

                                            <strong>SubTotal: </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}
                                            <hr>

                                            <strong>Total Bayar : </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}
                                            <hr>

                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div> <!--  // end col md 6 -->

                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Metode Pembayaran</h4>
                                </div>

                                <form action="{{ route('manual.order') }}" method="post" id="payment-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <label for="card-element">

                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                            <input type="hidden" name="address" value="{{ $data['address'] }}">

                                        </label>
                                    </div>

                                    <p style="margin-bottom: 20px; font-size: 14px;">Silahkan lakukan pembayaran transfer
                                        bank pada no. rekening berikut!</p>
                                      <img src="{{ asset('frontend/assets/images/payments/bri.png') }}" alt="bri"
                                          style="width: 125px;">
                                      <h3 style="float: right; margin-top: 0px;">011111112312 <br><span style="font-size: 14px; font-style: italic;">LARGURDA AM STORE</span></h3>
                                      
                                      <div class="form-group mt-50">
                                          <br>
                                          <label class="" for="foto">
                                            Unggah Bukti Pembayaran <span class="text-danger">*</span>
                                          </label>
                                          <input type="file" id="foto" name="bukti_pembayaran" class="form-control" accept="image/*" required>
                                      </div>
    
                                      <p style="font-size: 12px; margin: 20px 0 15px; color: #b1b1b1">Saya
                                          menyetujui syarat dan ketentuan yang berlaku.</p>
                                      <button class="btn btn-primary">Buat Pesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div><!--  // end col md 6 -->
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

@endsection