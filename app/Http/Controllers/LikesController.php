<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikesModel;
use Illuminate\Support\Facades\DB;

class LikesController extends Controller
{
    public function likestampil(Request $request)
    {
        $query = DB::table("loker")
            ->select("loker.idloker", "loker.idperusahaan", "loker.nama", "loker.tipe", "loker.usia_min", "loker.usia_max", "loker.gaji_min", "loker.gaji_max", "loker.nama_cp", "loker.email_cp", "loker.no_telp_cp", "loker.tgl_update", "loker.tgl_aktif", "loker.tgl_tutup", "loker.status", "loker.jumlah_pelamar",  "loker.jumlah_like", "loker.deskripsi", "loker.pendidikan");
        $loker = $query->paginate(100);

        // Mengambil data apply_loker
        $apply_loker = DB::table('apply_loker')->get();

        // Mengambil data tahapan_apply
        $tahapan_apply = DB::table('tahapan_apply')->get();

        return view('view_likes', ['loker' => $loker, 'apply_loker' => $apply_loker, 'tahapan_apply' => $tahapan_apply]);
    }
}