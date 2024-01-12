@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Daftar Data Merek -->
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Merek
                            <span class="badge badge-pill badge-primary">{{ count($brands) }} </span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>Merek</th>
                                        <th>Slug</th>
                                        <th width="25%">Gambar</th>
                                        <th width="20%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Perulangan foreach digunakan untuk menampilkan data yang berbentuk array -->
                                    @foreach ($brands as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->brand_name }}</td>
                                        <td>{{ $item->brand_slug }}</td>
                                        <td>
                                            <img src="{{ asset($item->brand_image) }}" class="w-50" alt="Brand">
                                        </td>
                                        <td>
                                            <a href="{{ route('brand.edit', $item->id) }}" class="btn btn-sm btn-info" 
                                                title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('brand.delete', $item->id) }}" class="btn btn-sm btn-danger" 
                                                title="Hapus Data" id="delete">
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

            <!-- Tambah Data Merek -->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Merek </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('brand.store')}}" enctype="multipart/form-data">
                              @csrf
                                <div class="form-group">
                                    <h5>Merek <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name" class="form-control"
                                            placeholder="Nama Merek">
                                        @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    <div>
                                  </div>
                                  <div class="form-group mt-5 pt-5">
                                    <h5>Gambar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control"
                                            placeholder="Gambar Merek">
                                        @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="text-xs-right">
                                      <input type="submit" class="btn btn-md btn-primary mb-5" value="Tambah">
                                  </div>
                                </div>
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