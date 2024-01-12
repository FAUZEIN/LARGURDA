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
                        <h3 class="box-title">Data Kecamatan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>Provinsi</th>
                                        <th>Kota / Kabupaten </th>
                                        <th>Kecamatan </th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($state as $key => $item)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td> {{ $item->division->division_name }} </td>
                                        <td> {{ $item->district->district_name }} </td>
                                        <td> {{ $item->state_name }} </td>
                                        <td width="40%">
                                            <a href="{{ route('state.edit',$item->id) }}" class="btn btn-sm btn-info"
                                                title="Edit Data"><i class="fa fa-edit"></i> </a>
                                            <a href="{{ route('state.delete',$item->id) }}" class="btn btn-sm btn-danger"
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
            <!--   ------------ Add State Page -------- -->
            <div class="col-md-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kecamatan </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('state.store') }}">
                                @csrf

                                <div class="form-group">
                                    <h5><b>Pilih Provinsi </b> <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="division_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Pilih Provinsi</option>
                                            @foreach($division as $item)
                                            <option value="{{ $item->id }}">{{ $item->division_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('division_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- // end form group -->
                                <div class="form-group">
                                    <h5><b>Pilih Kota / Kabupaten</b> <span class="text-danger">*</span>
                                    </h5>
                                    <div class="controls">
                                        <select name="district_id" class="form-control" required="">
                                            <option value="" selected="" disabled="">Pilih Kota / Kabupaten
                                            </option>
                                        </select>
                                        @error('district_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div> <!-- // end form group -->
                                <div class="form-group">
                                    <h5>Kecamatan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="state_name" class="form-control" placeholder="Nama Kecamatan">
                                        @error('state_name ')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-primary mb-5" value="Tambah">
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

{{-- Ajax State --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function () {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{  url('/shipping/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

@endsection