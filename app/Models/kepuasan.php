<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kepuasan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function bidang()
    {
        return $this->belongsTo(bidang::class);
    }
}
