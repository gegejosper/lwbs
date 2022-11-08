<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/hi', function () {
//     return 'Hi';
// });

Auth::routes();
Route::get('/', 'AdminController@login')->name('front');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'Controller@contact')->name('contact');
Route::get('/about', 'Controller@about')->name('about');
// Route::get('/admin', 'AdminController@login')->name('admin');
// Route::get('/cashier', 'CashierController@login')->name('cashier');
// Route::get('/reader', 'MeterController@login')->name('reader');
// Route::get('/consumer', 'ConsumerController@login')->name('consumer');
Route::post('/applysuccess', 'ConsumerController@registerconcessionaire')->name('registerconcessionaire');
Route::post('/error', 'ConsumerController@error')->name('error');
Route::get('/apply', 'ConsumerController@apply')->name('apply');

Route::post('/admin/login', 'LoginController@userLogin')->name('user.login');
// Route::post('/collector/login', 'LoginController@cashierLogin')->name('cashier.login');
// Route::post('/reader/login', 'LoginController@readerLogin')->name('reader.login');
// Route::post('/consumer/login', 'LoginController@consumerLogin')->name('consumer.login');

Route::group(['middleware' =>'adminAuth', 'prefix' => 'admin'], function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/insert', 'AdminController@insert')->name('insert');
    Route::get('/bills', 'AdminController@bills')->name('bills');
    Route::get('/reading', 'AdminController@reading')->name('insert');
    Route::get('/collectibles', 'AdminController@collectibles')->name('collectibles');
    Route::get('/payments', 'AdminController@payments')->name('payments');
    Route::get('/payment/{id}', 'CollectorController@payment')->name('adminpayment');
    Route::get('/payment/pay/{id}/{billId}/{amount}', 'CollectorController@addpay')->name('admin_addpay');
    Route::get('/payment/removepay/{id}/{billId}/', 'CollectorController@removepay')->name('admin_removepay');
    Route::post('/processpayment', 'CollectorController@processpayment')->name('admin_processpayment');
    Route::get('/view_reciept/{id}', 'CollectorController@view_reciept')->name('admin_view_reciept');
    Route::get('/employee', 'AdminController@employee')->name('employee');
    //Route::get('/concessionaire', 'AdminController@concessionaire')->name('concessionaire');
    Route::get('/applicants', 'ConcessionaireController@applicants')->name('applicants');
    Route::get('/applicants/approved/{userid}', 'ApplicantController@approve')->name('approveapplicants');
    Route::get('/applicants/decline/{userid}', 'ApplicantController@decline')->name('declineapplicants');

    Route::get('/employee', 'AdminController@employee')->name('employee');
    Route::post('/employee/adduser', 'EmployeeController@addUser')->name('adduser');
    Route::post('/employee/edituser', 'EmployeeController@editUser')->name('edituser');
    Route::post('/employee/deleteuser', 'EmployeeController@deleteUser')->name('deleteuser');

    Route::get('/categories', 'CategoryController@readCategory')->name('readcategory');
    Route::post('/categories/addcategories', 'CategoryController@addCategory')->name('addcategories');
    Route::post('/categories/editcategories', 'CategoryController@editCategory')->name('editcategories');
    Route::post('/categories/deletecategories', 'CategoryController@deleteCategory')->name('deletecategories');
    
    Route::get('/rate', 'RateController@readRate')->name('readrate');
    Route::post('/rate/addrate', 'RateController@addRate')->name('addrate');
    Route::post('/rate/editrate', 'RateController@editRate')->name('editrate');
    Route::post('/rate/deleterate', 'RateController@deleteRate')->name('deleterate');

    Route::get('/position', 'PositionController@readPosition')->name('readposition');
    Route::post('/position/addposition', 'PositionController@addPosition')->name('addposition');
    Route::post('/position/editposition', 'PositionController@editPosition')->name('editposition');
    Route::post('/position/deleteposition', 'PositionController@deletePosition')->name('deleteposition');

    Route::get('/setting', 'AdminController@setting')->name('setting');
    Route::post('/setting/penalty', 'SettingsController@settingPenalty')->name('settingpenalty');
    Route::post('/setting/duedate', 'SettingsController@settingDueDate')->name('settingduedate');
    Route::post('/setting/notice', 'SettingsController@settingNotice')->name('settingnotice');
    Route::post('/setting/discount', 'SettingsController@settingDiscount')->name('settingdiscount');
    Route::get('/report', 'AdminController@report')->name('report');
    Route::get('/report/consumers', 'AdminController@consumers_report')->name('consumers_report');
    Route::post('/report/generate', 'AdminController@generatereport')->name('generatereport');
    Route::get('/messages', 'AdminController@messages')->name('messages');
    Route::get('/reminders', 'AdminController@reminders')->name('reminders');
    Route::get('/notifications', 'AdminController@notifications')->name('notifications');

    Route::post('/search', 'ConcessionaireController@searchConcessionaire')->name('searchConcessionairePost');
    Route::get('/search', 'ConcessionaireController@searchConcessionaire')->name('searchConcessionaire');
    Route::get('/consumer', 'ConcessionaireController@readconsumer')->name('consumer');
    Route::get('/consumers', 'ConcessionaireController@consumers_list')->name('consumers_list');
    Route::get('/consumer/connected', 'ConcessionaireController@connectedConcessionaire')->name('connectedConcessionaire');
    Route::get('/consumer/disconnected', 'ConcessionaireController@disconnectedConcessionaire')->name('disconnectedConcessionaire');
    Route::get('/consumer/pending', 'ConcessionaireController@applicantConcessionaire')->name('applicantConcessionaire');
    Route::get('/consumer/{id}', 'ConcessionaireController@admin_consumer')->name('admin_consumer');
    Route::get('/consumer/purok/{clark}', 'ConcessionaireController@viewClark')->name('viewClark');
    Route::post('/consumer/addconsumer', 'ConcessionaireController@addconsumer')->name('addconsumer');
    Route::post('/consumer/editconsumer', 'ConcessionaireController@editconsumer')->name('editconsumer');
    Route::post('/consumer/deleteconsumer', 'ConcessionaireController@deleteconsumer')->name('deletecconsumer');

    Route::get('/disconnect/{meternum}', 'ConcessionaireController@disconnect')->name('disconnect');
    Route::get('/reconnect/{meternum}', 'ConcessionaireController@reconnect')->name('reconnect');
    Route::get('/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

    //Route::get('/dashboard', 'CashierController@index')->name('cashierdashboard');
    //Route::get('/search', 'CashierController@search')->name('search');
    //Route::get('/report', 'CashierController@report')->name('cashierreport');
    //Route::post('/report/generate', 'CashierController@generatereport')->name('cashiergeneratereport');
    //Route::get('/payment/{id}', 'CashierController@payment')->name('cashierpayment');
    //Route::get('/success/{id}', 'CashierController@success')->name('cashierpayment_success');
    //Route::post('/processpayment', 'CashierController@processpayment')->name('processpayment');
    //Route::get('/payment/pay/{id}/{billId}/{amount}', 'CashierController@addpay')->name('addpay');
    //Route::get('/payment/removepay/{id}/{billId}/', 'CashierController@removepay')->name('removepay');
    //Route::get('/concessionaires', 'ConcessionaireController@cashierConcessionaires')->name('cashierConcessionaires');
    //Route::get('/concessionaires/{id}', 'ConcessionaireController@cashierconcessionaire')->name('cashierconcessionaire_view');

    //Route::get('/dashboard', 'MeterController@index')->name('readerdashboard');
    Route::get('/reading', 'MeterController@reading')->name('reading');
    Route::post('/concessionaires/recordbill', 'BillController@recordbill')->name('admin.recordbill');
    Route::get('/report', 'AdminController@report')->name('readerreport');
    Route::get('/concessionaires', 'ConcessionaireController@readerConcessionaires')->name('readerConcessionaires');
    Route::get('/concessionaires/{id}', 'ConcessionaireController@readerconcessionaire')->name('readerconcessionaire');
    Route::get('/concessionaires/clark/{clark}', 'ConcessionaireController@clarkconcessionaire')->name('readerclarkconcessionaire');
    Route::post('/concessionaires/recordbill', 'BillController@recordbill')->name('recordbill');

});
Route::group(['middleware' =>'cashierAuth', 'prefix' => 'collector'], function(){

    Route::get('/dashboard', 'CollectorController@index')->name('cashierdashboard');
    Route::get('/search', 'CollectorController@search')->name('search');
    Route::get('/bill/search', 'CollectorController@search_bill')->name('search_bill');
    Route::get('/report', 'CollectorController@report')->name('cashierreport');
    Route::post('/report/generate', 'CollectorController@generatereport')->name('cashiergeneratereport');
    Route::get('/payment/{id}', 'CollectorController@payment')->name('cashierpayment');
    Route::get('/success/{id}', 'CollectorController@success')->name('cashierpayment_success');
    Route::get('/view_reciept/{id}', 'CollectorController@view_reciept')->name('view_reciept');
    Route::post('/processpayment', 'CollectorController@processpayment')->name('processpayment');
    Route::get('/payment/pay/{id}/{billId}/{amount}', 'CollectorController@addpay')->name('addpay');
    Route::get('/payment/removepay/{id}/{billId}/', 'CollectorController@removepay')->name('removepay');
    Route::get('/consumers', 'ConcessionaireController@cashier_consumers')->name('cashier_consumers');
    Route::get('/consumer/{id}', 'ConcessionaireController@cashier_consumer')->name('cashier_consumer');
});
Route::group(['middleware' =>'meterAuth', 'prefix' => 'reader'], function(){

    Route::get('/dashboard', 'MeterController@index')->name('readerdashboard');
    Route::get('/reading', 'MeterController@reading')->name('reader.reading');
    Route::post('/search_consumer', 'MeterController@search_consumer')->name('search_consumer');
    Route::get('/report', 'MeterController@report')->name('reader.report');
    Route::get('/concessionaires', 'ConcessionaireController@readerConcessionaires')->name('reader.Concessionaires');
    Route::get('/concessionaires/{id}', 'ConcessionaireController@readerconcessionaire')->name('reader.concessionaire');
    Route::get('/concessionaires/purok/{purok}', 'ConcessionaireController@view_purok_consumers')->name('view_purok_consumers');
    Route::post('/concessionaires/recordbill', 'BillController@recordbill')->name('reader.recordbill');
});

Route::group(['middleware' =>'consumerAuth', 'prefix' => 'consumer'], function(){

    Route::get('/dashboard', 'ConsumerController@index')->name('consumerdashboard');
    Route::get('/notification', 'ConsumerController@notifications')->name('consumernotifications');
    Route::get('/profile', 'ConsumerController@profile')->name('consumerprofile');
    Route::get('/bill/{billid}', 'ConsumerController@bill')->name('consumerbill');
    Route::get('/payment', 'ConsumerController@payment')->name('consumerpayment');
    Route::get('/calculator', 'ConsumerController@calculator')->name('consumercalculator');
   
});
