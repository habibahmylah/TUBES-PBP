<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Pencaker;
use App\Models\Users;
use App\Models\LokerModel;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pencaker = Pencaker::find($user->noktp);
        return view('halaman.apply',['pencaker'=> $pencaker]);
    }

    public function apply(Request $request)
    {
    
        // Validasi data yang masuk dari formulir
        $request->validate([
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'no_telp' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'tgl_daftar' => 'required',
            'file_ktp' => 'required|file|mimes:pdf',
        ]);
        // Proses penyimpanan data pendaftaran pekerjaan dan file terkait
        $user = Auth::user();
    
        // Simpan data ke dalam tabel Pencaker
        $pencaker = Pencaker::updateOrCreate(
            ['noktp' => $user->noktp],
            [
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'no_telp' => $request->no_telp,
                'tgl_daftar' => $request->tgl_daftar,
                // Jika perlu, tambahkan kolom lain yang sesuai dengan tabel Pencaker
            ]
        );
    
        // Simpan file terkait, seperti foto dan file KTP
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto_directory');
            $pencaker->foto = $fotoPath;
        }
    
        if ($request->hasFile('file_ktp')) {
            $ktpPath = $request->file('file_ktp')->store('ktp_directory');
            $pencaker->file_ktp = $ktpPath;
        }
    
        $pencaker->save();
        // $loker = LokerModel::find($request->idloker);
        // $pencaker->applyLoker()->attach($loker);
    
        // Setelah data disimpan, Anda dapat mengembalikan respons atau mengarahkan pengguna ke halaman lain
        return redirect('/home')->with('success', 'Registration successful! Please login');
    }
}
