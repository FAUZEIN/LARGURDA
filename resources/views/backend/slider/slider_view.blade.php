@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <!-- Daftar Data Slider -->
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Slider
                            <span class="badge badge-pill badge-primary">{{ count($sliders) }} </span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="15%">Gambar </th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sliders as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->slider_img) }}"
                                                style="width: 70px; height: 40px;">
                                        </td>
                                        <td>
                                            @if($item->title == NULL)
                                            <span class="badge badge-pill badge-danger"> Tidak ada judul </span>
                                            @else
                                            {{ $item->title }}
                                            @endif
                                        </td>
                                        <td>{{ $item->description }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success"> Aktif </span>
                                            @else
                                            <span class="badge badge-pill badge-danger"> Non Aktif </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('slider.edit',$item->id) }}"
                                                class="btn btn-info btn-sm mt-1" title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{ route('slider.delete',$item->id) }}"
                                                class="btn btn-danger btn-sm mt-1" title="Hapus Data" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            @if($item->status == 1)
                                            <a href="{{ route('slider.inactive',$item->id) }}" 
                                              class="btn btn-danger btn-sm mt-1" title="Non aktifkan">
                                                <i class="fa fa-arrow-down"></i> 
                                            </a>
                                            @else
                                            <a href="{{ route('slider.active',$item->id) }}" 
                                              class="btn btn-success btn-sm mt-1" title="Aktifkan">
                                                <i class="fa fa-arrow-up"></i> 
                                            </a>
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

            <!-- Tambah Slider -->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Slider </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                          <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <h5>Judul <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control" placeholder="Judul">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Deskripsi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="description" class="form-control"
                                            placeholder="Deskripsi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Gambar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="slider_img" class="form-control">
                                        @error('slider_img')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-md btn-primary mb-5" value="Tambah">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection