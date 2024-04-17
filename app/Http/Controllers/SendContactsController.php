<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SendContactsController extends Controller
{


    public function sendMessageFromFooter(Request $request) {
        $val = $request->validate([
            'name' => 'required',
            'phone' => 'required:'
        ]);

        MessageFF::create($val);

        return redirect()->back()->with('message', 'Ваше сообщение успешно отправлено');
    }

    public function sendMessageFromHeader(Request $request) {
        $val = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);

        MessageFH::create($val);

        return redirect()->back()->with('message', 'Ваше сообщение успешно отправлено');
    }

}
