@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- Basic Forms -->
          <div class="box">
            <div class="box-header with-border">
              <h4 class="box-title">Ubah Password</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col">
                    <form method="post" action="{{ route('update.change.password')}}">
                     @csrf
                      <div class="row">
                        <div class="col-12">	
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>Kata Sandi Saat Ini <span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="password" id="current_password" type="password" name="oldpassword" class="form-control" required="" placeholder="Kata sandi saat ini">
                                         </div>
                                     </div>
                                </div>
                             </div>					
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>Kata Sandi Baru <span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="password" id="password" name="password" class="form-control" required="" placeholder="Kata sandi baru">
                                         </div>
                                     </div>
                                </div>
                             </div>					
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                         <h5>Konfirmasi Kata Sandi <span class="text-danger">*</span></h5>
                                         <div class="controls">
                                             <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" placeholder="Konfirmasi kata sandi">
                                         </div>
                                     </div>
                                </div>
                            </div>		
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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
        </div>
      </div>
    </section>
    <!-- /.content -->
    
  </div>
  @endsection