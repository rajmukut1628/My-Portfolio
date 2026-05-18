<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioContactController;
use App\Http\Controllers\Admin\PortfolioProjectController;
use App\Models\PortfolioProject;
use App\Http\Controllers\Admin\PortfolioDashboardController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\HiddenContactMessageController;




Route::get('/', function () {
    $projects = PortfolioProject::query()
        ->where('is_active', 1)
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->get();

    return view('welcome', compact('projects'));
})->name('home');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/portfolio-dashboard', [PortfolioDashboardController::class, 'index'])
        ->name('portfolio.dashboard');
        Route::get('/dashboard', function () {
    return redirect()->route('admin.portfolio.dashboard');
})->middleware(['auth'])->name('dashboard');

    Route::resource('portfolio-projects', PortfolioProjectController::class);
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.portfolio.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/portfolio-contact', [PortfolioContactController::class, 'send'])
    ->name('portfolio.contact');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/portfolio-dashboard', [PortfolioDashboardController::class, 'index'])
        ->name('portfolio.dashboard');

    Route::resource('portfolio-projects', PortfolioProjectController::class);
    Route::patch('/contact-messages/{message}/read', [ContactMessageController::class, 'markRead'])
    ->name('contact-messages.read');

Route::patch('/contact-messages/{message}/hide', [ContactMessageController::class, 'hide'])
    ->name('contact-messages.hide');

Route::patch('/contact-messages/{message}/unhide', [ContactMessageController::class, 'unhide'])
    ->name('contact-messages.unhide');

Route::delete('/contact-messages/{message}', [ContactMessageController::class, 'destroy'])
    ->name('contact-messages.destroy');
    
    Route::get('/hidden-contact-messages', [HiddenContactMessageController::class, 'index'])
    ->name('hidden-contact-messages.index');
});

require __DIR__.'/auth.php';
