@extends('layout.layout')
@section('title', 'SIPERAN')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col">
            <h1 class="text-center">EDIT PROFIL</h1>
            <hr>
            <form action="{{ route('siperan.editprofil',['user'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama' )is-invalid @enderror" placeholder="Nama Lengkap" value="{{old('nama') ?? $mahasiswa->nama}}" readonly>
                    @error('nama')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email' )is-invalid @enderror" placeholder="Email" value="{{old('email') ?? $mahasiswa->email}}">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="foto">Foto Profil</label>
                    <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" id="foto" value="{{old('foto')}}">
                    @error('foto')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <a class="btn btn-warning mb-2" href="/siperan" role="button">Kembali</a>
                <a class="btn btn-danger mb-2 text-white" onclick="javascript:clearForm();" role="button">Hapus Form</a>
                <button type="submit" class="btn btn-primary mb-2 float-right">Kirim</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function clearForm() {
        document.getElementById("nama").value       = "";
        document.getElementById("nik").value        = "";
        document.getElementById("email").value      = "";
        document.getElementById("alamat").value     = "";
        document.getElementById("foto").value       = "";
        document.getElementById("lk").value         = "";
        document.getElementById("pr").value         = "";
        document.getElementById("kategori").value   = "";
	}
</script>
@endsection
