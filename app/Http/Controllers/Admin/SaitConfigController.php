<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PointerRequest;
use App\Http\Requests\RazdelRequest;
use App\Models\Razdel;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

//Для редактирования и создания докторов
use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use App\Models\DoctorService;

//Для редактирования и создания Услуг
use App\Models\Service;
use App\Http\Requests\ServiceRequest;

//Для редактирования и создания Акций
use App\Models\Sales;
use App\Http\Requests\SalesRequest;

//Для редактирования и создания Расценок
use App\Models\Point;
use App\Models\PointService;

use App\Models\User;


class SaitConfigController extends Controller
{
    // Doctors
    public function getDataDoctors()
    {
        return view('admin.page.doctor.list', [
            'doctors' => Doctor::all(),
        ]);
    }

    public function getDataDoctorsCreate()
    {
        return view('admin.page.doctor.create');
    }

    public function getDataDoctorsCreateStore(DoctorRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('doctor_images')) {

            $image = $request->file('doctor_images');
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $fileName = strtolower($data['doctor_alias']) . '.' . $extension;
            $path = $image->storeAs('public/template/images/doctors', $fileName);
            $fullPath = Storage::url($path);
            $data['doctor_images'] = $fullPath;
        }

        Doctor::create($data);

//        dd($data);

