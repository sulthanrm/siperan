@extends('layout.layout')
@section('title', 'SIPERAN')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col">
            <h1>Informasi Profil Penerima</h1>
            <hr>
            <form action="{{ route('mahasiswas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama' )is-invalid @enderror" placeholder="Nama Lengkap"  value="{{ Auth::user()->name }}" readonly>
                    @error('nama')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control @error('email' )is-invalid @enderror" placeholder="Email"  value="{{ Auth::user()->email }}">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control @error('nik' )is-invalid @enderror" placeholder="NIK"  value="{{old('nik')}}">
                    @error('nik')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="lk" value="L" {{old('jenis_kelamin')=='L'?'checked':''}}>
                            <label class="form-check-label" for="lk">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="pr" value="P" {{old('jenis_kelamin')=='P'?'checked':''}}>
                            <label class="form-check-label" for="pr">Perempuan</label>
                        </div>
                    </div>
                    @error('jenis_kelamin')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3">{{old('alamat')}}</textarea>
                    @error('alamat')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="kategori">Status Bantuan</label>
                    <input type="text" name="kategori" id="kategori" class="form-control @error('kategori' )is-invalid @enderror" value="Dalam proses" readonly>
                </div>

                <div class="form-group">
                    <label for="listbarang">Bantuan yang Diterima</label>
                    <input type="text" name="listbarang" id="listbarang" class="form-control @error('listbarang' )is-invalid @enderror" value="-" readonly>
                </div>

                <a class="btn btn-warning mb-2" href="{{url('/')}}" role="button">Kembali</a>
                <a class="btn btn-danger mb-2 text-white" onclick="javascript:clearForm();" role="button">Hapus Form</a>
                <button type="submit" class="btn btn-primary mb-2 float-right">Kirim</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function clearForm() {
        document.getElementById("nama").value = "";
        document.getElementById("nik").value = "";
        document.getElementById("email").value = "";
        document.getElementById("alamat").value = "";
        document.getElementById("foto").value = "";
        document.getElementById("lk").value = "";
        document.getElementById("pr").value = "";
	}
</script>

@endsection
