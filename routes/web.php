<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\StudyTrackController;
use App\Models\StudyTrack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('throttle:5,1');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        $query = StudyTrack::query();

        if (! $request->user()->isAdmin()) {
            $query->whereBelongsTo($request->user());
        }

        $tracks = $query->latest()->get();

        return view('dashboard', [
            'total' => $tracks->count(),
            'active' => $tracks->where('status', 'active')->count(),
            'completed' => $tracks->where('status', 'completed')->count(),
            'latestTracks' => $tracks->take(3),
        ]);
    })->name('dashboard');
    Route::resource('study-tracks', StudyTrackController::class);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
