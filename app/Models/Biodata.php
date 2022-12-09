<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id', 'tahun_lapor', 'tgl_kunjungan', 'no_rekamedik', 'no_reg_nas', 'no_telp', 'tgl_lahir', 'jk', 'pekerjaan', 'pendidikan'
    ];

    public $timestamps = false;

    public function pasien()
    {
        return $this->belongsTo(User::class);
    }
}
