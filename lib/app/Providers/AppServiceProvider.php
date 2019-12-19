<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $data['categories'] = Category::all();
        view()->share($data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind('path.public', function () {
        //     $p = base_path();
        //     $arr = explode(DIRECTORY_SEPARATOR, $p);
        //     array_pop($arr);
            
        //     return implode(DIRECTORY_SEPARATOR, $arr);
        // });
    }
}
