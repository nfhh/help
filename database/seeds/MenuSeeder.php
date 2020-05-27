<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('menus')->insert([
            [
                'en-us' => 'Documents',
                'de-de' => 'Unterlagen',
                'fr-fr' => 'Les documents',
                'it-it' => 'Documenti',
                'es-es' => 'Documentos',
                'hu-hu' => 'doc',
                'ru-ru' => 'доктор',
                'ko-kr' => '서류',
                'ja-jp' => '書類',
                'zh-cn' => '文档',
                'zh-hk' => '文檔',
                'pl-pl' => 'Dok',
                'tr-tr' => 'Belgeler',
            ],
            [
                'en-us' => 'Desktop and system',
                'de-de' => 'Desktop und System',
                'fr-fr' => 'Bureau et système',
                'it-it' => 'Desktop e sistema',
                'es-es' => 'Escritorio y sistema',
                'hu-hu' => 'Asztali és rendszer',
                'ru-ru' => 'Рабочий стол и система',
                'ko-kr' => '데스크톱 및 시스템',
                'ja-jp' => 'デスクトップおよびシステム',
                'zh-cn' => '桌面及系统',
                'zh-hk' => '桌面及系統',
                'pl-pl' => 'Komputer stacjonarny i system',
                'tr-tr' => 'Masaüstü ve Sistem',
            ],
            [
                'en-us' => 'Mobile applications',
                'de-de' => 'Mobile Anwendungen',
                'fr-fr' => 'Applications mobiles',
                'it-it' => 'Applicazioni mobili',
                'es-es' => 'Aplicaciones móviles',
                'hu-hu' => 'Mobil alkalmazások',
                'ru-ru' => 'Мобильное приложение',
                'ko-kr' => '모바일 애플리케이션',
                'ja-jp' => 'モバイルアプリケーション',
                'zh-cn' => '移动应用程序',
                'zh-hk' => '移動應用程序',
                'pl-pl' => 'Mobilna aplikacja',
                'tr-tr' => 'Mobil Uygulamalar',
            ],
            [
                'en-us' => 'TOS applications',
                'de-de' => 'TOS-Anwendungen',
                'fr-fr' => 'Applications TOS',
                'it-it' => 'Applicazioni TOS',
                'es-es' => 'Aplicaciones TOS',
                'hu-hu' => 'TOS alkalmazások',
                'ru-ru' => 'Приложение TOS',
                'ko-kr' => 'TOS 애플리케이션',
                'ja-jp' => 'TOSアプリケーション',
                'zh-cn' => 'TOS应用程序',
                'zh-hk' => 'TOS應用程序',
                'pl-pl' => 'Aplikacja TOS',
                'tr-tr' => 'TOS Uygulamaları',
            ]
        ]);
    }
}
