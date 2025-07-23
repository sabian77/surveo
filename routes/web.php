<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('survei', [
        'title' => 'Indeks Kepuasan Masyarakat wle'
    ]);
});
