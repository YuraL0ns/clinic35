<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Post;
use App\Models\Razdel;
use App\Models\Service;
use App\Models\Sales;

use App\Models\Vacancy;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class MainController extends Controller
{
    
    public function index_page()
    {
        SEOTools::setTitle(env('APP_NAME'));
        SEOTools::setDescription('');
        SEOTools::opengraph()->setUrl(route('sait.home.page'));
        SEOTools::setCanonical(route('sait.home.page'));
        SEOTools::opengraph()->addProperty('type', 'webpage');
        SEOMeta::setKeywords(['key', 'key2', 'key3', 'key4']);
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');

        return view('tmp.sait.page.home.blade',
        [
            'razdels' => Razdel::all(),
            'doctors' => Doctor::get()->random(8),
            'posts' => Post::get()->sortBy('created_at')
        ]);
    }

    public function page_contacts()
    {
        SEOTools::setTitle(env('APP_NAME') . ' - ' . 'Страница контактов');
        SEOTools::setDescription('Контакты Первой многопрофильной клиники в Череповце');
        SEOTools::opengraph()->setUrl(route('contact'));
        SEOTools::setCanonical(route('contact'));
        SEOTools::opengraph()->addProperty('type', 'webpage');
        SEOMeta::setKeywords(['key', 'key2', 'key3', 'key4']);
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');

        return view('tmp.sait.page.home.contact');
    } // Static Pages
    public function page_abouts(){
        SEOTools::setTitle(env('APP_NAME') . ' - ' . 'О "Первой многопрофильной клинике"');
        SEOTools::setDescription('');
        SEOTools::opengraph()->setUrl(route('sait.page.abouts'));
        SEOTools::setCanonical(route('sait.page.abouts'));
        SEOTools::opengraph()->addProperty('type', 'webpage');
        SEOMeta::setKeywords(['key', 'key2', 'key3', 'key4']);
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');

        return view('tmp.sait.page.abouts.view');
    }
    public function page_documents(){
        SEOTools::setTitle(env('APP_NAME') .' - '. 'Открытая информации о клинике');
        SEOTools::setDescription('Подробная информация по лицензиям клиники');
        SEOTools::opengraph()->setUrl(route('sait.page.documents'));
        SEOTools::setCanonical(route('sait.page.documents'));
        SEOTools::opengraph()->addProperty('type', 'webpage');
        SEOMeta::setKeywords(['key', 'key2', 'key3', 'key4']);
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');

        return view('tmp.sait.page.docs.view');
    }
    public function page_price(){
	    SEOTools::setTitle(env('APP_NAME') .' - '. 'Скидки и акции');
        SEOTools::setDescription('Скидки и акции от нашей клиники');
        SEOTools::opengraph()->setUrl(route('sait.page.price'));
        SEOTools::setCanonical(route('sait.page.price'));
        SEOTools::opengraph()->addProperty('type', 'webpage');
        SEOMeta::setKeywords(['key', 'key2', 'key3', 'key4']);
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');

	    return view('tmp.sait.page.price.view', [
	    	'sales' => Sales::all()
	    ]);
    }
	public function get_sales_info($alias){

        $sale = Sales::where('sales_alias', $alias)->first();

        SEOTools::setTitle(env('APP_NAME') .' - '. $sale->sales_title);
        SEOTools::setDescription($sale->sales_seo_description);
        SEOTools::opengraph()->setUrl(route('sait.page.sales.info', $sale->sales_alias));
        SEOTools::setCanonical(route('sait.page.sales.info', $sale->sales_alias));
        SEOTools::opengraph()->addProperty('type', 'webpage');
        SEOMeta::setKeywords($sale->sales_seo_keywords);
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');

		
		return view('tmp.sait.page.price.info', compact('sale'))->with('sales_alias', $alias);
	}

    public function mainVacancy() {

        $vacansies = Vacancy::all();
        return view('tmp.sait.page.vacansy.main', compact('vacansies'));
    }

    public function showVacancy($vacancy_alias){
        $vacancy = Vacancy::where('vacancy_alias', $vacancy_alias)->first();
        return view('tmp.sait.page.vacansy.show', compact('vacancy'));
    }




}
