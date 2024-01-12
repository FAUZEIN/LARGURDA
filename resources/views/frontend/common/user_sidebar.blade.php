@php

$id = Auth::user()->id;
$user = App\Models\User::find($id);

@endphp

<div class="col-md-2"><br>
    <img class="card-img-top" style="border-radius: 50%"
        src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg') }}"
        height="100%" width="100%"><br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Beranda</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profil Saya</a>
        <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Ubah Kata Sandi
        </a>
        <a href="{{ route('my.orders') }}" class="btn btn-primary btn-sm btn-block">Data Transaksi</a>
        <a href="{{ route('cancel.orders') }}" class="btn btn-primary btn-sm btn-block">Pembatalan</a>
        <a href="{{ route('return.order.list') }}" class="btn btn-primary btn-sm btn-block">Pengembalian</a>
       
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Keluar</a>
    </ul>
</div> <!-- // end col md 2 -->