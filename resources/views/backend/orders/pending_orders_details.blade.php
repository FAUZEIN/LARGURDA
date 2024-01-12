@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Details </h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Detail Transaksi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-6 col-12">
                <div class="box box-slided-up">
                    <div class="box-header with-border">
                        <h4 class="box-title">Data Pembayaran</strong></h4>
                        <ul class="box-controls pull-right">
                            <li><a class="box-btn-slide rotate-180" href="#"></a></li>
                            <li><a class="box-btn-fullscreen" href="#"></a></li>
                        </ul>
                    </div>
                    <div class="box-body" style="display: block;">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Nama</td>
                                    <td width="2%">:</td>
                                    <td>{{ $order->user->name }} | {{ $order->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>No. HP</td>
                                    <td>:</td>
                                    <td>{{ $order->user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pesanan</td>
                                    <td>:</td>
                                    <td>{{ $order->order_date }}</td>
                                </tr>
                                <tr>
                                    <td>ID Pesanan <span class="text-info ml-1">Invoice</span></td>
                                    <td>:</td>
                                    <td>
                                        {{ $order->id }}/{{ $order->user_id }}/{{ $order->order_number }}
                                        <a href="{{ url('orders/invoice/download/' . $order->id) }}" target="_blank"
                                            class="text-info">
                                            <i class="fa fa-print ml-1"></i> {{ $order->invoice_number }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td>:</td>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <td>TRX ID</td>
                                    <td>:</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>Total Harga</td>
                                    <td>:</td>
                                    <td>Rp{{ number_format($order->amount, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Total Belanja</td>
                                    <td>:</td>
                                    <td>Rp{{ number_format($order->amount, 2, ',', '.') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="box box-slided-up">
                    <div class="box-header with-border">
                        <h4 class="box-title">Data Pengiriman</strong></h4>
                        <ul class="box-controls pull-right">
                            <li><a class="box-btn-slide rotate-180" href="#"></a></li>
                            <li><a class="box-btn-fullscreen" href="#"></a></li>
                        </ul>
                    </div>
                    <div class="box-body" style="display: block;">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Nama Penerima</td>
                                    <td width="2%">:</td>
                                    <td>{{ $order->name }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>No. HP Penerima</td>
                                    <td>:</td>
                                    <td>{{ $order->phone }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Alamat Pengiriman</td>
                                    <td>:</td>
                                    <td>
                                        {{ $order->address }}, {{ $order->state->state_name }}, <br>
                                        {{ $order->district->district_name }}, {{ $order->division->division_name }}
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Status Pesanan </td>
                                    <td>:</td>
                                    <td>
                                        <span class="badge badge-pill badge-warning" style="background: #418DB9;">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    @if ($order->payment_method == 'Transfer Bank Manual')
                                    <td>
                                        <p><strong>Bukti Pembayaran</strong></p>
                                    </td>
                                    <td> : </td>
                                    <td>
                                        <a href="{{ asset($order->bukti_pembayaran) }}" target="_blank"><img src="{{ asset($order->bukti_pembayaran) }}" alt="bukti-pembayaran"
                                            class="w-100 mt-n1" target="_blank"></a>
                                    </td>
                                    <td></td>
                                    @else
                                    @endif
                                </tr>
                                @if ($order->status == 'dikirim' || $order->status == 'dalam perjalanan')
                                <form action="{{ route('order.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label>Kurir</label>
                                                <select class="form-control" name="kurir">
                                                    <option value="{{ $order->kurir }}">
                                                        {{ $order->kurir }}
                                                    </option>
                                                    <option value="JNE">JNE</option>
                                                    <option value="JNT">JNT</option>
                                                    <option value="Anteraja">Anteraja</option>
                                                    <option value="Sicepat Express">Sicepat Express</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="form-group">
                                                <label>Input Resi</label>
                                                <input type="text" class="form-control" name="resi"
                                                    value="{{ $order->resi }}" placeholder="{{ $order->kurir }}...">
                                            </div>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-md btn-success" style="margin-top: 5px">
                                                Ubah
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                                @elseif($order->status == 'selesai')
                                <tr>
                                    <td>Kurir</td>
                                    <td>:</td>
                                    <td> {{ $order->kurir }} </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Resi</td>
                                    <td>:</td>
                                    <td> {{ $order->resi }} </td>
                                    <td></td>
                                </tr>
                                @endif

                                @if ($order->status == 'selesai')
                                <tr>
                                    <td>Status Pengiriman</td>
                                    <td>:</td>
                                    <td>
                                        <p>Pesanan Tiba di Tujuan dan <br>
                                            Diterima oleh <strong class="text-info">{{ $order->name }}</strong>
                                        </p>
                                    </td>
                                </tr>
                                @if ($order->payment_method == 'Cash On Delivery')
                                <tr>
                                    <td colspan="3">
                                        <em>Pihak <strong class="text-info text-uppercase">{{ $order->kurir }}</strong>
                                            telah menyetorkan pembayaran! <br> <span
                                                class="text-info">{{ $order->updated_at }}
                                                WIB</span></em>
                                    </td>
                                </tr>
                                @else
                                @php
                                $adminData = DB::table('admins')->first();
                                @endphp
                                <tr>
                                    <td colspan="3">
                                        <em>Pembayaran diverifikasi oleh <strong
                                                class="text-info">{{ $adminData->name }}</strong>!
                                            <br> <span class="text-info">{{ $order->updated_at }}
                                                WIB</span></em>
                                    </td>
                                </tr>
                                @endif
                                @endif
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                    <td>
                                        @if($order->status == 'ditunda')
                                        <a href="{{ route('pending.confirm', $order->id) }}"
                                            class="btn btn-block btn-success" id="confirm">
                                            Konfirmasi Pesanan
                                        </a>
                                        @elseif($order->status == 'di konfirmasi')
                                        <a href="{{ route('confirm.processing',$order->id) }}"
                                            class="btn btn-block btn-success" id="processing">
                                            Kemas Pesanan
                                        </a>
                                        @elseif($order->status == 'dikemas')
                                        <a href="{{ route('processing.picked',$order->id) }}"
                                        class="btn btn-block btn-success" id="picked">
                                        Kirim Pesanan
                                        </a>
                                        @elseif($order->status == 'dikirim')
                                        <a href="{{ route('picked.shipped',$order->id) }}"
                                            class="btn btn-block btn-success" id="shipped">
                                            Dalam Perjalanan
                                        </a>
                                        @elseif($order->status == 'dalam perjalanan')
                                        <a href="{{ route('shipped.delivered',$order->id) }}"
                                            class="btn btn-block btn-success" id="delivered">
                                            Pesanan Diterima
                                        </a>

                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-12">
                <div class="box box-slided-up">
                    <div class="box-header with-border">
                        <h4 class="box-title">Detail Produk</strong></h4>
                        <ul class="box-controls pull-right">
                            <li><a class="box-btn-slide rotate-180" href="#"></a></li>
                            <li><a class="box-btn-fullscreen" href="#"></a></li>
                        </ul>
                    </div>
                    <div class="box-body" style="display: block;">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="12%"></th>
                                        <th>Nama Produk</th>
                                        <th>Barcode</th>
                                        <th>Ukuran</th>
                                        <th>Warna</th>
                                        <th>Berat</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItem as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->product->product_thambnail) }}" width="100px;">
                                        </td>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>{{ $item->product->product_code }}</td>
                                        <td>{{ $item->size }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>{{ $item->weight }} gram</td>
                                        <td>{{ $item->qty }} pcs</td>
                                        <td>Rp{{ number_format($item->price, 0, ',', '.') }}</td>
                                        @php
                                        $total = $item->qty * $item->price;
                                        @endphp
                                        <td>Rp{{ number_format($total, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /. end row -->
    </section>
    <!-- /.content -->
</div>

@endsection