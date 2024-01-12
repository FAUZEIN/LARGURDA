@extends('admin.admin_master') @section('admin')


<!-- Content Wrapper. Contains page content -->

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-4">
                <div class="box bl-3 border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Cari Berdasarkan Tanggal
                        </h4>
                    </div>
                    <!-- /.box-header -->
                    <form method="post" action="{{ route('search-by-date') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <h5>Pilih Tanggal
                                    <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="date" class="form-control">
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-info mb-5" value="Cari">
                        </div>
                    </form>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <div class="box bl-3 border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Cari Berdasarkan Bulan
                        </h4>
                    </div>
                    <!-- /.box-header -->
                    <form method="post" action="{{ route('search-by-month') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="month">Pilih Bulan
                                    <span class="text-danger">*</span></label>
                                <select name="month" class="form-control">
                                    <option label="Pilih Bulan"></option>
                                    <option value="January">Januari</option>
                                    <option value="February">Februari</option>
                                    <option value="March">Maret</option>
                                    <option value="April">April</option>
                                    <option value="May">Mei</option>
                                    <option value="Jun">Juni</option>
                                    <option value="July">Juli</option>
                                    <option value="August">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="October">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="December">Desember</option>
                                </select>
                                @error('month')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="year_name">Pilih Tahun
                                    <span class="text-danger">*</span></label>
                                <select name="year_name" class="form-control">
                                    <option label="Pilih Tahun"></option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                                @error('year_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <div class="box-footer">
                            <input type="submit" class="btn btn-info mb-5" value="Cari">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <div class="box bl-3 border-primary">
                    <div class="box-header with-border">
                        <h4 class="box-title">Cari Berdasarkan Tahun
                        </h4>
                    </div>
                    <form method="post" action="{{ route('search-by-year') }}">
                        @csrf
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="year">Pilih Tahun
                                    <span class="text-danger">*</span></label>
                                <select name="year" class="form-control">
                                    <option label="Pilih Tahun"></option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                                @error('year')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <div class="box-footer">
                            <input type="submit" class="btn btn-info mb-5" value="Cari">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection