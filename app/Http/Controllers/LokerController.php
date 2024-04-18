<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokerModel;
use Illuminate\Support\Facades\DB;

class LokerController extends Controller
{
    public function filterLoker(Request $request)
    {
        // Proses filter data loker di sini
        $minAge = $request->input('min_age');
        $maxAge = $request->input('max_age');
        $minSalary = $request->input('min_salary');
        $maxSalary = $request->input('max_salary');
        $pendidikan = $request->input('pendidikan');

        $query = DB::table("loker")
            ->select("loker.idloker", "loker.idperusahaan", "loker.nama", "loker.tipe", "loker.usia_min", "loker.usia_max", "loker.gaji_min", "loker.gaji_max", "loker.nama_cp", "loker.email_cp", "loker.no_telp_cp", "loker.tgl_update", "loker.tgl_aktif", "loker.tgl_tutup", "loker.status", "loker.jumlah_pelamar",  "loker.jumlah_like", "loker.deskripsi","loker.pendidikan");

        if (!empty($minAge)) {
            $query->where('usia_min', '>=', $minAge);
        }

        if (!empty($maxAge)) {
            $query->where('usia_max', '<=', $maxAge);
        }

        if (!empty($minSalary)) {
            $query->where('gaji_min', '>=', $minSalary);
        }

        if (!empty($maxSalary)) {
            $query->where('gaji_max', '<=', $maxSalary);
        }
        
        if (!empty($pendidikan)) {
            $query->where('pendidikan', '=', $pendidikan);
        }

        $filteredlokerCount = $query->count();
        $filteredLoker = $query->paginate($filteredlokerCount);

        return view('halaman.filter_loker', ['filteredLoker' => $filteredLoker]);
    }

    public function filterLoker2(Request $request)
    {
        // Proses filter data loker di sini
        $minAge = $request->input('min_age');
        $maxAge = $request->input('max_age');
        $minSalary = $request->input('min_salary');
        $maxSalary = $request->input('max_salary');
        $pendidikan = $request->input('pendidikan');

        $query = DB::table("loker")
            ->select("loker.idloker", "loker.idperusahaan", "loker.nama", "loker.tipe", "loker.usia_min", "loker.usia_max", "loker.gaji_min", "loker.gaji_max", "loker.nama_cp", "loker.email_cp", "loker.no_telp_cp", "loker.tgl_update", "loker.tgl_aktif", "loker.tgl_tutup", "loker.status", "loker.jumlah_pelamar",  "loker.jumlah_like", "loker.deskripsi","loker.pendidikan");

        if (!empty($minAge)) {
            $query->where('usia_min', '>=', $minAge);
        }

        if (!empty($maxAge)) {
            $query->where('usia_max', '<=', $maxAge);
        }

        if (!empty($minSalary)) {
            $query->where('gaji_min', '>=', $minSalary);
        }

        if (!empty($maxSalary)) {
            $query->where('gaji_max', '<=', $maxSalary);
        }
        
        if (!empty($pendidikan)) {
            $query->where('pendidikan', '=', $pendidikan);
        }

        $filteredlokerCount = $query->count();
        $filteredLoker = $query->paginate($filteredlokerCount);

        return view('Pengunjung.filter_loker', ['filteredLoker' => $filteredLoker]);
    }

    public function lokertampil(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table("loker")
            ->select("loker.idloker", "loker.idperusahaan", "loker.nama", "loker.tipe", "loker.usia_min", "loker.usia_max", "loker.gaji_min", "loker.gaji_max", "loker.nama_cp", "loker.email_cp", "loker.no_telp_cp", "loker.tgl_update", "loker.tgl_aktif", "loker.tgl_tutup", "loker.status", "loker.jumlah_pelamar",  "loker.jumlah_like", "loker.deskripsi", "loker.pendidikan");

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $lokerCount = $query->count();

        $loker = $query->paginate($lokerCount);

        // Mengambil data apply_loker
        $apply_loker = DB::table('apply_loker')->get();

        // Mengambil data tahapan_apply
        $tahapan_apply = DB::table('tahapan_apply')->get();

        return view('halaman.view_loker', ['loker' => $loker, 'search' => $search, 'apply_loker' => $apply_loker, 'tahapan_apply' => $tahapan_apply]);
    }

    public function lokertampil2(Request $request)
    {
        $search = $request->input('search');

        $query = DB::table("loker")
            ->select("loker.idloker", "loker.idperusahaan", "loker.nama", "loker.tipe", "loker.usia_min", "loker.usia_max", "loker.gaji_min", "loker.gaji_max", "loker.nama_cp", "loker.email_cp", "loker.no_telp_cp", "loker.tgl_update", "loker.tgl_aktif", "loker.tgl_tutup", "loker.status", "loker.jumlah_pelamar",  "loker.jumlah_like", "loker.deskripsi", "loker.pendidikan");

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $lokerCount = $query->count(); // Menghitung jumlah baris yang ditemukan

        $loker = $query->paginate($lokerCount); // Menggunakan hasil perhitungan di atas untuk pagination

        // Mengambil data apply_loker
        $apply_loker = DB::table('apply_loker')->get();

        // Mengambil data tahapan_apply
        $tahapan_apply = DB::table('tahapan_apply')->get();

        return view('Pengunjung.view_loker', ['loker' => $loker, 'search' => $search, 'apply_loker' => $apply_loker, 'tahapan_apply' => $tahapan_apply]);
    }
}
