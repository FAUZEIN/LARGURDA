@extends('frontend.main_master')
@section('content')


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li class='active'>Transaksi</li>
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
                                    <th><i class="fa fa-shopping-bag"></i> Belanja</th>
                                    <th>Invoice</th>
                                    <th>Pembayaran</th>
                                    <th>Total Belanja</th>
                                    <th>Status</th>
                                    <th width="16%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr class="border-bottom">
                                    <td>
                                        {{ $order->order_date }} <br>
                                    </td>
                                    <td>{{ $order->invoice_no }}</td>
                                    {{-- <td>{{ $order->invoice_number }}/00{{ $order->id }}/00{{ $order->user_id }}
                                    </td> --}}
                                    <td>{{ $order->payment_method }}</td>
                                    <td><strong>Rp{{ number_format($order->amount, 2, ',', '.') }}</strong>
                                    </td>
                                    <td>
                                        @if($order->status == 'ditunda')        
                                        <span class="badge badge-pill badge-warning" style="background: #800080; padding: 10px;"> Ditunda </span>
                                        @elseif($order->status == 'di konfirmasi')
                                        <span class="badge badge-pill badge-warning" style="background: #0000FF; padding: 10px;"> Dikonfirmasi </span>
                                
                                        @elseif($order->status == 'dikemas')
                                        <span class="badge badge-pill badge-warning" style="background: #FFA500; padding: 10px;"> Di proses </span>
                                
                                        @elseif($order->status == 'dikirim')
                                        <span class="badge badge-pill badge-warning" style="background: #808000; padding: 10px;"> Dikirim </span>
                                
                                        @elseif($order->status == 'dalam perjalanan')
                                        <span class="badge badge-pill badge-warning" style="background: #808080; padding: 10px;"> Di Perjalanan </span>
                                
                                        @elseif($order->status == 'selesai')
                                        <span class="badge badge-pill badge-warning" style="background: #008000; padding: 10px;"> Selesai </span>
                                         @endif
                                        @if($order->return_order == 1) 
                                        <div class="mt-3">
                                            <span class="badge badge-pill badge-warning" style="background:red; padding: 10px; margin-top: 15px">Permintaan <br> Pengembalian </span>
                                        </div>
                                
                                        @endif
                                
                                        @if ($order->cancel_order == 1)
                                            <div class="mt-3">
                                                <span class="badge badge-pill badge-warning" style="background:red; padding: 10px; margin-top: 15px">Permintaan <br> Pembatalan </span>
                                            </div>
                                        @elseif ($order->cancel_order == 2)
                                            <div class="mt-3">
                                                <span class="badge badge-pill badge-warning" style="background:red; padding: 10px; margin-top: 15px">Batal</span>
                                            </div>
                                            
                                        @endif
                                    </td>
                                    <td align="right"><a href="{{ url('user/order_details/' . $order->id) }}"
                                            class="btn btn-sm btn-default" style="padding: 10px">
                                            <i class="fa fa-print"></i> Detail Transaksi
                                        </a></td>
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