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
						<h3 class="box-title">Laporan Pesanan </h3>
					</div>
					<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">No.</th>
                      <th>Tanggal </th>
                      <th>Invoice </th>
                      <th>Total Bayar </th>
                      <th>Metode Bayar </th>
                      <th>Status </th>
											<th width="20%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										@foreach ( $orders as $key => $item )
											<tr>
												<td>{{ $key+1 }}</td>
												<td> {{ $item->order_date }} </td>
                        <td> {{ $item->invoice_no }} </td>
                        <td> Rp{{ number_format($item->amount, 0, '', '.') }} </td>
                        <td> {{ $item->payment_method }} </td>
                        <td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>
                        </td>
                        <td width="25%">
                            <a href="{{ route('pending.order.details',$item->id) }}"class="btn btn-info" title="Edit Data">
															<i class="fa fa-eye"></i>
														</a>

                            <a target="_blank" href="{{ route('invoice.download',$item->id) }}" class="btn btn-danger" title="Invoice Download">
                              <i class="fa fa-download"></i>
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
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
	
</div>
<!-- /.content-wrapper -->

@endsection