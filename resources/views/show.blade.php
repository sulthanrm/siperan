@extends('layout\layout')
@section('title', 'SIPERAN')

@section('content')
<div class="container m-4">
    <h1>DETAIL</h1>
    @forelse($mahasiswas as $mahasiswa)
    <table class="table text-left">
        <tbody>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{$mahasiswa->nik}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{$mahasiswa->nama}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{$mahasiswa->email}}</td>
            </tr>
            <tr>
                <td>Jenis kelamin</td>
                <td>:</td>
                <td>{{$mahasiswa->jenis_kelamin}}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{$mahasiswa->alamat}}</td>
            </tr>
            <tr>
                <td>Status Bantuan</td>
                <td>:</td>
                <td>{{$mahasiswa->kategori}}</td>
            </tr>
            <tr>
                <td>Bantuan yang akan diterima</td>
                <td>:</td>
                <td>{{$mahasiswa->listbarang}}</td>
            </tr>
        </tbody>
    </table>
    @empty
    @endforelse
    <a href="/siperan" class="btn btn-primary text-center">Kembali</a>
</div>
@endsection

@section('profile')
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            {{ Auth::user()->name }}
        </span>
        <img class="img-profile rounded-circle" src="{{ url('/img/avatar/'. Auth::user()->foto )}}">
    </a>
</li>
@endsection
