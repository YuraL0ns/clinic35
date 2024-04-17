<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VacanсyRequest;
use App\Models\Vacancy;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VacancyController extends Controller
{
    public function main()
    {
        return view('admin.page.vacancy.list', [
            'vacansies' => Vacancy::all()
        ]);
    }

    public function show($vacancy)
    {
        $vacancy = Vacancy::where('vacancy_alias', $vacancy)->first();
        return view('admin.page.vacancy.show', compact('vacancy'))->with('vacancy_alias', $vacancy);
    }

    public function create()
    {
        return view('admin.page.vacancy.create');
    }

    public function edit(Vacancy $vacancy)
    {
        return view('admin.page.vacancy.edit', compact('vacancy'));
    }

    public function store(VacanсyRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('vacancy_images')) {

            $image = $request->file('vacancy_images');
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $fileName = strtolower($data['vacancy_alias']) . '.' . $extension;
            $path = $image->storeAs('public/template/images/vacancy', $fileName);
            $fullPath = Storage::url($path);
            $data['vacancy_images'] = $fullPath;
        }

        Vacancy::create($data);
        return redirect()->route('admin.vacancy.list')->with('success', 'Вакансия успешно добавлена');
    }
    public function update(Vacancy $vacancy, VacanсyRequest $request)
    {
        $vacancy->update($request->validated());
        return redirect()->route('admin.vacancy.list')->with('success', 'Вакансия успешно изменена');
    }
    public function destroy($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->delete();
        return redirect()->route('admin.vacancy.list')->with('success', 'Вакансия успешно удалена');
    }
}
