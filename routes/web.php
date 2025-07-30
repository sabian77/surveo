<?php

use App\Models\bidang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveiController;

Route::get('/', function () {
    return view('survei', [
        'title' => 'Indeks Kepuasan Masyarakat '
    ]);
});

Route::post('/', [SurveiController::class, 'store']);

Route::get('/result', function () {
    return view('result', [
        'title' => 'Indeks Kepuasan Masyarakat ',
    ]);
});

