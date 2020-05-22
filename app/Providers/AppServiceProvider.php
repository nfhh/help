<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
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
        View::share('lans', [
            'en-us' => 'English',
            'de-de' => 'Deutsch',
            'fr-fr' => 'Français',
            'es-es' => 'Español',
            'it-it' => 'Italiano',
            'hu-hu' => 'Magyar',
            'pl-pl' => 'Polski',
            'tr-tr' => 'Türk dili',
            'zh-cn' => '简体中文/中国',
            'zh-hk' => '繁體中文',
            'ja-jp' => '日本語',
            'ko-kr' => '한국어/한국',
        ]);

        $lan = $_COOKIE['lan'] ?? 'zh-cn';
        View::share('lan', $lan);
        App::setLocale($lan);
    }
}
