<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/buttons', function () {
    return Inertia::render('Buttons', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('buttons');

Route::get('/alerts', function () {
    return Inertia::render('Alerts', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('alerts');

Route::get('/listbox', function () {
    return Inertia::render('Listbox', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('listbox');

Route::get('/avatar', function () {
    return Inertia::render('Avatar', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('avatar');

Route::get('/dropdown', function () {
    return Inertia::render('Dropdown', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('dropdown');

Route::get('/paginate', function () {
    return Inertia::render('Pagination', [
        'users' => User::paginate(10),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('paginate');

Route::get('/toast', function () {
    return Inertia::render('ToastList', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('toast');

Route::post('/test-submit', function() {
    return redirect()->back()->with('toast', 'Toast endpoint!');
});

Route::get('/form', function () {
    return Inertia::render('ReuseForm', [
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('form');

//ContactsController =>
Route::controller(ContactsController::class)
    ->group(function () {
        Route::get('/contact', 'index')->name('contacts');
        // Route::post('/login-authen', 'login_authen')->name('login_authen');
        // Route::get('/logout', 'destroy')->name('logout');
        //Route::get('/login-as/{name}','loginAs')->name('login_as');
    });

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
