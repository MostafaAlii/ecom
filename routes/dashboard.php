<?php
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function(){
        Route::prefix('Dashboard')->group(function() {
            Route::get('/', Dashboard\DashboardController::class)->name('dashboard');
        });
        /******************************** End Other Authentication Route ****************** */
});
require __DIR__.'/auth.php';