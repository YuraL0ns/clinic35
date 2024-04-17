<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\File;
use App\Models\Page;

class PagesController extends Controller
{
    public function show($pageAlias)
    {
        $page = Page::where('page_alias', $pageAlias)->with('getFiles')->first();

        return view('tmp.sait.page.custom', compact('page'));
    }
}