        return redirect()->route('admin.doctors.list')->with('success', 'Специалист успешно добавлен');
    }

    public function getDataDoctorsEdit(Doctor $doctor)
    {
        return view('admin.page.doctor.edit', compact('doctor'));
    }

    public function getDataDoctorsEditUpdate(Doctor $doctor, DoctorRequest $request)
    {
        $doctor->update($request->validated());
        return redirect()->route('admin.doctors.list')->with('success', 'Специалист успешно изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function getDataDoctorsDestroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        $doctor->delete();
        return redirect()->route('admin.doctors.list')->with('success', 'Специалист удален');
    }


    public function getDataSales()
    {
        return view('admin.page.sales.list', [
            'sales' => Sales::all()
        ]);
    }

    public function getDataSalesCreate()
    {
        return view('admin.page.sales.create');
    }

    public function getDataSalesCreateStore(SalesRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('sales_images')) {
            $image = $request->file('sales_images');
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $fileName = strtolower($data['sales_alias']) . '.' . $extension;
            $path = $image->storeAs('public/template/images/sales', $fileName);
            $fullPath = Storage::url($path);
            $data['sales_images'] = $fullPath;
        }
        Sales::create($data);
        return redirect()->route('admin.sales.list')->with('success', 'Акции успешно добавлена');
    }

    public function getDataSalesEdit(Sales $sales)
    {
        return view('admin.page.sales.edit', compact('sales'));
    }

    public function getDataSalesEditUpdate(SalesRequest $request, Sales $sales)
    {
        $sales->update($request->validated());
        return redirect()->route('admin.sales.list')->with('success', 'Акция успешно изменена');
    }

    public function getDataSalesDestroy($id)
    {
        $sales = Sales::findOrFail($id);
        $sales->delete();
        return redirect()->route('admin.sales.list')->with('success', 'Акция удалена');
    }

    public function getDataRazdel()
    {
        return view('admin.page.razdel.list', [
            'razdels' => Razdel::all()
        ]);
    }

    public function getDataRazdelCreate()
    {
        return view('admin.page.razdel.create');
    }

    public function getDataRazdelStore(RazdelRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('razdel_images')) {
            $image = $request->file('razdel_images');
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $fileName = strtolower($data['razdel_alias']) . '.' . $extension;
            $path = $image->storeAs('public/template/images/razdel', $fileName);
            $fullPath = Storage::url($path);
            $data['razdel_images'] = $fullPath;
        }
        Razdel::create($data);
        return redirect()->route('admin.razdel.list')->with('success', 'Раздел успешно добавлен');
    }

    public function getDataRazdelEdit(Razdel $razdel)
    {
        return view('admin.page.razdel.edit', compact('razdel'));
    }

    public function getDataRazdelUpdate(RazdelRequest $request, Razdel $razdel)
    {
        $razdel->update($request->validated());
        return redirect()->route('admin.razdel.list')->with('success', 'Раздел успешно изменен');
    }

    public function getDataRazdelDestroy($id)
    {
        $razdel = Razdel::findOrFail($id);
        $razdel->delete();
        return redirect()->route('admin.razdel.list')->with('success', 'Раздел удален');
    }

    public function getDataServices()
    {
        $services = Service::with('razdel')->with('doctors')->get();
        return view('admin.page.services.list', compact('services'));
    }

    public function getDataServicesCreate()
    {
        $razdels = Razdel::get();
        return view('admin.page.services.create', compact('razdels'));
    }

    public function getDataServicesStore(ServiceRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('service_images')) {
            $image = $request->file('service_images');
            $originalFileName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $fileName = strtolower($data['service_alias']) . '.' . $extension;
            $path = $image->storeAs('public/template/images/services', $fileName);
            $fullPath = Storage::url($path);
            $data['service_images'] = $fullPath;
        }
        $data['razdel_id'] = $request->input('razdel_id');
        Service::create($data);
        return redirect()->route('admin.services.list')->with('success', 'Услуга успешно добавлена');
    }

    public function getDataServicesEdit(Service $service)
    {
        $razdels = Razdel::get();
        return view('admin.page.services.edit', compact('service', 'razdels'));
    }

    public function getDataServicesUpdate(Service $service, ServiceRequest $request)
    {
        $service->update($request->validated());
        return redirect()->route('admin.services.list')->with('success', 'Услуга успешно изменена');
    }

    public function getDataServicesDestroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.services.list')->with('success', 'Услуга успешно удалена');
    }

    public function getDataServicesDoctorsList(Service $service) {
//        // Получаем список докторов, связанных с данным сервисом
//        $existingDoctors = DoctorService::where('service_id', $service->id)->pluck('doctor_id');
//        // Получаем все докторов
//        $allDoctors = Doctor::all();
//        // Добавляем флаг is_associated для каждого доктора
//        $doctors = $allDoctors->map(function($doctor) use ($existingDoctors) {
//            $doctor->is_associated = $existingDoctors->contains($doctor->id);
//            return $doctor;
//        });
//        return response()->json(['doctors' => $doctors]);

        // Получаем список всех докторов
        $allDoctors = Doctor::all();
        // Получаем ID докторов, связанных с данной услугой из таблицы DoctorService
        $existingDoctorIds = DoctorService::where('service_id', $service->id)->pluck('doctor_id');
        // Помечаем докторов, которые уже связаны с сервисом
        $doctors = $allDoctors->map(function ($doctor) use ($existingDoctorIds) {
            $doctor->is_associated = $existingDoctorIds->contains($doctor->id);
            return $doctor;
        });
        return response()->json(['doctors' => $doctors]);
    }

    public function getDataServicesDoctorsAdd(Service $service, Request $request)
    {
        // Получаем ID докторов из запроса
        $doctors = $request->input('doctors');

//        dd($doctors);
        // Удаляем текущие связи с докторами
        DoctorService::where('service_id', $service->id)->delete();

        // Создаем новые связи с докторами
        foreach ($doctors as $doctorId) {
            DoctorService::create(['doctor_id' => $doctorId, 'service_id' => $service->id]);
        }

        return response()->json(['success' => true]);
    }

    public function getDataPoint()
    {

        $servicesPoint = Service::select('services.id', 'services.service_title', 'services.service_alias')
            ->join('point_service', 'services.id', '=', 'point_service.service_id')
            ->join('points', 'point_service.point_id', '=', 'points.id')
            ->groupBy('services.id')
            ->get();

        return view('admin.page.points.list', compact('servicesPoint'));
    }

    public function getDataPointCreate()
    {
        $services = Service::all();
        return view('admin.page.points.create', compact('services'));
    }
    public function getDataPointStore(PointerRequest $request) {
        $point = Point::create([
            'point_title' => $request->point_title,
            'point_price' => $request->point_price,
            'point_okvd' => $request->point_okvd,
        ]);

        // Создаем запись в таблице PointService для связи с выбранным сервисом
        PointService::create([
            'point_id' => $point->id,
            'service_id' => $request->service_id,
        ]);

        redirect()->route('admin.point.show')->with('success', 'Новая услуга добавлена успешно!');
    }
    public function updatePoint(Request $request, $pointId)
    {
        $point = Point::find($pointId);
        if ($point) {
            // Обновите данные объекта
            $point->update($request->all());
            // Другие действия по обновлению, если есть
            return response()->json(['success' => true]);
        } else {
            // Объект не найден, верните ошибку
            return response()->json(['error' => 'Object not found'], 404);
        }
    }

    public function getDataPointDestroy($id)
    {
        $point = Point::findOrFail($id);
        $point->delete();
        return redirect()->route('admin.point.show')->with('success', 'Услуга успешно удалена');
    }

    public function uploadContactsFile(Request $request)
    {
        if($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = Str::slug($originalFileName) . 'pdf';
            $path = $file->storeAs('public/files/pdf_files', $filename);

            return redirect()->back()->with('success', 'Файл успешно загружен.');
        }

        return redirect()->back()->with('error', 'Ошибка загрузки файла.');
    }

    public function getDataUsers()
    {
        return view('admin.page.users.list', [
            'users' => User::all()
        ]);
    }

    public function getDataRoles()
    {
        return view('admin.page.users.roles.list', [
            'roles' => Role::all()
        ]);
    }
}
