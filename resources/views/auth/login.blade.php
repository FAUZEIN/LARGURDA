@extends('frontend.main_master')

@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Masuk/Daftar</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="sign-in-page">
                    <div class="row">
                        <!-- Sign-in -->	
                        
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
        
                        <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                            <div class="col-md-12 col-sm-12 sign-in">
                                <h4 class="text-center">LOGIN</h4>
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="email">Email <span>*</span></label>
                                    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" >
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password">Kata Sandi <span>*</span></label>
                                    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="password" >
                                </div>
                                <div class="radio outer-xs">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Ingat saya!
                                    </label>
                                    <a href="{{ route('password.request') }}" class="forgot-password pull-right">Lupa kata sandi?</a>
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Masuk</button>
                            </div>
                            <!-- Sign-in -->			
                        </form>					
                    </div><!-- /.row -->
                </div><!-- /.sigin-in-->
            </div>
            <div class="col-md-6" style="margin-bottom: 50px">
                <div class="sign-in-page">
                    <div class="row">
        
                        <!-- create a new account -->
                        <div class="col-md-12 col-sm-12 create-new-account">
                            <h4 class="checkout-subtitle text-center">DAFTAR</h4>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label class="info-title" for="name">Nama <span>*</span></label>
                                    <input type="text" id="name" name="name" class="form-control unicase-form-control text-input" id="name" >
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="email">Email <span>*</span></label>
                                    <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" id="email" >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="phone">Nomor Telepon <span>*</span></label>
                                    <input type="text" id="phone" name="phone"  class="form-control unicase-form-control text-input" id="phone" >
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password">Kata Sandi <span>*</span></label>
                                    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="password" >
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="password_confirmation">Konfirmasi Kata Sandi <span>*</span></label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input" id="password_confirmation" >
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Daftar</button>
                            </form>
                            
                            
                        </div>	
                        <!-- create a new account -->			
                    </div><!-- /.row -->
                </div><!-- /.sigin-in-->
            </div>
        </div>
    </div>
</div>
@endsection
