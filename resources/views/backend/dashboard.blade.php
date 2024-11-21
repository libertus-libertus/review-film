@extends('backend.layouts.master')
@section('title')
@auth
Bantuan
@else
LINStation
@endauth
@endsection

@section('subTitle')
Bantuan
@endsection

@section('content')
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-xs-12">
            <p>Untuk melihat lebih jauh terkait bagaimana cara melakukan review film di website kami (website LINStation), maka Anda terlebih dahulu <strong>LOGIN</strong> atau <strong>DAFTAR</strong> sebagai user baru di platform kami.</p>

            <h4>Cara daftar di platform LINStation</h4>
            <ol>
                <li>Klik tombol daftar atau klik <a href="{{ route('register') }}">Daftar disini</a> untuk kemudian diarahkan ke halaman daftar</li>
                <li>Untuk datanya sendirinya bisa disesuaikan dengan permintaan form yang diminta</li>
                <li>Pastikan seluruh data dan password anda benar dan tidak keliru</li>
                <li>Seteleh semuanya berhasil di register, maka akan diarahkan secara otomatis di halaman beranda yang berbeda dengan halaman sebelumnya saat masih menjadi pengunjung biasa.</li>
            </ol>

            <h4>Cara login di platform LINStation</h4>
            <ol>
                <li>Klik tombol login atau klik <a href="{{ route('login') }}">Login disini</a> untuk kemudian diarahkan ke halaman login</li>
                <li>Untuk datanya sendiri hanya dibutuhkan email dan password saja.</li>
                <li>Tapi untuk email dan password, gunakan email dan password yang Anda registrasikan</li>
                <li>Seteleh semuanya berhasil di inputkan, maka tekan tombol login agar diarahkan secara otomatis di halaman beranda yang berbeda dengan halaman sebelumnya saat masih menjadi pengunjung biasa.</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
