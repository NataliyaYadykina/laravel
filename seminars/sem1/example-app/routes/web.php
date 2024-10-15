<?php

use App\Http\Controllers\EmployeeHw5Controller;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FileUploadS5Controller;
use App\Http\Controllers\FormProcessorController;
use App\Http\Controllers\JsonParseController;
use App\Http\Controllers\LibraryUserController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\RequestTestController;
use App\Http\Controllers\SendFileController;
use App\Http\Controllers\SimpleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestCookieController;
use App\Http\Controllers\TestHeaderController;
use App\Http\Controllers\TestRedirectController;
use App\Http\Controllers\UserController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', TestController::class);

Route::get('/simple', [SimpleController::class, 'test']);

Route::get('/users', [UserController::class, 'showUsers']);
// Route::get('/users', UserController::class);

Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store'])->name('store-user');

Route::get('/books', [EntityController::class, 'index'])->name('books');
Route::post('/books', [EntityController::class, 'store'])->name('save_book');
Route::get('/remove_book/{id}', [EntityController::class, 'delete'])->where(['id' => '[0-9]+'])->name('remove_book');

Route::get('/upload', [FileUploadController::class, 'index']);
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload_file');

Route::get('/library_user/{id}', [LibraryUserController::class, 'showLibUsers'])->where(['id' => '[0-1]+']);

Route::get('/my_user', [MyUserController::class, 'showMyUser']);

Route::get('/redirect_test', TestRedirectController::class);

Route::get('/send_file', SendFileController::class);

// hw_2
Route::get('/userform', [FormProcessorController::class, 'index'])->name('userform');
Route::post('/store_form', [FormProcessorController::class, 'store'])->name('store_userform');

// hw_3
Route::get('/test_database', function () {
    $employee = new Employee();
    $employee->first_name = 'Betman';
    $employee->age = 34;
    $employee->save();
});

// sem 4
Route::get('/main', function () {
    return view('mainpage');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/users_sem4', function () {
    $users_sem4 = ['Ivan', 'Petr', 'Oleg', 'Alex', 'Maksim'];

    return view('users_sem4', ['users' => $users_sem4]);
});

Route::get('/uppercase', function () {
    return view('testdir');
});

// hw_4
Route::get('/home', function () {
    return view('home', ['name' => 'John', 'age' => 14, 'position' => 'manager', 'address' => 'Moscow']);
});

Route::get('/contacts', function () {
    return view('contacts', ['address' => 'Moscow', 'post_code' => '111333', 'email' => 'mail@gmail.com', 'phone' => '+1234567890']);
});

// sem_5
Route::get('/test_parameters', [RequestTestController::class, 'testRequest']);

Route::get('/test_header', [TestHeaderController::class, 'getHeader']);

Route::get('/test_cookie', [TestCookieController::class, 'testCookie']);

Route::get('/upload_file_s5', [FileUploadS5Controller::class, 'showForm'])->name('showFormS5');
Route::post('/upload_file_s5', [FileUploadS5Controller::class, 'fileUpload'])->name('uploadFileS5');

Route::post('/json_parse', [JsonParseController::class, 'parseJson']);

// hw_5
Route::get('/get_employee_data_hw5', [EmployeeHw5Controller::class, 'index']);
Route::post('/get_employee_data_hw5', [EmployeeHw5Controller::class, 'store'])->name('store_form_hw5');
Route::put('/user_hw5/{id}', [EmployeeHw5Controller::class, 'update']);
