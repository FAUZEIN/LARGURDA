@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Daftar Data Kupon -->
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Kupon
                            <span class="badge badge-pill badge-primary">{{ count($coupons) }} </span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>Kupon</th>
                                        <th>Diskon Kupon</th>
                                        <th>Validasi</th>
                                        <th width="25%">Status</th>
                                        <th width="20%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($coupons as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> {{ $item->coupon_name }} </td>
                                        <td> {{ $item->coupon_discount }}% </td>
                                        <td width="25%">
                                          {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}
                                        </td>
                                        <td>
                                          {{-- jika data tanggal validasi lebih dari atau sama dengan dari tanggal hari ini --}}
                                          @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                          {{-- tampilkan ini --}}
                                          <span class="badge badge-pill badge-success"> Valid </span>
                                          @else
                                          {{-- jika data tanggal validasi kurang dari tanggal hari ini --}}
                                          {{-- tampilkan ini --}}
                                          <span class="badge badge-pill badge-danger"> Invalid </span>
                                          @endif
                                        </td>
                                        <td width="25%">
                                            <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-sm btn-info mt-1"
                                                title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('coupon.delete',$item->id) }}" 
                                               class="btn btn-sm btn-danger mt-1" title="Hapus Data" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
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

            <!-- Tambah Kupon -->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kupon </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <form method="post" action="{{ route('coupon.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <h5>Kupon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="coupon_name" class="form-control"
                                            placeholder="Nama Kupon">
                                        @error('coupon_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Diskon Kupon(%) <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="coupon_discount" class="form-control"
                                            placeholder="Kupon Diskon">
                                        @error('coupon_discount')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Validasi Tanggal <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="coupon_validity" class="form-control"
                                        min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                        @error('coupon_validity')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-primary mb-5" value="Tambah">
                                </div>
                            </form>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection