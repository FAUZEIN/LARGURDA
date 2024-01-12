@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li><a href="{{ route('my.orders') }}">Transaksi</a></li>
                <li class='active'>Detail Transaksi</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page" style="margin: 30px 0">
            <div class="row">
                <div class="col-md-7">
                    <h4>Rincian Produk</h4>
                    <hr>
                    @foreach ($orderItem as $item)
                    <div class="media product-card">
                        <a class="pull-left" href="#">
                            <img style="width: 150px" src="{{ asset($item->product->product_thambnail) }}"
                                alt="Image" />
                        </a>
                        <div class="media-body">
                            @if ($order->status != 'selesai')
                                <h4 style="font-size: 16px; font-weight: 500" class="media-heading">
                                    {{ $item->product->product_name }}</h4>
                                <p class="">{{ $item->size }} -
                                    {{ $item->color }}</p>
                                <p>{{ $item->product->product_code }}</p>
                                <p style="font-size: 14px">{{ $item->qty }}
                                    produk x Rp{{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            @else
                                <h4 style="font-size: 16px; font-weight: 500" class="media-heading">
                                    {{ $item->product->product_name }}</h4>
                                <span style="float: right">
                                    <a title="Keranjang" data-toggle="modal"
                                    data-target="#exampleModal" id="{{ $item->product->id }}"
                                    onclick="productView(this.id)" class="btn btn-primary" style="padding: 6px 40px;">Beli Lagi
                                    </a>
                                </span>
                                <p class="">{{ $item->size }} -
                                    {{ $item->color }}</p>
                                <p>{{ $item->product->product_code }}</p>
                                <span style="float: right">
                                    <a href="{{ url('product/details/'.$item->product_id.'/'.$item->product->product_slug ) }}"
                                        class="" style="padding: 6px 40px; ">Beri Ulasan</a>
                                </span>
                                <p style="font-size: 14px">{{ $item->qty }}
                                    produk x Rp{{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    @endforeach

                    <h4 style="padding-top: 30px">Info Pengiriman</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Nama</p>
                            <p>No Telepon</p>
                            <p>Email</p>
                            <p>Alamat</p>
                        </div>
                        <div class="col-md-8">
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->name }}
                            </p>
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->phone }}
                            </p>
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->email }}
                            </p>
                            <p style="margin-bottom: -20px;">
                                <span style="margin-right: 10px">:</span>
                                <div style="padding: 0 20px">
                                    {{ $order->address }} <br>
                                    {{ $order->state->state_name }}, {{ $order->district->district_name }}, <br>
                                    {{ $order->division->division_name }}, {{ $order->poscode }}
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h4>Rincian Pembayaran</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="margin-bottom: 20px">Status Pesanan</p>
                            <p>Invoice</p>
                            @if ($order->status == 'dikirim' || $order->status == 'dalam perjalanan' || $order->status == 'selesai')
                                <p>Kurir</p>
                                <p style="margin-bottom: 25px">Resi</p>
                                <p style="margin-bottom: 35px">Cek Resi</p>
                            @endif
                            <p>Tanggal Pembelian</p>
                            <p>Metode Pembayaran</p>
                            <p><strong style="font-size: 16px">Total Belanja</strong></p>
                        </div>
                        <div class="col-md-8">
                            <p style="margin-bottom: 10px">
                                @if($order->status == 'ditunda')
                                <span class="badge badge-pill badge-warning" style="background: #800080; padding: 10px;"> Ditunda
                                </span>
                                @elseif($order->status == 'di konfirmasi')
                                <span class="badge badge-pill badge-warning" style="background: #0000FF; padding: 10px;"> Dikonfirmasi
                                </span>

                                @elseif($order->status == 'dikemas')
                                <span class="badge badge-pill badge-warning" style="background: #FFA500; padding: 10px;"> Dikemas
                                </span>

                                @elseif($order->status == 'dikirim')
                                <span class="badge badge-pill badge-warning" style="background: #808000; padding: 10px;"> Dalam
                                    Pengiriman </span>

                                @elseif($order->status == 'dalam perjalanan')
                                <span class="badge badge-pill badge-warning" style="background: #808080; padding: 10px;"> Dalam
                                    perjalanan </span>

                                @elseif($order->status == 'selesai')
                                <span class="badge badge-pill badge-warning" style="background: #008000; padding: 10px;"> Selesai
                                </span>
                                @endif
                                
                                @if($order->return_order == 1)
                                <span class="badge badge-pill badge-warning" style="background:red; padding: 10px;">Pengembalian
                                </span>

                                @endif

                                @if($order->cancel_order == 2)
                                <span class="badge badge-pill badge-warning" style="background:red; padding: 10px;">Batal
                                </span>

                                @endif
                            </p>
                            <p style="margin-bottom: 10px">
                                @if ($order->status == 'selesai')
                                <a href="{{ url('user/invoice_download/' . $order->id) }}" target="_blank"
                                    class="text-success">
                                    <i class="fa fa-print"></i>
                                    {{-- {{ $order->invoice_no }}/00{{ $order->id }}/00{{ $order->user_id }} --}}
                                    {{ $order->invoice_no }}
                                </a>
                                @else
                                <span>
                                    <i class="fa fa-print"></i>
                                    {{-- {{ $order->invoice_no }}/00{{ $order->id }}/00{{ $order->user_id }} --}}
                                    {{ $order->invoice_no }}
                                </span>
                                @endif
                            </p>
                            @if ($order->status == 'dikirim' || $order->status == 'dalam perjalanan' || $order->status == 'selesai')
                                <p style="margin-bottom: 10px">
                                    <span style="margin-bottom: 10px;">{{ $order->kurir }}</span>
                                </p>
                                <p>
                                    <span style="margin-bottom: 10px;">{{ $order->resi }}</span>
                                </p>
                                <p style="margin-bottom: 20px">
                                    @if ($order->kurir == 'JNE')
                                        <a href="https://www.jne.co.id/id/beranda"><img src="{{ asset('frontend/assets/images/payments/jne.jpeg') }}" alt="" style="width: 60px;"></a>
                                        <img src="{{ asset('frontend/assets/images/payments/j&t.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <img src="{{ asset('frontend/assets/images/payments/anteraja.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <img src="{{ asset('frontend/assets/images/payments/sicepat.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                    @elseif($order->kurir == 'JNT')
                                        <img src="{{ asset('frontend/assets/images/payments/jne.jpeg') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <a href="https://jet.co.id/track"><img src="{{ asset('frontend/assets/images/payments/j&t.png') }}" alt="" style="width: 60px;"></a>
                                        <img src="{{ asset('frontend/assets/images/payments/anteraja.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <img src="{{ asset('frontend/assets/images/payments/sicepat.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                    @elseif($order->kurir == 'Anteraja')
                                        <img src="{{ asset('frontend/assets/images/payments/jne.jpeg') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <img src="{{ asset('frontend/assets/images/payments/j&t.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <a href="https://anteraja.id/tracking"><img src="{{ asset('frontend/assets/images/payments/anteraja.png') }}" alt="" style="width: 60px;"></a>
                                        <img src="{{ asset('frontend/assets/images/payments/sicepat.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                    @elseif($order->kurir == 'Sicepat Express')
                                        <img src="{{ asset('frontend/assets/images/payments/jne.jpeg') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <img src="{{ asset('frontend/assets/images/payments/j&t.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <img src="{{ asset('frontend/assets/images/payments/anteraja.png') }}" alt="" style="width: 60px; filter: grayscale(1);">
                                        <a href="https://www.sicepat.com/checkAwb"><img src="{{ asset('frontend/assets/images/payments/sicepat.png') }}" alt="" style="width: 60px;"></a>
                                        
                                    @endif
                                </p>
                            @endif
                            <p style="margin-bottom: 10px">
                                <span style="margin-bottom: 10px;">{{ $order->order_date }}</span>
                            </p>
                            <p style="margin-bottom: 10px;">
                                <span class="">{{ $order->payment_method }}</span>
                            </p>
                            <p style="margin-bottom: 10px;">
                                <span class="">
                                    <strong
                                        style="font-size: 16px">Rp{{ number_format($order->amount, 2, ',', '.') }}</strong>
                                </span>
                            </p>
                            @if($order->status == "dalam perjalanan")
                            <a href="{{ route('user.shipped.delivered',$order->id) }}"
                                class="btn btn-block btn-success" id="delivered">
                                Pesanan Diterima
                            </a>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pembatalan Pesanan -->
            <div class="row">
                <div class="col-md-12">
                    @if($order->status === "ditunda" || $order->status === "di konfirmasi" || $order->status === "dikemas")
                        @php
                        // ambil data order berdasarkan id dengan kolom cancel_order bernilai null
                        $order_cancel = App\Models\Order::where('id',$order->id)->where('cancel_order','=',NULL)->first();
                        // ambil data order berdasarkan id dengan kolom cancel_order bernilai 1
                        $cancel = App\Models\Order::where('id',$order->id)->where('cancel_order','=',1)->first();
                        @endphp

                        {{-- jika ada data order dengan kondisi yang sesuai dengan variabel $order_cancel --}}
                        @if($order_cancel)
                            {{-- jika kolom cancel_order bernilai NULL --}}
                            {{-- tampilkan ini --}}
                            <h4 style="padding-top: 30px">Pembatalan Pesanan</h4>
                            <hr>
                            <form action="{{ route('cancel.order',$order->id) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="label"> Alasan Pembatalan Pesanan :</label>
                                    <textarea name="cancel_reason" id="" class="form-control" cols="30" rows="05">Tulis alasan</textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">Kirim</button>
                            </form>
                        {{-- jika ada data order dengan kondisi yang sesuai dengan variabel $cancel --}}
                        @elseif($cancel)
                            {{-- jika kolom cancel_order bernilai 1 --}}
                            {{-- tampilkan ini --}} <br>
                            <span class="badge badge-pill badge-warning" style="background: red; padding: 10px;">
                                Anda telah mengirim permintaan pembatalan untuk produk ini 
                            </span>
                        @else

                        @endif

                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    @if($order->status !== "selesai")

                    @else

                    @php
                    $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                    @endphp


                    @if($order)
                    <h4 style="padding-top: 30px">Pengembalian Pesanan</h4>
                    <hr>
                    <form action="{{ route('return.order',$order->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="label"> Alasan Pengembalian Pesanan :</label>
                            <textarea name="return_reason" id="" class="form-control" cols="30"
                                rows="05">Tulis alasan</textarea>
                        </div>

                        <button type="submit" class="btn btn-danger">Kirim</button>

                    </form>
                    @else

                    <span class="badge badge-pill badge-warning" style="background: red">Anda telah mengirim permintaan
                        pengembalian untuk produk ini </span>

                    @endif
                    @endif
                    <br><br>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection