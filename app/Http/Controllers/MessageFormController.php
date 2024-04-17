<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageForm;
use App\Events\NewMessageReceived;
class MessageFormController extends Controller
{
    public function sendMessageFromHeader(Request $request)
    {
        $val = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'from' => 'required'
        ]);

        $message = MessageForm::create($val);
        event(new NewMessageReceived($message));

        return redirect()->back()->with('message', 'Ваше сообщение успешно отправлено');
    }
}
