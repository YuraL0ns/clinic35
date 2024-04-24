<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\WorkTime;
use App\Models\Doctor;

class WorkTimeController extends Controller
{

    public function index()
    {
        $doctors = Doctor::with('workTimes')->get();
        return view('work_times.index', compact('doctors'));
    }

    // В методе create вашего контроллера
    public function create(Request $request)
    {
        // Используйте метод all() для диагностики
        \Log::info('All Request Data:', $request->all()); // Проверьте все данные запроса

        $doctorId = $request->input('doctor_id', 'default_value'); // Используйте значение по умолчанию для проверки
        \Log::info('Doctor ID from input: ' . $doctorId);

        $doctors = Doctor::all();
        $selectedDoctorId = $doctorId;

        return view('work_times.create', compact('doctors', 'selectedDoctorId'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'work_time.*' => 'required|date',
        ]);

        $doctorId = $request->input('doctor_id');
        $workTimes = $request->input('work_time');

        foreach ($workTimes as $time) {
            WorkTime::create([
                'doctor_id' => $doctorId,
                'work_time' => $time
            ]);
        }
        return redirect()->route('admin.work_times.index')->with('success', 'Дата успешно добавлена!');
    }
//    public function store(Request $request)
//    {
//        $workTimes = $request->input('work_times');
//
//        foreach ($workTimes as $time) {
//            // Здесь добавьте логику создания нового интервала времени
//            // Например, сохранение в базу данных
//            WorkTime::create(['work_time' => $time]);
//        }
//
//        return back()->with('success', 'Временные интервалы сохранены.');
//    }

    // Показ конкретной записи
    public function show(WorkTime $workTime)
    {
        return view('work_times.show', compact('workTime'));
    }

    // Форма редактирования записи
    public function edit(WorkTime $workTime)
    {
        $doctors = Doctor::all();
        return view('work_times.edit', compact('doctors', 'workTime'));
    }

    // Обновление записи
    public function update(Request $request, WorkTime $workTime)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'work_time' => 'required|date',
        ]);

        $workTime->update($request->all());
        return redirect()->route('admin.work_times.index')->with('success', 'Изменено');
    }

    // Удаление записи
    public function destroy(WorkTime $workTime)
    {
        $workTime->delete();
        return redirect()->route('admin.work_times.index')->with('success', 'Мы все удалили');
    }
}
