<?php


Route::get('/', function () {
    return view('layouts/start');
});

Route::get('/about', function(){
    return view('/about');
});
Route::get('/workers' , 'WorkersController@showWorkers');
Route::post('/workers', 'WorkersController@showWorkers');
Route::post('showWorkers', 'WorkersController@showWorkers');

Route::get('/workers/{id_worker}', 'WorkerInfoController@workerShow')->name('workerShow');
Route::get('/profile/{id_worker}', 'WorkerInfoController@workerShow')->name('workerShow');

Route::get('/addSS', 'SettlementSheetsController@addSS')->name('addSS');
Route::post('/addSS', 'SettlementSheetsController@storeSS')->name('storeSS');

Route::get('/addUser', 'UsersController@addUser')->name('addUser');
Route::post('/addUser', 'UsersController@createUser')->name('createUser');

Route::get('/refreshSS', 'SettlementSheetsController@refreshSS')->name('refreshSS');
Route::post('/refreshSS', 'SettlementSheetsController@updateSS')->name('updateSS');
//Route::post('/deleteStaff/{id}','StaffController@destroy')->name('destroy');

Route::post('/profile/{{id_settlement_sheet}}', 'SettlementSheetsController@destroySS')->name('destroySS');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

