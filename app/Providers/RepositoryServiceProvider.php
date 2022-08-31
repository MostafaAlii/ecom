<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Http\Repositories;
use App\Http\Interfaces;
class RepositoryServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(Interfaces\CategoryInterface::class, Repositories\CategoryRepository::class);
    }

    public function boot() {
        //
    }
}