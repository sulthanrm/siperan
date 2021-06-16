@extends('layout.layout')
@section('title', 'SIPERAN')

@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-12">


    @if(session()->has('pesan'))
      <div class="alert alert-success">
        {{ session()->get('pesan') }}
      </div>
    @endif

    @if(session()->has('pesandua'))
      <div class="alert alert-danger">
        {{ session()->get('pesandua') }}
      </div>
    @endif

    <table class="table table-striped">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Status Bantuan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($mahasiswas as $mahasiswa)
        <tr class="text-center">
          <td>
              {{$mahasiswa->id}}
          </td>
          <td>
              {{$mahasiswa->nama}}
          </td>
          <td>
              {{$mahasiswa->alamat}}
          </td>
          <td>
            {{$mahasiswa->kategori}}
          </td>
          <td class="form-check form-check-inline">
            @can('akses_admin', \App\Models\User::class)
                <a href="{{ route('mahasiswas.edit',['mahasiswa'=>$mahasiswa->id]) }}" class="btn btn-warning fas fa-edit"></a>
            @endcan
              <a href="/mahasiswas/{{ $mahasiswa->id }}" class="btn btn-success fas fa-user"></a>
              {{-- <form action="{{ route('mahasiswas.destroy',['mahasiswa'=>$mahasiswa->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger fas fa-trash-alt"></button>
              </form> --}}
          </td>
      <tr>
      @empty
      @endforelse
    </table>
    </div>
  </div>
</div>

@endsection

@section('profile')
<li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="/siperan" id="userDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
        {{ Auth::user()->name }}
        </span>
        <img class="img-profile rounded-circle" src="{{ url('/img/avatar/'. Auth::user()->foto )}}">
    </a>
</li>
@endsection
