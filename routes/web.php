<?php

use App\Models\bidang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveiController;
use App\Http\Middleware\CheckSurveyCompleted;

Route::get('/', function () {
    return view('survei', [
        'title' => 'Indeks Kepuasan Masyarakat '
    ]);
});

Route::post('/', [SurveiController::class, 'store']);



Route::get('/result', [SurveiController::class, 'index'])->middleware(CheckSurveyCompleted::class);

