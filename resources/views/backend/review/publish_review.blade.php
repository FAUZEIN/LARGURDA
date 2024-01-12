@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
	<!-- Content Header (Page header) -->
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Semua Ulasan <span class="badge badge-pill badge-primary">
                            {{ count($review) }} </span></h3>
					</div>
					<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
                                        <tr>
											<th width="5%">No.</th>
                                            <th>Ulasan </th>
                                            <th>Pelanggan </th>
                                            <th>Produk </th>
                                            <th>Status </th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($review as $key => $item)
                                        <tr>
                                            <td> {{ $key+1 }} </td>
                                            <td> {{ $item->comment }} </td>
                                            <td> {{ $item->user->name }} </td>
                                            <td> {{ $item->product->product_name }} </td>
                                            <td>
                                                @if($item->status == 0)
                                                <span class="badge badge-pill badge-primary">Ditunda </span>
                                                @elseif($item->status == 1)
                                                <span class="badge badge-pill badge-success">Di Upload </span>
                                                @endif
                                            </td>

                                            <td width="25%">
                                                <a href="{{ route('delete.review',$item->id) }}" class="btn btn-danger"
                                                    id="delete">Hapus </a>
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
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
	
</div>
<!-- /.content-wrapper -->

@endsection