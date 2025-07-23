<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kepuasan extends Model
{
    use HasFactory;

    protected $table = 'kepuasans';
    protected $guarded = ['id'];
}
