<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:web,admin'])->group(function () {

});
