<?php


Route::get('/', function () {
    return view('layouts/start');
});

Route::get('/workers' , 'WorkersController@showWorkers');
Route::post('/workers', 'WorkersController@showWorkers');

Route::get('/workers/{id_worker}', 'WorkerInfoController@workerShow')->name('workerShow');
Route::get('/profile/{id_worker}', 'WorkerInfoController@workerShow')->name('workerShow');

Route::get('/addSS', 'SettlementSheetsController@addSS')->name('addSS');
Route::post('/addSS', 'SettlementSheetsController@storeSS')->name('storeSS');

Route::get('/refreshSS', 'SettlementSheetsController@refreshSS')->name('refreshSS');
Route::post('/refreshSS', 'SettlementSheetsController@updateSS')->name('updateSS');
Route::post('/deleteStaff/{id}','StaffController@destroy')->name('destroy');

Route::post('/deleteSS/{{id_settlement_sheet}}', 'SettlementSheeetsController@deleteSS')->name('deleteSS');

//Route::post('/addworker', 'WorkerInfoController@storeWorker')->name('storeWorker');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

