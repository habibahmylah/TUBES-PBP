<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model Petugas
use App\Models\InterviewModel;

//panggil database
use Illuminate\Support\Facades\DB;

class HistoryInterviewController extends Controller
{
    //method untuk menampilkan data history
    public function history3tampil()
    {
        $loker = DB::table('loker')->get();
        $apply_loker = InterviewModel::with('tahapanApply')->get();
        $tahap_apply = DB::table("tahapan_apply")->get();
        $tahapan = DB::table("tahapan")->get(); 

        return view('halaman/view_history_interview',['loker'=>$loker,'apply_loker'=>$apply_loker, 'tahapan_apply'=>$tahap_apply, 'tahapan'=>$tahapan]);
    }
}