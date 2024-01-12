@extends('frontend.main_master')
@section('content')


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Beranda</a></li>
                <li><a href="home.html">Profil</a></li>
                <li class='active'>Pembatalan Pesanan</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">

            @include('frontend.common.user_sidebar')

            <div class="col-md-10">
                <div class="sign-in-page" style="margin: 30px; padding: 40px">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Total Belanja</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Invoice</th>
                                    <th>Alasan Pengembalian</th>
                                    <th>Status Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="col-md-1">
                                        <label for=""> {{ $order->order_date }}</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> ${{ $order->amount }}</label>
                                    </td>


                                    <td class="col-md-3">
                                        <label for=""> {{ $order->payment_method }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> {{ $order->invoice_no }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""> {{ $order->cancel_reason }}</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">

                                            @if($order->cancel_order == 0)
                                            <span class="badge badge-pill badge-warning" style="background: #418DB9;">
                                                Tidak ada permintaan </span>
                                            @elseif($order->cancel_order == 1)
                                            <span class="badge badge-pill badge-warning" style="background: #800000;">
                                                Ditunda </span>
                                            <span class="badge badge-pill badge-warning" style="background:red;">Permintaan Pembatalan </span>

                                            @elseif($order->cancel_order == 2)
                                            <span class="badge badge-pill badge-warning"
                                                style="background: #008000;">Berhasil Dibatalkan </span>
                                            @endif


                                        </label>
                                    </td>



                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection