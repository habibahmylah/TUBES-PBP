<?php

namespace App\Models;

use App\Http\Controllers\HistoryApplyController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokerModel extends Model
{
    use HasFactory;
    protected $table        = "loker";
    protected $primaryKey   = "idloker";
    protected $fillable     = ['idloker','idperusahaan','nama','tipe','usia_min', 'usia_max', 'gaji_min', 'gaji_max', 'nama_cp', 'email_cp', 'no_telp_cp', 'tgl_update', 'tgl_aktif', 'tgl_tutup', 'status'];

    // Loker.php
    public function applyLoker() {
        return $this->hasMany(HistoryApplyController::class, 'idloker', 'idloker');
    }
}