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

Route::get('/typeTaxes', 'TypeTaxesController@taxesShow')->name('taxesShow');

Route::post('/addTT', 'TypeTaxesController@addTT')->name('addTT');
Route::post('/addTT', 'TypeTaxesController@createTT')->name('createTT');

Route::get('/addSS', 'SettlementSheetsController@addSS')->name('addSS');
Route::post('/addSS', 'SettlementSheetsController@storeSS')->name('storeSS');

Route::get('/addUser', 'UsersController@addUser')->name('addUser');
Route::post('/addUser', 'UsersController@createUser')->name('createUser');

Route::get('/refreshUser', 'UsersController@refreshUser')->name('refreshUser');
Route::post('/refreshUser', 'UsersController@updateUser')->name('updateUser');

Route::get('/refreshSS', 'SettlementSheetsController@refreshSS')->name('refreshSS');
Route::post('/refreshSS', 'SettlementSheetsController@updateSS')->name('updateSS');
Route::post('/deleteSS/{id}','SettlementSheetsController@destroy')->name('destroy');

Route::post('/profile/{{id_settlement_sheet}}', 'SettlementSheetsController@destroySS')->name('destroySS');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
