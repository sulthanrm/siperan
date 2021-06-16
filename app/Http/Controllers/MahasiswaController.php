<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;
use Validator;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function index(){
        // $this->authorize('akses_admin', User::class);
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index',[
            'users' => $users,
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'nik' => 'required|size:16',
            'nama' => 'required|min:3|max:50',
            'email' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'alamat' => 'required',
            'kategori' => 'required',
            'listbarang' => 'required',
            'foto' => 'file|image|max:5000',
        ],
        [
            'required' => ':attribute wajib diisi',
            'size' => ':attribute harus berukuran :size karakter',
            'unique' => ':attribute sudah pernah dipakai',
            'min' => ':attribute minimal 3 karakter',
            'max' => ':attribute maksimal 50 karakter',
            'file' => ':attribute harus diisi dengan file',
            'image' => ':attribute harus berupa gambar',
        ]);
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nik = $validateData['nik'];
        $mahasiswa->nama = $validateData['nama'];
        $mahasiswa->email = $validateData['email'];
        $mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $mahasiswa->alamat = $validateData['alamat'];
        $mahasiswa->kategori = $validateData['kategori'];
        $mahasiswa->listbarang = $validateData['listbarang'];
        // $file = $validateData['foto'];
        // $extension = $file->getClientOriginalExtension();
        // $filename = 'berkas-'. Auth::user()->name . '-' . time() . '.' . $extension;
        // $file->move(public_path().'/img',$filename);
        // $mahasiswa->foto = $filename;
        $mahasiswa->save();

        return redirect()->route('siperan.pengajuan')->with('pesan',"Perintah berhasil dilakukan");
    }
    public function pengajuanmember(){
        $users = User::all();
        $mahasiswas = Mahasiswa::where('email', Auth::user()->email)->get();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function pengajuan(){
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function show($id){
        $users = User::all();
        $mahasiswas = Mahasiswa::where('id', $id)->get();
        return view('show',[
            'users' => $users,
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function edit(Mahasiswa $mahasiswa){
        return view('edit',['mahasiswa'=>$mahasiswa]);
        // $mahasiswas = Mahasiswa::all();
        // return view('edit',[
        //     'mahasiswa' => $mahasiswa
        // ]);
    }
    public function destroy(Mahasiswa $mahasiswa){
        $mahasiswa->delete();
        return redirect()->route('siperan.pengajuan')->with('pesandua',"Hapus data $mahasiswa->nama berhasil");
    }
    public function search(Request $request){
        $users = User::all();
        $cari = $request->search;
        $result = Mahasiswa::where('nama', 'like', "%".$cari."%")->paginate();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $result
        ]);
    }
    public function update(Request $request, Mahasiswa $mahasiswa){
        $validateData = $request->validate([
            'nik' => 'required|size:16',
            'nama' => 'required|min:3|max:50',
            'email' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'alamat' => 'required',
            'kategori' => 'required',
            'listbarang' => 'required',
            'foto' => 'file|image|max:5000',
        ],
        [
            'required' => ':attribute wajib diisi',
            'size' => ':attribute harus berukuran :size karakter',
            'unique' => ':attribute sudah pernah dipakai',
            'min' => ':attribute minimal 3 karakter',
            'max' => ':attribute maksimal 50 karakter',
            'file' => ':attribute harus diisi dengan file',
            'image' => ':attribute harus berupa gambar',
        ]);
        $mahasiswa = Mahasiswa::find($mahasiswa->id);
        $mahasiswa->nik = $validateData['nik'];
        $mahasiswa->nama = $validateData['nama'];
        $mahasiswa->email = $validateData['email'];
        $mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $mahasiswa->alamat = $validateData['alamat'];
        $mahasiswa->kategori = $validateData['kategori'];
        $mahasiswa->listbarang = $validateData['listbarang'];

        if($request->hasFile('foto')){
            $validateData = $request->validate([
                'foto' => 'required|file|image|max:5000',
            ],
            [
                'required' => ':attribute wajib diisi',
                'max' => ':attribute maksimal 50 karakter',
                'file' => ':attribute harus diisi dengan file',
                'image' => ':attribute harus berupa gambar',
            ]);
            $file = $validateData['foto'];
            $extension = $file->getClientOriginalExtension();
            $filename = 'berkas-'. Auth::user()->name . '-' . time() . '.' . $extension;
            $file->move(public_path().'/img',$filename);
            $mahasiswa->foto = $filename;
        }
        $mahasiswa->save();

        return redirect()->route('siperan.pengajuan')->with('pesan',"Update berhasil dilakukan");
        // return redirect()->route('mahasiswas.show',['mahasiswa'=>$mahasiswa->id])->with('pesan',"Update data {$request->nama} berhasil");
    }
    public function sortykategori(){
        $users = User::all();
        $result = Mahasiswa::orderBy('kategori', 'asc')->get();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $result
        ]);
    }
    public function sortytanggal(){
        $users = User::all();
        $result = Mahasiswa::orderBy('created_at', 'asc')->get();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $result
        ]);
    }
    public function sortynama(){
        $users = User::all();
        $result = Mahasiswa::orderBy('nama', 'asc')->get();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $result
        ]);
    }
    public function delete(){
        $result = DB::statement("truncate mahasiswas");
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        return redirect()->route('siperan.pengajuan')->with('pesandua',"Semua data berhasil dihapus!");
    }
}
