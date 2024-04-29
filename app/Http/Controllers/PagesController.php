<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

use App\Models\File;
use App\Models\Page;

class PagesController extends Controller
{
    public function show($pageAlias)
    {
        $page = Page::where('page_alias', $pageAlias)->with('getFiles')->first();

        SEOTools::setTitle($page->page_title .' - '. env('APP_NAME'));
        SEOTools::setDescription($page->page_title);
        SEOTools::jsonLd()->addImage(env('APP_URL') .' / ' .'template/navbar/logo.png');

        return view('tmp.sait.page.custom', compact('page'));
    }
}
