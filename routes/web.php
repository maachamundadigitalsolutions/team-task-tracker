<?php

use Illuminate\Support\Facades\Route;

Route::view('/{any}', 'admin.index')->where('any', '.*');
