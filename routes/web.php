<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SendContactsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\CustomController;
use App\Http\Controllers\Admin\SaitConfigController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\MessageFormController;
use App\Http\Controllers\Admin\AdminFormController;

// Send Messages
Route::post('/submit-form-header', [MessageFormController::class, 'sendMessageFromHeader'])->name('send.from.header');
Route::post('/submit-form-footer', [MessageFormController::class, 'sendMessageFromFooter'])->name('send.from.footer');
Route::get('/', [MainController::class, 'index_page'])->name('sait.home.page');
Route::get('page/{page_alias}', [PagesController::class, 'show'])->name('custom.page');

Route::prefix('news')->name('sait.news.')->group(function (){
  Route::get('/', [PostController::class, 'getPostsList'])->name('list');
  Route::get('/{post_alias}', [PostController::class, 'getPostData'])->name('info');
});

Route::get('/services', [ServicesController::class, 'getServicesList'])->name('sait.home.services.list');
Route::get('/services/{razdel_alias}', [ServicesController::class, 'getRazdelData'])->name('sait.razdel.show');
Route::get('/services/{razdel_alias}/{alias}', [ServicesController::class, 'getServicesInfo'])->name('sait.razdel.show.services');

Route::get('/specialist', [DoctorController::class, 'getDoctorData'])->name('sait.doctor.list');
Route::get('/specialist/{doctor_name}', [DoctorController::class, 'getDoctorShowData'])->name('sait.doctor.show');

// Route::get('support',  [MainController::class, 'page_support'])->name('sait.page.support');
Route::get('sales', [MainController::class, 'page_price'])->name('sait.page.price');
Route::get('sales/{alias}', [MainController::class, 'get_sales_info'])->name('sait.page.sales.info');
// Route::get('time-to-work', [MainController::class, 'page_timeToWork'])->name('sait.page.timeToWork');
Route::get('abouts', [MainController::class, 'page_abouts'])->name('sait.page.abouts');
Route::get('documents', [MainController::class, 'page_documents'])->name('sait.page.documents');
Route::get('contacts', [MainController::class, 'page_contacts'])->name('contact');





Route::get('sitemap.xml', [SitemapController::class, 'generate']);
// Admin
Auth::routes();
Route::prefix('admin')
  ->name('admin.')
  ->middleware(['auth', 'role:Администратор'])
  ->group(function(){

  Route::get('/', [CustomController::class, 'mainAdmin'])->name('main');

  Route::get('contacts/edit', [CustomController::class, 'edit'])->name('contacts.edit');
  Route::post('contacts/update', [CustomController::class, 'update'])->name('contacts.edit.post');

  // Doctors CRUD
Route::get('doctors', [SaitConfigController::class, 'getDataDoctors'])->name('doctors.list');
Route::get('doctors/create', [SaitConfigController::class, 'getDataDoctorsCreate'])->name('doctors.create');
Route::post('doctors/create', [SaitConfigController::class, 'getDataDoctorsCreateStore'])->name('doctors.create.store');
Route::get('doctors/edit/{doctor}', [SaitConfigController::class, 'getDataDoctorsEdit'])->name('doctors.edit');
Route::put('doctors/edit/{doctor}', [SaitConfigController::class, 'getDataDoctorsEditUpdate'])->name('doctors.edit.update');
Route::delete('doctors/{id}', [SaitConfigController::class, 'getDataDoctorsDestroy'])->name('doctors.destroy');
    // Sales CRUD
Route::get('sales', [SaitConfigController::class, 'getDataSales'])->name('sales.list');
Route::get('sales/create', [SaitConfigController::class, 'getDataSalesCreate'])->name('sales.create');
Route::post('sales/create', [SaitConfigController::class, 'getDataSalesCreateStore'])->name('sales.create.store');
Route::get('sales/edit/{sales}', [SaitConfigController::class, 'getDataSalesEdit'])->name('sales.edit');
Route::put('sales/edit/{sales}', [SaitConfigController::class, 'getDataSalesEditUpdate'])->name('sales.edit.update');
Route::delete('sales/{id}', [SaitConfigController::class, 'getDataSalesDestroy'])->name('sales.destroy');
  // Services CRUD
Route::get('services', [SaitConfigController::class, 'getDataServices'])->name('services.list');
Route::get('services/create', [SaitConfigController::class, 'getDataServicesCreate'])->name('services.create');
Route::post('services/create', [SaitConfigController::class, 'getDataServicesStore'])->name('services.create.store');
Route::get('services/edit/{service}', [SaitConfigController::class, 'getDataServicesEdit'])->name('services.edit');
Route::put('services/edit/{service}', [SaitConfigController::class, 'getDataServicesUpdate'])->name('services.edit.update');
Route::delete('services/{id}', [SaitConfigController::class, 'getDataServicesDestroy'])->name('services.destroy');

Route::get('services/{service}/doctors', [SaitConfigController::class, 'getDataServicesDoctorsList'])->name('services.doctors.show');
Route::post('services/{service}/doctors/add', [SaitConfigController::class, 'getDataServicesDoctorsAdd'])->name('services.doctors.add');

//Razdel Crud
Route::get('razdel', [SaitConfigController::class, 'getDataRazdel'])->name('razdel.list');
Route::get('razdel/create', [SaitConfigController::class, 'getDataRazdelCreate'])->name('razdel.create');
Route::post('razdel/create', [SaitConfigController::class, 'getDataRazdelStore'])->name('razdel.create.store');
Route::get('razdel/edit/{razdel}', [SaitConfigController::class, 'getDataRazdelEdit'])->name('razdel.edit');
Route::put('razdel/edit/{razdel}', [SaitConfigController::class, 'getDataRazdelUpdate'])->name('razdel.edit.update');
Route::delete('razdel/{id}', [SaitConfigController::class, 'getDataRazdelDestroy'])->name('razdel.destroy');

//Poitn crud
Route::get('prices', [SaitConfigController::class, 'getDataPoint'])->name('point.show');
Route::get('prices/add-new', [SaitConfigController::class, 'getDataPointCreate'])->name('point.create');
Route::post('prices/add-new', [SaitConfigController::class, 'getDataPointStore'])->name('point.store');
Route::put('prices/{pointId}', [SaitConfigController::class, 'updatePoint'])->name('point.update');
Route::delete('prices/{id}', [SaitConfigController::class, 'getDataPointDestroy'])->name('point.destroy');

Route::get('users', [SaitConfigController::class, 'getDataUsers'])->name('users.list');
Route::get('users/roles', [SaitConfigController::class, 'getDataRoles'])->name('users.roles.list');

Route::get('vacancy', [VacancyController::class, 'main'])->name('vacancy.list');
Route::get('vacancy/create', [VacancyController::class, 'create'])->name('vacancy.create');
Route::post('vacancy/create', [VacancyController::class, 'store'])->name('vacancy.store');
Route::get('vacancy/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
Route::put('vacancy/{vacancy}/edit', [VacancyController::class, 'update'])->name('vacancy.update');
Route::get('vacancy/{vacancy}', [VacancyController::class, 'show'])->name('vacancy.show');
Route::delete('vacancy/{id}', [VacancyController::class, 'destroy'])->name('vacancy.delete');


Route::get('messages', [AdminFormController::class, 'getDataFromForm'])->name('form.list');

  });


require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



