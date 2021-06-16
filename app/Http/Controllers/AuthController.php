<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Mahasiswa;
use GuzzleHttp\RetryMiddleware;

class AuthController extends Controller
{

    public function welcome()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('mahasiswas.index');
        }
        $mahasiswas = Mahasiswa::all();
        return view('welcome',['mahasiswas' => $mahasiswas]);
    }

    public function showFormLogin(){
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('mahasiswas.index');
        } else { // false
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }

    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'foto'                  => 'required|file|image|max:5000'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'file'                  => ':attribute harus diisi dengan file',
            'image'                 => ':attribute harus berupa gambar',
            'foto.required'         => 'Foto profil harus diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();

        //avatar
        $file = $request->foto;
        $extension = $file->getClientOriginalExtension();
        $filename = 'mhs-'.time() . '.' . $extension;
        $file->move(public_path().'/img/avatar',$filename);
        $user->foto = $filename;

        $simpan = $user->save();

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }

    public function editprofil (Request $request, Mahasiswa $mahasiswa) {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'foto'                  => 'required|file|image|max:5000'
        ];

        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'file'                  => ':attribute harus diisi dengan file',
            'image'                 => ':attribute harus berupa gambar',
            'foto.required'         => 'Foto profil harus diisi'
        ];

        $user = User::find($user->id);
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();

        //avatar
        $file = $request->foto;
        $extension = $file->getClientOriginalExtension();
        $filename = 'mhs-'.time() . '.' . $extension;
        $file->move(public_path().'/img/avatar',$filename);
        $user->foto = $filename;

        $simpan = $user->save();

        if($simpan){
            Session::flash('success', 'Update Profil berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('mahasiswas.index');
        } else {
            Session::flash('errors', ['' => 'Update Profil gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('mahasiswas.index');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('welcome');
    }


}
