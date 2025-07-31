<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kepuasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kepuasan',
        'masukan', 
        'bidang_id',
        'ip_address',    
        'tanggal_isi'    
    ];

    public function bidang()
    {
        return $this->belongsTo(bidang::class);
    }
}
