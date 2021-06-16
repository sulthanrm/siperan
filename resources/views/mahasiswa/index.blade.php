@extends('layout.layout')
@section('title', 'SIPERAN')

@section('content')
<div class="jumbotron" >
    <div class="container">
        <div class="row">
            <div class="col-7">
                <h1 class="display-4">Selamat Datang, {{ Auth::user()->name }}</h1>
                <p class="lead">Silahkan akses menu disamping untuk melakukan tracking bantuan.</p>
                <hr class="my-4">
            </div>
            <div class="col-5 text-center" >
                <p></p>
                <img src="assets/img/Lambang.png" alt="image" height="200" width="398" >
            </div>
        </div>
    </div>
</div>
@endsection

@section ('profile')
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
            {{ Auth::user()->name }}
        </span>
        <img class="img-profile rounded-circle" src="{{ url('/img/avatar/'. Auth::user()->foto )}}">
    </a>
</li>
@endsection
