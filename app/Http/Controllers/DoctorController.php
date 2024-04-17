<?php

namespace App\Http\Controllers;

use App\Models\Doctor;

use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class DoctorController extends Controller
{

    public function getDoctorData()
    {
        $doctors = Doctor::where('doctor_visible', 1)->get();

        SEOTools::setTitle('Список специалистов в нашей клиники');
        SEOTools::setDescription('Все специалисты нашей клиники которые помогут вам в решении ваш проблем со здоровьем');
        SEOTools::opengraph()->setUrl(route('sait.doctor.list'));
        SEOTools::setCanonical(route('sait.doctor.list'));
        SEOTools::opengraph()->addProperty('type', 'webpage');
//        SEOMeta::setKeywords(['key', 'key2', 'key3', 'key4']);
        SEOTools::jsonLd()->addImage('http://project-clinic.test/template/navbar/logo.png');

        return view('tmp.sait.page.doctor.list', compact('doctors'));
    }

    public function getDoctorShowData($doctor_alias)
    {

        $doctor = Doctor::where('doctor_alias', $doctor_alias)->first();

        SEOTools::setTitle($doctor->seo_title . ' - ' . env('APP_NAME'));
        SEOTools::setDescription($doctor->seo_description);
        SEOMeta::setKeywords($doctor->seo_key);
        SEOTools::opengraph()->setUrl(env('APP_URL'));
        OpenGraph::setDescription($doctor->seo_description);
        OpenGraph::addImage(['url' => $doctor->doctor_images]);
        OpenGraph::addImage($doctor->doctor_images, ['height' => 300, 'width' => 300]);
        SEOTools::setCanonical(route('sait.doctor.show', $doctor->doctor_alias));
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::jsonLd()->addImage($doctor->doctor_images);

        return view('tmp.sait.page.doctor.show', ['doctor' => $doctor])->with('doctor_alias', $doctor_alias);
    }
}
