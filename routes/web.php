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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'Controller@contact')->name('contact');
Route::get('/about', 'Controller@about')->name('about');
Route::get('/admin', 'AdminController@login')->name('admin');
Route::get('/cashier', 'CashierController@login')->name('cashier');
Route::get('/reader', 'MeterController@login')->name('reader');
Route::get('/consumer', 'ConsumerController@login')->name('consumer');
Route::post('/applysuccess', 'ConsumerController@registerconcessionaire')->name('registerconcessionaire');
Route::post('/error', 'ConsumerController@error')->name('error');
Route::get('/apply', 'ConsumerController@apply')->name('apply');

Route::post('/admin/login', 'LoginController@adminLogin')->name('admin.login');
Route::post('/cashier/login', 'LoginController@cashierLogin')->name('cashier.login');
Route::post('/reader/login', 'LoginController@readerLogin')->name('reader.login');
Route::post('/consumer/login', 'LoginController@consumerLogin')->name('consumer.login');

Route::group(['middleware' =>'adminAuth', 'prefix' => 'admin'], function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/collectibles', 'AdminController@collectibles')->name('collectibles');
    Route::get('/payments', 'AdminController@payments')->name('payments');
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
    Route::post('/report/generate', 'AdminController@generatereport')->name('generatereport');
    Route::get('/messages', 'AdminController@messages')->name('messages');
    Route::get('/reminders', 'AdminController@reminders')->name('reminders');
    Route::get('/notifications', 'AdminController@notifications')->name('notifications');

    Route::post('/search', 'ConcessionaireController@searchConcessionaire')->name('searchConcessionaire');
    Route::get('/search', 'ConcessionaireController@searchConcessionaire')->name('searchConcessionaire');
    Route::get('/concessionaire', 'ConcessionaireController@readConcessionaire')->name('concessionaire');
    Route::get('/concessionaire/connected', 'ConcessionaireController@connectedConcessionaire')->name('connectedConcessionaire');
    Route::get('/concessionaire/disconnected', 'ConcessionaireController@disconnectedConcessionaire')->name('disconnectedConcessionaire');
    Route::get('/concessionaire/pending', 'ConcessionaireController@applicantConcessionaire')->name('applicantConcessionaire');
    Route::get('/concessionaire/{id}', 'ConcessionaireController@concessionaire')->name('singleconcessionaire');
    Route::get('/concessionaires/clark/{clark}', 'ConcessionaireController@viewClark')->name('singleconcessionaire');
    Route::post('/concessionaire/addconcessionaire', 'ConcessionaireController@addConcessionaire')->name('addconcessionaire');
    Route::post('/concessionaire/editconcessionaire', 'ConcessionaireController@editConcessionaire')->name('editconcessionaire');
    Route::post('/concessionaire/deleteconcessionaire', 'ConcessionaireController@deleteConcessionaire')->name('deleteconcessionaire');

    Route::get('/disconnect/{meternum}', 'ConcessionaireController@disconnect')->name('disconnect');
    Route::get('/reconnect/{meternum}', 'ConcessionaireController@reconnect')->name('reconnect');
});
Route::group(['middleware' =>'cashierAuth', 'prefix' => 'cashier'], function(){

    Route::get('/dashboard', 'CashierController@index')->name('dashboard');
    Route::get('/search', 'CashierController@search')->name('search');
    Route::get('/report', 'CashierController@report')->name('report');
    Route::post('/report/generate', 'CashierController@generatereport')->name('generatereport');
    Route::get('/payment/{id}', 'CashierController@payment')->name('cashierconcessionaire');
    Route::get('/success/{id}', 'CashierController@success')->name('cashierconcessionaire');
    Route::post('/processpayment', 'CashierController@processpayment')->name('processpayment');
    Route::get('/payment/pay/{id}/{billId}/{amount}', 'CashierController@addpay')->name('addpay');
    Route::get('/payment/removepay/{id}/{billId}/', 'CashierController@removepay')->name('addpay');
    Route::get('/concessionaires', 'ConcessionaireController@cashierConcessionaires')->name('cashierConcessionaires');
    Route::get('/concessionaires/{id}', 'ConcessionaireController@cashierconcessionaire')->name('cashierconcessionaire');
    

});
Route::group(['middleware' =>'meterAuth', 'prefix' => 'reader'], function(){

    Route::get('/dashboard', 'MeterController@index')->name('dashboard');
    Route::get('/reading', 'MeterController@reading')->name('reading');
    Route::get('/report', 'MeterController@report')->name('report');
    Route::get('/concessionaires', 'ConcessionaireController@readerConcessionaires')->name('readerConcessionaires');
    Route::get('/concessionaires/{id}', 'ConcessionaireController@readerconcessionaire')->name('readerconcessionaire');
    Route::get('/concessionaires/clark/{clark}', 'ConcessionaireController@clarkconcessionaire')->name('clarkconcessionaire');
    Route::post('/concessionaires/recordbill', 'BillController@recordbill')->name('readerconcessionaire');
});

Route::group(['middleware' =>'consumerAuth', 'prefix' => 'consumer'], function(){

    Route::get('/dashboard', 'ConsumerController@index')->name('dashboard');
    Route::get('/notification', 'ConsumerController@notifications')->name('notifications');
    Route::get('/profile', 'ConsumerController@profile')->name('profile');
    Route::get('/bill/{billid}', 'ConsumerController@bill')->name('bill');
    Route::get('/payment', 'ConsumerController@payment')->name('payment');
    Route::get('/calculator', 'ConsumerController@calculator')->name('calculator');
   
});
