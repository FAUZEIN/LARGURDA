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
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Data Produk <span class="badge badge-pill badge-primary">
                                        {{ count($products) }} </span></h3>
                            </div>
                            <div class="col-md-6 d-flex align-items-right">
                                <a target="__blank" href="{{ url('/product/cetak-pdf') }}" class="btn btn-danger ml-auto">PDF</a>
                                <a href="{{ route('export.excel') }}" class="btn btn-success ml-2">Export</a>
                                <!-- Button trigger modal -->
                                <!-- <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">
                                    Import
                                </button> -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No. </th>
                                        <th width="15%">Foto </th>
                                        <th>Barcode </th>
                                        <th width="15%">Nama Produk </th>
                                        <th>Harga </th>
                                        <th>Diskon </th>
                                        <th>Stok </th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->product_thambnail) }}"
                                                style="width: 70px; height: 70px;" alt="">
                                        </td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>Rp{{ number_format($item->product_price,0,'','.') }}</td>
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
                                        <td>{{ $item->product_qty }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success"> Aktif </span>
                                            @else
                                            <span class="badge badge-pill badge-danger"> Non Aktif </span>
                                            @endif
                                        </td>
                                        <td width="20%">

                                            <a href="{{ route('product.edit',$item->id) }}" class="btn btn-sm btn-info"
                                                title="Edit Data"><i class="fa fa-edit"></i> </a>

                                            <a href="{{ route('product.delete',$item->id) }}"
                                                class="btn btn-sm 	btn-danger" title="Hapus Data" id="delete">
                                                <i class="fa fa-trash"></i></a>

                                            @if($item->status == 1)
                                            <a href="{{ route('product.inactive',$item->id) }}"
                                                class="btn btn-sm btn-danger" title="Non aktifkan"><i
                                                    class="fa fa-arrow-down"></i> </a>
                                            @else
                                            <a href="{{ route('product.active',$item->id) }}"
                                                class="btn btn-sm 	btn-success" title="Aktifkan"><i
                                                    class="fa fa-arrow-up"></i> </a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="{{ route('import.excel') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

                <div class="form-group">
                    <input type="file" name="file">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection