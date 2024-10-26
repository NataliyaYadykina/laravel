<?php

use App\Events\NewsCreatedS9;
use App\Events\NewsHiddenHw9;
use App\Http\Controllers\BookHw6Controller;
use App\Http\Controllers\EmployeeHw5Controller;
use App\Http\Controllers\EmployeeS6_2Controller;
use App\Http\Controllers\EntityController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\FileUploadS5Controller;
use App\Http\Controllers\FormBuilderTestS6_5Controller;
use App\Http\Controllers\FormProcessorController;
use App\Http\Controllers\JsonParseController;
use App\Http\Controllers\LibraryUserController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\PdfGeneratorHW7Controller;
use App\Http\Controllers\RequestTestController;
use App\Http\Controllers\SendFileController;
use App\Http\Controllers\SimpleController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestCookieController;
use App\Http\Controllers\TestCsrfS6_2Controller;
use App\Http\Controllers\TestDiS8Controller;
use App\Http\Controllers\TestFormS6Controller;
use App\Http\Controllers\TestHeaderController;
use App\Http\Controllers\TestRedirectController;
use App\Http\Controllers\TestValidationS6_4Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserS7Controller;
use App\Http\Middleware\DataLoggerHW8;
use App\Jobs\SyncNewsS10;
use App\Models\Employee;
use App\Models\News_s9;
use App\Models\NewsHw9;
use App\Models\User;
use App\Notifications\UserEmailChangedS10Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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

// sem_6
Route::get('/form_s6', [TestFormS6Controller::class, 'displayForm'])->name('show_form_s6');
Route::post('/form_s6', [TestFormS6Controller::class, 'postForm'])->name('post_form_s6');

Route::post('/employee_s6_2', [EmployeeS6_2Controller::class, 'store'])->name('store_employee_s6_2');
Route::get('/employee_s6_2/{id?}', [EmployeeS6_2Controller::class, 'show'])->name('show_employees_s6_2');

Route::get('/test_csrf_s6_3', [TestCsrfS6_2Controller::class, 'show'])->name('test_csrf_s6_3');
Route::post('/test_csrf_s6_3', [TestCsrfS6_2Controller::class, 'post'])->name('post_csrf_s6_3');

Route::get('/test_validation_s6_4', [TestValidationS6_4Controller::class, 'show'])->name('show_validation_form_s6_4');
Route::post('/test_validation_s6_4', [TestValidationS6_4Controller::class, 'post'])->name('post_validate_form_s6_4');

Route::get('/test_builder_s6_5', [FormBuilderTestS6_5Controller::class, 'showForm'])->name('show_builder_s6_5');
Route::post('/test_builder_s6_5', [FormBuilderTestS6_5Controller::class, 'postForm'])->name('post_builder_s6_5');

// hw_6
Route::get('/books_hw6', [BookHw6Controller::class, 'index'])->name('show_book_hw6');
Route::post('/books_hw6', [BookHw6Controller::class, 'store'])->name('store_book_hw6');


// sem_7
Route::get('/test_url_s7_1_ex01', function () {
    return "Test";
});

Route::get('test_url_s7_1_ex02', function () {
    // Страница доступна
    // $response = new Response('Test content', 200);
    // Доступ к странице запрещен
    // $response = new Response(null, 403);
    // return $response;

    return response('New test URL', 200)
        ->header('X-HEADER-1', 'test')
        ->header('Content-Type', 'application/json');
});

Route::get('test_url_s7_1_ex03', function () {
    // return redirect()->route('home');
    return redirect(null, 301)->away('https://google.com');
});

Route::get('/test_cookie_s7', function () {
    return response('My first cookie')
        ->cookie('my_test_cookie', 'test content', -1)
        // ->header('Set-Cookie', 'my_test_cookie2=10')
        // ->header('X-HEADER-TEST1', 'IT WORKS!1')
        // ->header('X-HEADER-TEST2', 'IT WORKS!2')
        // ->header('X-HEADER-TEST3', 'IT WORKS!3')
        ->withHeaders([
            'X-HEADER-TEST4' => 'IT WORKS!4',
            'X-HEADER-TEST5' => 'IT WORKS!5',
            'X-HEADER-TEST6' => 'IT WORKS!6'
        ])
        ->withoutCookie('my_test_cookie2');
});

Route::get('/counter_s7', function () {
    $counter = session('counter', 0);
    session(['counter' => ++$counter]);

    return 'ok';
});

