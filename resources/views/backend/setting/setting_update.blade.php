@extends('admin.admin_master') @section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Website
                </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form
                            method="post"
                            action="{{ route('update.sitesetting') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $setting->id }}">
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Nama Perusahaan
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        name="company_name"
                                                        class="form-control"
                                                        value="{{ $setting->company_name }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Alamat Perusahaan
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        name="company_address"
                                                        class="form-control"
                                                        value="{{ $setting->company_address }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Nomor Telepon 1
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        name="phone_one"
                                                        class="form-control"
                                                        value="{{ $setting->phone_one }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Nomor Telepon 2
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        name="phone_two"
                                                        class="form-control"
                                                        value="{{ $setting->phone_two }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Email
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="email"
                                                        name="email"
                                                        class="form-control"
                                                        value="{{ $setting->email }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Deskripsi Perusahaan <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="description" class="form-control">
                                                        {!! $setting->description !!}
                                                    </textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end cold md 6 -->
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>Logo<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="logo" class="form-control" id="logoImage">
                                                </div>
                                                <img id="showImage" src="{{ url($setting->logo) }}" 
                                                style="width: 150px; height: 56px; margin-top: 20px;" alt="">
                                            </div>

                                            <div class="form-group">
                                                <h5>Facebook
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        name="facebook"
                                                        class="form-control"
                                                        value="{{ $setting->facebook }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Twitter
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        name="twitter"
                                                        class="form-control"
                                                        value="{{ $setting->twitter }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Linkedin
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        name="linkedin"
                                                        class="form-control"
                                                        value="{{ $setting->linkedin }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5>Youtube
                                                    <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input
                                                        type="text"
                                                        name="youtube"
                                                        class="form-control"
                                                        value="{{ $setting->youtube }}">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-primary mb-5" value="Ubah">
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

<script>
    $(document).ready(function () {
        $('#logoImage').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection