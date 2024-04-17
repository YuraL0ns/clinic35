<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MessageForm;

class AdminFormController extends Controller
{
    public function getDataFromForm()
    {
        $messages = MessageForm::all();
        return view('admin.page.messages.list', compact('messages'));
    }
}
