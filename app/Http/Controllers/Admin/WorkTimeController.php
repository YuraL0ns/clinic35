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

    public function create(Request $request)
    {

        $doctors = Doctor::all();
        $selectedDoctorId = $request->input('doctor_id');
        \Log::info('doctor_id: ' .$selectedDoctorId );
        return view('work_times.create', compact('doctors', 'selectedDoctorId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'work_time' => 'required|date',
        ]);

        WorkTime::create($request->all());
        return redirect()->route('admin.work_times.index')->with('success', 'Дата успешно добавлена!');
    }

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
