<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewModel extends Model
{
    use HasFactory;

    protected $table = "apply_loker";
    protected $primaryKey = "idapply";

    protected $fillable = [
        'idapply',
        'idloker',
        'noktp',
        'tgl_apply',
        'idtahapan',
        'idnilai',
    ];

    // Define the "tahapanApply" relationship
    public function tahapanApply() {
        return $this->belongsTo(InterviewModel::class);
    }
}