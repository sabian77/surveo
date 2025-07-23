<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bidang extends Model
{
    use HasFactory;
    
    protected $table = 'bidangs';
    protected $guarded = ['id'];

    public function kepuasan()
    {
        return $this->hasMany(kepuasan::class);
    }

}
