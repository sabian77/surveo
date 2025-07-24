<?php

use Illuminate\Support\Facades\Route;
use App\Models\bidang;

Route::get('/', function () {
    return view('survei', [
        'title' => 'Indeks Kepuasan Masyarakat '
    ]);
});
