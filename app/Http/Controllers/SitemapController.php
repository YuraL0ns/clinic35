<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use App\Models\Service;
use App\Models\Razdel;
use Spatie\Sitemap\Sitemap;


class SitemapController extends Controller
{
    public function generate()
    {
        // Создаем новый экземпляр Sitemap
    $sitemap = Sitemap::create();

    // Добавляем главную страницу сайта в sitemap
    $sitemap->add(Url::create(route('sait.home.page'))
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(1.0));

    // Получаем все разделы услуг из базы данных
    $razdels = Razdel::all();

    // Добавляем URL для каждого раздела услуг
    foreach ($razdels as $razdel) {
        $razdelAlias = $razdel->razdel_alias;

        // Добавляем URL раздела в sitemap
        $sitemap->add(Url::create(route('sait.razdel.show', $razdelAlias))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.7));

        // Получаем все сервисы для текущего раздела
        $services = Service::where('razdel_id', $razdel->id)->get();

        // Добавляем URL для каждого сервиса в текущем разделе
        foreach ($services as $service) {
            // Используем алиас раздела и алиас сервиса в URL
            $sitemap->add(Url::create(route('sait.razdel.show.services', [$razdelAlias, $service->service_alias]))
                ->setLastModificationDate($service->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.6));
        }
    }

        $sitemap->add(Url::create(route('sait.doctor.list'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8));

        $sitemap->add(Url::create(route('sait.page.price'))
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
        ->setPriority(0.7));

        $sitemap->add(Url::create(route('sait.page.abouts'))
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                ->setPriority(0.5));

        $sitemap->add(Url::create(route('sait.page.documents'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.5));

        $sitemap->add(Url::create(route('contact'))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
            ->setPriority(0.5));

    // Записываем sitemap в файл
    $sitemap->writeToFile(public_path('sitemap.xml'));

    // Возвращаем представление, указывающее на созданную карту сайта
    return response()->view('sitemap.generated')->header('Content-Type', 'text/xml');
}
}
