@extends('layout.layout')
@section('title', 'SIPERAN')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col">
            <h1 class="text-center">EDIT PROFIL PENGGUNA</h1>
            <hr>
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama' )is-invalid @enderror" placeholder="Nama Lengkap"  value="{{old('nama')}}">
                    @error('nama')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email' )is-invalid @enderror" placeholder="Email"  value="{{old('email')}}">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Kata sandi</label>
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Kata Sandi">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Konfirmasi Kata sandi</label>
                    <input type="password" class="form-control form-control-user" name="password_confirmation" id="exampleRepeatPassword" placeholder="Ulangi Kata Sandi">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto Profil</label>
                    <input type="file" class="form-control-file" name="foto" id="foto">
                </div>
                <a class="btn btn-warning mb-2" href="{{url('/')}}" role="button">Back</a>
                <a class="btn btn-danger mb-2 text-white" onclick="javascript:clearForm();" role="button">Hapus Form</a>
                <button type="submit" class="btn btn-primary mb-2 float-right">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section ('profile')
<li class="nav-item dropdown no-arrow">
    @foreach ($users as $user)
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            {{ $user->name }}
        </span>
        <img class="img-profile rounded-circle"
            src="{{ url('/img/avatar/'.$user->foto) }}">
    </a>
    @endforeach
</li>
@endsection
