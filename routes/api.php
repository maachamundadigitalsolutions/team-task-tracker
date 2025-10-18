<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Mobile\DashboardController as MobileDashboardController;


Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    // Token create
    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user' => $user,
    ]);
});

Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin-data', function () {
    return ['secret' => 'Only admins can see this'];
});

// Route::middleware('auth:sanctum')->get('/dashboard', function () {
//     return response()->json(['message' => 'Welcome to API Dashboard']);
// });


Route::middleware(['auth:sanctum','role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index'); // resources/views/admin/index.blade.php
    })->name('admin.dashboard');
});

Route::middleware(['auth:sanctum','role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.index'); // resources/views/user/index.blade.php
    })->name('user.dashboard');
});



Route::middleware(['auth','role:mobile'])->group(function () {
    Route::get('/mobile/dashboard', [MobileDashboardController::class, 'index'])
        ->name('mobile.dashboard');
});

