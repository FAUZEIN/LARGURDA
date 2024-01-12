@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Kategori <span class="badge badge-pill badge-primary">
                                {{ count($category) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="10%">Ikon</th>
                                        <th>Kategori</th>
                                        <th>Slug</th>
                                        <th width="20%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $category as $key => $item )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <span><i class="{{ $item->category_icon }}"
                                                    style="font-size: 20px;"></i></span>
                                        </td>
                                        <td>{{ $item->category_name }}</td>
                                        <td>{{ $item->category_slug }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $item->id) }}"
                                                class="btn btn-sm btn-info" title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('category.delete', $item->id) }}"
                                                class="btn btn-sm btn-danger" id="deletecategory" title="Hapus Data">
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

            <!--------------------- Add category --------------->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kategori </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('category.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Kategori <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name" class="form-control"
                                            placeholder="Nama Kategori">
                                        @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group pt-5 mt-5">
                                        <h5>Ikon<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="category_icon" class="form-control"
                                                placeholder="Ikon Kategori">
                                            @error('category_icon')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="text-xs-right mt-5 pt-5">
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