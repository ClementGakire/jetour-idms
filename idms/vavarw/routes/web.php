<?php

Auth::routes();
Route::get('/', function () {
    return view('home');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('invoices', 'InvoiceController');

Route::resource('payments', 'PaymentController');

Route::get('po/export', 'RoadmapController@export');

Route::resource('po', 'RoadmapController');

Route::resource('roadmap', 'PoController');

Route::resource('institutions', 'InstitutionController');

Route::resource('contractors', 'ContractorController');

Route::resource('cars', 'CarsController');

Route::resource('charges', 'ChargesController');

Route::post('charges/{{$charge->id}}', 'ChargesController@update');

Route::resource('drivers', 'DriversController');

Route::post('drivers/{{$driver->id}}/edit', 'ChargesController@update');

Route::resource('expenses', 'ExpensesController');

Route::resource('suppliers', 'SuppliersController');

Route::resource('bills', 'BillsController');

Route::resource('roles', 'RoleController');

Route::resource('fuel', 'fuelController');

Route::resource('users', 'UsersController');


// Route::get('users', 'UsersController');

// Route::get('/users/{{$user->id}}/userEdit', 'InvoiceController@userEdit');


Route::get('payments/getStates/{name}','PaymentController@getStates');

Route::get('roadmap/getStates/{name}','PoController@getStates');



Route::group( ['middleware' => 'auth' ], function()
{
    Route::get('/', 'HomeController@index');
  
});