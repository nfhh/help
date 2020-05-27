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
            'en-us' => 'English/Global',
            'de-de' => 'Deutsch/Deutschland',
            'fr-fr' => 'Français/France ',
            'es-es' => 'Español/España',
            'it-it' => 'Italiano/Italia',
            'hu-hu' => 'Magyar',
            'pl-pl' => 'Polski',
            'tr-tr' => 'Türk dili',
            'zh-cn' => '简体中文/中国',
            'zh-hk' => '繁體中文/中国',
            'ja-jp' => '日本語/日本',
            'ko-kr' => '한국어/한국',
        ]);

        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            $lans = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $lan = substr($lans, 0, strpos($lans, ','));
            switch ($lan) {
                case 'en':
                    $lan = 'en-us';
                    break;
                case 'de':
                    $lan = 'de-de';
                    break;
                case 'fr':
                    $lan = 'fr-fr';
                    break;
                case 'it':
                    $lan = 'it-it';
                    break;
                case 'es':
                    $lan = 'es-es';
                    break;
                case 'hu':
                    $lan = 'hu-hu';
                    break;
                case 'ru':
                    $lan = 'ru-ru';
                    break;
                case 'ko':
                    $lan = 'ko-kr';
                    break;
                case 'ja':
                    $lan = 'ja-jp';
                    break;
                case 'zh-CN':
                    $lan = 'zh-cn';
                    break;
                case 'zh-TW':
                    $lan = 'zh-hk';
                    break;
                case 'pl':
                    $lan = 'pl-pl';
                    break;
                case 'tr':
                    $lan = 'tr-tr';
                    break;
                default:
                    $lan = 'en-us';
            }
            $lanx = $_COOKIE['lan'] ?? $lan;
            View::share('lan', $lanx);
            App::setLocale($lanx);
        }
    }
}
