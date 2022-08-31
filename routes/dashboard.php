<?php
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function(){
        /******************************** Admin Routes ****************** */
        Route::prefix('Dashboard')->middleware(['auth'])->group(function() {
            Route::get('/', Dashboard\DashboardController::class)->name('dashboard');
            Route::resource('Categories', Dashboard\CategoryController::class);
        });
        /******************************** End Other Authentication Route ****************** */
        require base_path('routes/auth.php');
});