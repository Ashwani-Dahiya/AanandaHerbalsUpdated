<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyDetailsController;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $controller = new CompanyDetailsController();
        $data = $controller->getDataToShare();
        view()->share($data);




        View::composer('*', function ($view) {
            $request = app('request');
            $authController = new AuthController();
            $count = $authController->item_count($request);
            $view->with('cartCount', $count);
        });
        // View::composer('*', function ($view) {
        //     View::composer('*', function ($view) {
        //     $productController= new productController();
        //         $search = $productController->index();
        //         $view->with('cartCount', $search);
        //     });
        // });
    }
}
