@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!--   ------------ Add Division Page -------- -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Provinsi </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="table-responsive">
    
                                <form method="post" action="{{ route('division.update',$divisions->id) }}">
                                    @csrf
    
                                    <div class="form-group">
                                        <h5>Provinsi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="division_name" class="form-control"
                                                value="{{ $divisions->division_name }}">
                                            @error('division_name')
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