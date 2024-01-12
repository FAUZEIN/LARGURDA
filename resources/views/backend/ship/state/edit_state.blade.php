@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!--   ------------ Add State Page -------- -->
            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Kecamatan </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('state.update',$state->id) }}">
                                    @csrf
    
                                    <div class="form-group">
                                        <h5>Provinsi <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select class="form-control" name="division_id">
                                                <option selected disabled>Pilih Provinsi</option>
                                                @foreach ($division as $div)
                                                <option value="{{ $div->id }}"
                                                    {{ $div->id == $state->division_id ? 'selected' : '' }}>
                                                    {{ $div->division_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Kota/Kabupaten <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="district_id" class="form-control">
                                                <option value="" selected="" disabled="">Pilih Kota/Kabupaten</option>
    
                                                @foreach($district as $dis)
                                                <option value="{{ $dis->id }}"
                                                    {{ $dis->id == $state->district_id ? 'selected':'' }}>
                                                    {{ $dis->district_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Kecamatan <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="state_name" class="form-control"
                                                value="{{ $state->state_name }}">
                                            @error('state_name ')
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

{{-- Ajax State --}}
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="division_id"]').on('change', function () {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{  url('/shipping/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .district_name + '</option>');
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