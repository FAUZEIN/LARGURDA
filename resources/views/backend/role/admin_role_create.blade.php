@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Tambah Admin </h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Nama <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" placeholder="Nama Admin"> </div>
                                            </div>
                                        </div> <!-- end cold md 6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" placeholder="Email"> </div>
                                            </div>
                                        </div> <!-- end cold md 6 -->
                                    </div> <!-- end row 	 -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Nomor Telepon <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="phone" class="form-control" placeholder="Telepon"> </div>
                                            </div>
                                        </div> <!-- end cold md 6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Password <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="password" name="password" class="form-control" placeholder="Password"> </div>
                                            </div>
                                        </div> <!-- end cold md 6 -->
                                    </div> <!-- end row 	 -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Foto Profil <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="profile_photo_path" class="form-control"
                                                        id="image"> </div>
                                            </div>
                                        </div><!-- end cold md 6 -->
                                        <div class="col-md-6">
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                style="width: 100px; height: 100px;">
                                        </div><!-- end cold md 6 -->
                                    </div><!-- end row 	 -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="brand" value="1">
                                                        <label for="checkbox_2">Merek</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="category"
                                                            value="1">
                                                        <label for="checkbox_3">Kategori</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="product" value="1">
                                                        <label for="checkbox_4">Produk</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="slider" value="1">
                                                        <label for="checkbox_5">Slider</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_6" name="coupons" value="1">
                                                        <label for="checkbox_6">Kupon</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_7" name="shipping"
                                                            value="1">
                                                        <label for="checkbox_7">Data Wilayah</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_8" name="orders" value="1">
                                                        <label for="checkbox_8">Pesanan</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_9" name="stock" value="1">
                                                        <label for="checkbox_9">Stok</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_10" name="returnorder"
                                                            value="1">
                                                        <label for="checkbox_10">Pengembalian Pesanan</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_11" name="review" value="1">
                                                        <label for="checkbox_11"> Ulasan</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_12" name="adminuserrole" value="1">
                                                        <label for="checkbox_12">Admin User</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_13" name="alluser"
                                                        value="1">
                                                        <label for="checkbox_13">Data Pelanggan</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_14" name="reports" value="1">
                                                        <label for="checkbox_14">Laporan Pesanan</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_15" name="setting"
                                                            value="1">
                                                        <label for="checkbox_15">Pengaturan</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_16" name="cancel" 
                                                            value="1">
                                                        <label for="checkbox_16">Pembatalan</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-md btn-primary mb-5"
                                            value="Tambah">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection