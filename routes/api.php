<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
// use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Mobile\DashboardController as MobileDashboardController;


// Route::post('/login', function (Request $request) {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => ['The provided credentials are incorrect.'],
//         ]);
//     }

//     // Token create
//     $token = $user->createToken('api-token')->plainTextToken;

//     return response()->json([
//         'token' => $token,
//         'user' => $user,
//     ]);
// });

// Route::middleware(['auth:sanctum'])->get('/dashboard', function () {
//     return view('dashboard'); // Blade view serve કરી શકો છો
// })->name('dashboard');


// Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
//     return $request->user();
// });

// Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin-data', function () {
//     return ['secret' => 'Only admins can see this'];
// });




// Route::middleware(['auth:sanctum','role:admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin.index'); // resources/views/admin/index.blade.php
//     })->name('admin.dashboard');
// });

// Route::middleware(['auth:sanctum','role:user'])->group(function () {
//     Route::get('/user/dashboard', function () {
//         return view('user.index'); // resources/views/user/index.blade.php
//     })->name('user.dashboard');
// });



// Route::middleware(['auth','role:mobile'])->group(function () {
//     Route::get('/mobile/dashboard', [MobileDashboardController::class, 'index'])
//         ->name('mobile.dashboard');
// });

// 🔑 Login API
Route::post('/login', function (Request $request) {
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Invalid credentials.'],
        ]);
    }

    // Sanctum token create
    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'token' => $token,
        'user'  => $user,
    ]);
});

// 🔒 Protected Routes (auth:sanctum required)
Route::middleware(['auth:sanctum'])->group(function () {

    // Common dashboard
    Route::get('/dashboard', function () {
        return response()->json([
            'message' => 'Welcome to API Dashboard',
            'user'    => auth()->user(),
        ]);
    })->name('dashboard');

    // Profile
    Route::get('/profile', function (Request $request) {
        return response()->json($request->user());
    });

    // Admin only
    Route::middleware('role:admin')->get('/admin/dashboard', function () {
        return response()->json([
            'message' => 'Admin Dashboard',
            'user'    => auth()->user(),
        ]);
    })->name('admin.dashboard');

    // User only
    Route::middleware('role:user')->get('/user/dashboard', function () {
        return response()->json([
            'message' => 'User Dashboard',
            'user'    => auth()->user(),
        ]);
    })->name('user.dashboard');

    // Mobile only
    Route::middleware('role:mobile')->get('/mobile/dashboard', function () {
        return response()->json([
            'message' => 'Mobile Dashboard',
            'user'    => auth()->user(),
        ]);
    })->name('mobile.dashboard');
});