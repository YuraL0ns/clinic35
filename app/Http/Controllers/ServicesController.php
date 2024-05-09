<?php

namespace App\Http\Controllers;

use App\Models\Razdel;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class ServicesController extends Controller
{
    public function getServicesList()
    {
        $razdels = Razdel::all();
//        SEOTools::setTitle(env('APP_NAME') .' - '. $razdels->get()->razdel_title);
//        SEOTools::setDescription($razdels->razdel_title);
//        SEOTools::opengraph()->setUrl(route('sait.page.sales.info', $razdels->razdel_title));
//        SEOTools::setCanonical(route('sait.page.sales.info', $razdels->razdel_title));
//        SEOTools::opengraph()->addProperty('type', 'webpage');
//        SEOMeta::setKeywords($razdels->razdel_title);
//        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');


        return view('tmp.sait.page.services.list', compact('razdels'));
    }
    public function getRazdelData($razdel_alias)
    {

        $getCat = Razdel::where('razdel_alias', $razdel_alias)->first()->id;
        $getCatAlias = Razdel::where('razdel_alias', $razdel_alias)->first()->razdel_alias;
        $showAllService = DB::table('services')->where('razdel_id', '=', $getCat)->get();
        $getCatTitle = Razdel::where('razdel_alias', $razdel_alias)->first()->razdel_title;

        SEOTools::setTitle(env('APP_NAME') .' - '. $getCatTitle);
        SEOTools::setDescription('');
        SEOTools::opengraph()->setUrl('');
        SEOTools::setCanonical('');
        SEOTools::opengraph()->addProperty('type', 'webpage');
        SEOMeta::setKeywords('');
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');


   
        return view('tmp.sait.page.services.show.razdel', compact('showAllService', 'getCatAlias'));
    }

    public function getServicesInfo(Service $service, $razdel_alias, $service_alias)
    {
        $service = Service::where('service_alias', $service_alias)->first();

        SEOTools::setTitle($service->service_title. ' - ' . env('APP_NAME'));
        SEOTools::setDescription($service->seo_description);
        SEOTools::opengraph()->setUrl(route('sait.page.sales.info', $service->service_alias));
        SEOTools::setCanonical(route('sait.page.sales.info', $service->service_alias));
        SEOTools::opengraph()->addProperty('type', 'webpage');
        SEOMeta::setKeywords($service->seo_keywords);
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');

        $service->doctors();
        $service->points();

        return view('tmp.sait.page.services.showInfo', compact('service'))->with('service_alias', $service_alias);
    }
}
