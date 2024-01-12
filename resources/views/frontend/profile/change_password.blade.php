@extends('frontend.main_master')
@section('content')
<!-- @php
$user = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp -->

@php

$id = Auth::user()->id;
$user = App\Models\User::find($id);

@endphp

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                    <li class='active'>Ubah Kata Sandi</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="row">
                
                @include('frontend.common.user_sidebar')

                <div class="col-md-10">
                    <div class="sign-in-page" style="margin: 30px;">
                        <div class="card">
                            <h3 class="text-left"><span class="text-danger"> Ubah Kata Sandi</span><strong></strong></h3>
                            <hr>
                            <div class="card-body">
                                <form method="post" action="{{ route('user.password.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Kata Sandi</label>
                                        <input type="password" id="current_password" name="oldpassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Kata Sandi Baru</label>
                                        <input type="password" id="password" name="password" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Konfirmasi Kata Sandi</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection