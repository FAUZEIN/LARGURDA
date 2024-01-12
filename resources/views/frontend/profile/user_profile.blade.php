@extends('frontend.main_master') @section('content') @php $id =
Auth::user()->id; $user = App\Models\User::find($id); @endphp

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li class='active'>Profil Saya</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">

			@include('frontend.common.user_sidebar')
            
            <div class="col-md-10">
                <div class="sign-in-page" style="margin-bottom: 30px; padding: 10px 30px">
                    <div class="card">
                        <h3 class="text-left">
                            Profil Saya
                        </h3>
                        <hr>
                        <div class="card-body">
                            <form method="post" action="{{ route('user.profile.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row px-3 py-4 ">
                                    <div class="col-md-8">
                                        <div class="form-group pb-2">
                                            <label class="info-title" for="exampleInputEmail1">Nama</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label class="info-title" for="exampleInputEmail1">Email</label>
                                            <input type="email" id="email" name="email" class="form-control"
                                                value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label class="info-title" for="exampleInputEmail1">Nomor Telepon</label>
                                            <input type="text" id="phone" name="phone" class="form-control"
                                                value="{{ $user->phone }}">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label class="info-title" for="exampleInputEmail1">Kode Pos</label>
                                            <input type="text" id="post_code" name="post_code" class="form-control"
                                                value="{{ $user->post_code }}" placeholder="40973">
                                        </div>
                                        <div class="form-group pb-2">
                                            <label class="" for="alamat">Alamat <span> </span></label>
                                            <textarea name="address" id="alamat" class="form-control"
                                                placeholder="Jl. Babakantiga No.82 Ciwidey" cols="10"
                                                rows="5">{!! $user->address !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group pb-2">
                                            <img id="showImage" class="img-fluid my-3 mx-auto d-block"
                                                src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}"
                                                style="width: 270px">
                                            <input type="file" id="profileImage" name="profile_photo_path"
                                                class="form-control" style="margin-top: 15px">
                                        </div>
                                        <div class="form-group" style="margin-top: 10px">
                                            <button type="submit" class="btn btn-danger">Edit Profil</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection