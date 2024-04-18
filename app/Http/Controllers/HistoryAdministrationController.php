<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model Administration
use App\Models\AdministrationModel;

//panggil database
use Illuminate\Support\Facades\DB;

class HistoryAdministrationController extends Controller
{
    //method untuk menampilkan data history
    public function history2tampil()
    {
        $loker = DB::table('loker')->get();
        $apply_loker = DB::table("apply_loker")->get();    
        $tahap_apply = DB::table("tahapan_apply")->get();
        $tahapan = DB::table("tahapan")->get(); 

        return view('halaman/view_history_administration',['loker'=>$loker,'apply_loker'=>$apply_loker, 'tahapan_apply'=>$tahap_apply, 'tahapan'=>$tahapan]);
    }
}