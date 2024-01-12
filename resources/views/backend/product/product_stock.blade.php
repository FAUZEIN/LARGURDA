@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Stok Produk <span class="badge badge-pill badge-primary">
                                {{ count($products) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Gambar </th>
                                        <th>Produk</th>
                                        <th>Harga </th>
                                        <th>Kuantitas </th>
                                        <th>Diskon </th>
                                        <th>Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                    <tr>
                                        <td> <img src="{{ asset($item->product_thambnail) }}"
                                                style="width: 60px; height: 50px;"> </td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>Rp{{ number_format($item->product_price,0,'','.') }} </td>
                                        <td>{{ $item->product_qty }} pcs</td>

                                        <td>
                                            @if($item->product_discount == NULL)
                                            <span class="badge badge-pill badge-danger">Tidak ada diskon</span>

                                            @else
                                            @php
                                            $amount = $item->product_price - $item->product_discount;
                                            $discount = ($amount/$item->product_price) * 100;
                                            @endphp
                                            <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>

                                            @endif
                                        </td>

                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success"> Aktif </span>
                                            @else
                                            <span class="badge badge-pill badge-danger"> Non Aktif </span>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection