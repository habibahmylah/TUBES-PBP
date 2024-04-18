<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil database
use Illuminate\Support\Facades\DB;
use App\Models\HistoryApplyModel;

class HistoryApplyController extends Controller
{
    //method untuk menampilkan data history
    public function history1tampil()
    {
        $loker = DB::table('loker')->get();
        $apply_loker = DB::table("apply_loker")->get();    
        $tahap_apply = DB::table("tahapan_apply")->get();
        $tahapan = DB::table("tahapan")->get(); 

        return view('halaman/view_history_apply',['loker'=>$loker,'apply_loker'=>$apply_loker, 'tahapan_apply'=>$tahap_apply, 'tahapan'=>$tahapan]);
    }
}