Route::get('/result_counter_s7', function () {
    return session('counter', 0);
});

Route::get('/sessions_s7', function () {
    var_dump(session()->all());
    if (session()->has('counter')) {
        session()->forget('counter');
    }
    var_dump(session()->all());
});

Route::get('/list_of_books_s7', function () {
    $listOfBooks = session()->get('list_of_books', '');

    return response()->json(['status' => 'received', 'list_of_books' => $listOfBooks ? unserialize($listOfBooks) : 'The list is empty.']);
});

Route::post('/list_of_books_s7', function (Request $request) {
    $listOfBooks = session()->get('list_of_books', '');
    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];
    $listOfBooks[] = [
        'title' => $request->get('title'),
        'author' => $request->get('author')
    ];

    session()->put('list_of_books', serialize($listOfBooks));

    return response()->json(['status' => 'saved', 'list_of_books' => $listOfBooks]);
});

Route::delete('/list_of_books_s7/{id}', function ($id) {
    $listOfBooks = session()->get('list_of_books', '');
    $listOfBooks = $listOfBooks ? unserialize($listOfBooks) : [];

    if (array_key_exists($id, $listOfBooks)) {
        unset($listOfBooks[$id]);
    }

    session()->put('list_of_books', serialize($listOfBooks));

    return response()->json(['status' => 'deleted', 'list_of_books' => $listOfBooks]);
});

Route::get('/file_download_s7', function () {
    // Скачивание файла по ссылке
    // return response()->download(base_path() . '/test_s7.txt', 'My_file');
    // Потоковая загрузка
    return response()->streamDownload(function () {
        echo file_get_contents('https://google.com');
    }, 'google.html');
});

Route::get('/file_show_s7', function () {
    // Файл будет показан в браузере
    return response()->file(base_path() . '/test_s7.txt');
});

// hw_7
Route::get('/user_hw7', [UserS7Controller::class, 'index'])->name('show_user_hw7');
Route::post('/user_hw7', [UserS7Controller::class, 'store'])->name('store_user_hw7');
Route::get('/user_hw7/{id}', [UserS7Controller::class, 'get'])->name('show_user_by_id_hw7');
Route::get('/resume_hw7/{id}', [PdfGeneratorHW7Controller::class, 'index'])->name('resume_hw7');

// sem_8
Route::get('/check_di_s8', [TestDiS8Controller::class, 'showUrl']);

// hw_8
Route::get('/logs_hw8', function () {
    return view('logs_hw8');
})->middleware(DataLoggerHW8::class);

// sem 9
Route::get('/news_created_s9', function () {
    NewsCreatedS9::dispatch(News_s9::first());
});

Route::get('/news_update_test_s9', function () {
    // News_s9::first()->update(['title' => 'New title for test']);
    // return 'Updated';
    // News_s9::withoutEvents(function () {
    News_s9::first()->update(['title' => 'New 5 title for test']);
    // });
    return 'Updated';
});

// hw_9
Route::get('/create_test_hw9', function () {
    $news = new NewsHw9();

    $news->title = 'Test news 9';
    $news->body = 'Test content for test news 9';

    $news->save();
    return 'News created';
});

Route::get('/news_hw9/{id}/hide', function ($id) {
    $news = NewsHw9::findOrFail($id);
    $news->hidden = true;
    $news->save();

    NewsHiddenHw9::dispatch($news);

    return 'News hidden';
});

// sem_10
Route::get('/sync_news_s10', function () {
    SyncNewsS10::dispatch(15);
    return response(['status' => 'success']);
});

Route::get('/locale_s10', function () {
    echo App::getLocale();
});

Route::get('/locale_s10/set/{locale}', function ($locale) {
    App::setLocale($locale);
    echo App::getLocale();
    echo '<hr>';
    echo __('messages.great');
});

Route::get('/locale/{locale}/thanks', function ($locale, Request $request) {
    App::setLocale($locale);
    echo __('messages.thanks', ['name' => $request->input('name')]);
});

Route::get('/user_s10/create_test/{amount}', function ($amount) {
    return User::factory($amount)->create();
});

Route::get('/user_s10/{user}/change_email', function (User $user, Request $request) {
    $oldEmail = $user->email;
    $user->email = $request->input('email');
    $user->save();
    $user->notify(new UserEmailChangedS10Notification($oldEmail));
    return response(['result' => 'email changed']);
});

Route::get('/user_s10/{user}/notifications', function (User $user) {
    return $user->notifications;
});
