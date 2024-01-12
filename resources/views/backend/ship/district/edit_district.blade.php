@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!--   ------------ Add District Page -------- -->
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Kota / Kabupaten </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('district.update',$district->id ) }}">
                                    @csrf
    
                                    <div class="form-group">
                                        <h5>Provinsi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="division_id" class="form-control">
                                                <option value="" selected="" disabled="">Pilih Provinsi</option>
                                                @foreach($division as $div)
                                                <option value="{{ $div->id }}"
                                                    {{ $div->id == $district->division_id ? 'selected': '' }}>
                                                    {{ $div->division_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Kota / Kabupaten <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="district_name" class="form-control"
                                                value="{{ $district->district_name }}">
                                            @error('district_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-primary mb-5" value="Ubah">
                                    </div>
                                </form>
                            </div>
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