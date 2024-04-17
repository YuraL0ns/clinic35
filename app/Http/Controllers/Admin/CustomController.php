<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MessageFF;
use App\Models\MessageFH;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class CustomController extends Controller
{

    public function mainAdmin() {
        return view('admin.page.main');
    }

    public function edit()
    {
        $staticText = Config::get('static_text.contacts_static_text');
        return view('admin.static_text.edit', compact('staticText'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'contacts_static_text' => 'required|string',
        ]);

        $staticText = $request->input('contacts_static_text');
        File::put(config_path('static_text.php'), '<?php return [ "contacts_static_text" => "'.$staticText.'" ];');

        return redirect()->route('admin.contacts.edit')->with('success', 'Текст успешно обновлен');
    }

    public function getDataContactsFormHeader(){
        return view('admin.page.messages.header.list', [
            'mfhs' => MessageFH::latest()->get(),
        ]);
    }
    public function getDataContactsFormFooter(){
        return view('admin.page.messages.footer.list', [
            'mffs' => MessageFF::latest()->get(),
        ]);
    }
}
