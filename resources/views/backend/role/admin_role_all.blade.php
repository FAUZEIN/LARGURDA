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
                        <h3 class="box-title">Data Admin <span class="badge badge-pill badge-primary">{{ count($adminuser) }}</h3>
                        <a href="{{ route('add.admin') }}" class="btn btn-primary" style="float: right;">Tambah Admin</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Gambar </th>
                                        <th>Nama </th>
                                        <th>Email </th>
                                        <th>Hak Akses </th>
                                        <th>Opsi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($adminuser as $item)
                                    <tr>
                                        <td> <img src="{{ (!empty($item->profile_photo_path))? url('upload/admin_images/'.$item->profile_photo_path):url('upload/no_image.jpg') }}"
                                                style="width: 50px; height: 50px;"> </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->email  }} </td>

                                        <td>
                                            @if($item->brand == 1)
                                            <span class="badge btn-primary">Merek</span>
                                            @else
                                            @endif

                                            @if($item->category == 1)
                                            <span class="badge btn-secondary">Kategori</span>
                                            @else
                                            @endif


                                            @if($item->product == 1)
                                            <span class="badge btn-success">Produk</span>
                                            @else
                                            @endif


                                            @if($item->slider == 1)
                                            <span class="badge btn-danger">Slider</span>
                                            @else
                                            @endif


                                            @if($item->coupons == 1)
                                            <span class="badge btn-warning">Kupon</span>
                                            @else
                                            @endif


                                            @if($item->shipping == 1)
                                            <span class="badge btn-info">Pengiriman</span>
                                            @else
                                            @endif


                                            @if($item->setting == 1)
                                            <span class="badge btn-dark">Pengaturan</span>
                                            @else
                                            @endif

                                            @if($item->cancel == 1)
                                            <span class="badge btn-light">Pembatalan</span>
                                            @else
                                            @endif

                                            @if($item->returnorder == 1)
                                            <span class="badge btn-primary">Pengembalian</span>
                                            @else
                                            @endif


                                            @if($item->review == 1)
                                            <span class="badge btn-secondary">Ulasan</span>
                                            @else
                                            @endif


                                            @if($item->orders == 1)
                                            <span class="badge btn-success">Pesanan</span>
                                            @else
                                            @endif

                                            @if($item->stock == 1)
                                            <span class="badge btn-danger">Stok</span>
                                            @else
                                            @endif

                                            @if($item->reports == 1)
                                            <span class="badge btn-warning">Laporan</span>
                                            @else
                                            @endif

                                            @if($item->alluser == 1)
                                            <span class="badge btn-info">Data Pelanggan</span>
                                            @else
                                            @endif

                                            @if($item->adminuserrole == 1)
                                            <span class="badge btn-dark">Data Admin</span>
                                            @else
                                            @endif
                                        </td>
                                        <td width="25%">
                                            <a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-sm btn-info"
                                                title="Edit Data"><i class="fa fa-edit"></i> </a>

                                            <a href="{{ route('delete.admin.user',$item->id) }}" class="btn btn-sm btn-danger"
                                                title="Hapus Data" id="delete">
                                                <i class="fa fa-trash"></i></a>
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