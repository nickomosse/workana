<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/servicetypes', 'ServiceTypeController@index')->name('servicetypes.index');
Route::get('/admin/servicetypes/create', 'ServiceTypeController@create')->name('servicetypes.create');
Route::get('/admin/servicetypes/{id}/edit', 'ServiceTypeController@edit')->name('servicetypes.edit');
Route::get('/admin/servicetypes/show/{id}', 'ServiceTypeController@show')->name('servicetypes.show');
Route::post('/admin/servicetypes/', 'ServiceTypeController@store')->name('servicetypes.store');
Route::put('/admin/servicetypes/{id}', 'ServiceTypeController@update')->name('servicetypes.update');
Route::delete('/admin/servicetypes/{id}', 'ServiceTypeController@destroy')->name('servicetypes.destroy');

Route::get('/admin/services', 'ServiceController@index')->name('services.index');
Route::get('/admin/services/create', 'ServiceController@create')->name('services.create');
Route::get('/admin/services/{id}/edit', 'ServiceController@edit')->name('services.edit');
Route::get('/admin/services/show/{id}', 'ServiceController@show')->name('services.show');
Route::post('/admin/services/', 'ServiceController@store')->name('services.store');
Route::put('/admin/services/{id}', 'ServiceController@update')->name('services.update');
Route::delete('/admin/services/{id}', 'ServiceController@destroy')->name('services.destroy');

Route::get('/admin/employeetypes', 'EmployeeTypeController@index')->name('employeetypes.index');
Route::get('/admin/employeetypes/create', 'EmployeeTypeController@create')->name('employeetypes.create');
Route::get('/admin/employeetypes/{id}/edit', 'EmployeeTypeController@edit')->name('employeetypes.edit');
Route::get('/admin/employeetypes/show/{id}', 'EmployeeTypeController@show')->name('employeetypes.show');
Route::post('/admin/employeetypes/', 'EmployeeTypeController@store')->name('employeetypes.store');
Route::put('/admin/employeetypes/{id}', 'EmployeeTypeController@update')->name('employeetypes.update');
Route::delete('/admin/employeetypes/{id}', 'EmployeeTypeController@destroy')->name('employeetypes.destroy');

Route::get('/admin/jobfunctions', 'JobFunctionController@index')->name('jobfunctions.index');
Route::get('/admin/jobfunctions/create', 'JobFunctionController@create')->name('jobfunctions.create');
Route::get('/admin/jobfunctions/{id}/edit', 'JobFunctionController@edit')->name('jobfunctions.edit');
Route::get('/admin/jobfunctions/show/{id}', 'JobFunctionController@show')->name('jobfunctions.show');
Route::post('/admin/jobfunctions/', 'JobFunctionController@store')->name('jobfunctions.store');
Route::put('/admin/jobfunctions/{id}', 'JobFunctionController@update')->name('jobfunctions.update');
Route::delete('/admin/jobfunctions/{id}', 'JobFunctionController@destroy')->name('jobfunctions.destroy');

Route::get('/admin/employees', 'EmployeeController@index')->name('employees.index');
Route::get('/admin/employees/create', 'EmployeeController@create')->name('employees.create');
Route::get('/admin/employees/{id}/edit', 'EmployeeController@edit')->name('employees.edit');
Route::get('/admin/employees/show/{id}', 'EmployeeController@show')->name('employees.show');
Route::post('/admin/employees/', 'EmployeeController@store')->name('employees.store');
Route::put('/admin/employees/{id}', 'EmployeeController@update')->name('employees.update');
Route::delete('/admin/employees/{id}', 'EmployeeController@destroy')->name('employees.destroy');

Route::get('/admin/cakebatters', 'CakeBatterController@index')->name('cakebatters.index');
Route::get('/admin/cakebatters/create', 'CakeBatterController@create')->name('cakebatters.create');
Route::get('/admin/cakebatters/{id}/edit', 'CakeBatterController@edit')->name('cakebatters.edit');
Route::get('/admin/cakebatters/show/{id}', 'CakeBatterController@show')->name('cakebatters.show');
Route::post('/admin/cakebatters/', 'CakeBatterController@store')->name('cakebatters.store');
Route::put('/admin/cakebatters/{id}', 'CakeBatterController@update')->name('cakebatters.update');
Route::delete('/admin/cakebatters/{id}', 'CakeBatterController@destroy')->name('cakebatters.destroy');

Route::get('/admin/cakefillings', 'CakeFillingController@index')->name('cakefillings.index');
Route::get('/admin/cakefillings/create', 'CakeFillingController@create')->name('cakefillings.create');
Route::get('/admin/cakefillings/{id}/edit', 'CakeFillingController@edit')->name('cakefillings.edit');
Route::get('/admin/cakefillings/show/{id}', 'CakeFillingController@show')->name('cakefillings.show');
Route::post('/admin/cakefillings/', 'CakeFillingController@store')->name('cakefillings.store');
Route::put('/admin/cakefillings/{id}', 'CakeFillingController@update')->name('cakefillings.update');
Route::delete('/admin/cakefillings/{id}', 'CakeFillingController@destroy')->name('cakefillings.destroy');
Route::get('/admin/pieces', 'PieceController@index');

Route::get('/admin/meals', 'MealController@index')->name('meals.index');
Route::get('/admin/meals/create', 'MealController@create')->name('meals.create');
Route::get('/admin/meals/{id}/edit', 'MealController@edit')->name('meals.edit');
Route::get('/admin/meals/show/{id}', 'MealController@show')->name('meals.show');
Route::post('/admin/meals/', 'MealController@store')->name('meals.store');
Route::put('/admin/meals/{id}', 'MealController@update')->name('meals.update');
Route::delete('/admin/meals/{id}', 'MealController@destroy')->name('meals.destroy');

Route::get('/admin/themes', 'ThemeController@index')->name('themes.index');
Route::get('/admin/themes/create', 'ThemeController@create')->name('themes.create');
Route::get('/admin/themes/{id}/edit', 'ThemeController@edit')->name('themes.edit');
Route::get('/admin/themes/show/{id}', 'ThemeController@show')->name('themes.show');
Route::post('/admin/themes/', 'ThemeController@store')->name('themes.store');
Route::put('/admin/themes/{id}', 'ThemeController@update')->name('themes.update');
Route::delete('/admin/themes/{id}', 'ThemeController@destroy')->name('themes.destroy');

Route::get('/admin/bonifications', 'BonificationController@index')->name('bonifications.index');
Route::get('/admin/bonifications/create', 'BonificationController@create')->name('bonifications.create');
Route::get('/admin/bonifications/{id}/edit', 'BonificationController@edit')->name('bonifications.edit');
Route::get('/admin/bonifications/show/{id}', 'BonificationController@show')->name('bonifications.show');
Route::post('/admin/bonifications/', 'BonificationController@store')->name('bonifications.store');
Route::put('/admin/bonifications/{id}', 'BonificationController@update')->name('bonifications.update');
Route::delete('/admin/bonifications/{id}', 'BonificationController@destroy')->name('bonifications.destroy');


Route::get('/admin/partytimes/config', 'PartyTimeController@partyTimeConfigsEdit')->name('partyTimeMinInterval.edit');
Route::put('/admin/partytimes/config', 'PartyTimeController@partyTimeConfigsUpdate')->name('partyTimeMinInterval.update');

Route::get('/admin/partytimes', 'PartyTimeController@index')->name('partytimes.index');
Route::get('/admin/partytimes/create', 'PartyTimeController@create')->name('partytimes.create');
Route::get('/admin/partytimes/{id}/edit', 'PartyTimeController@edit')->name('partytimes.edit');
Route::get('/admin/partytimes/show/{id}', 'PartyTimeController@show')->name('partytimes.show');
Route::post('/admin/partytimes/', 'PartyTimeController@store')->name('partytimes.store');
Route::put('/admin/partytimes/{id}', 'PartyTimeController@update')->name('partytimes.update');
Route::delete('/admin/partytimes/{id}', 'PartyTimeController@destroy')->name('partytimes.destroy');

Route::get('/admin/unities', 'UnityController@index')->name('unities.index');
Route::get('/admin/unities/create', 'UnityController@create')->name('unities.create');
Route::get('/admin/unities/{id}/edit', 'UnityController@edit')->name('unities.edit');
Route::get('/admin/unities/show/{id}', 'UnityController@show')->name('unities.show');
Route::post('/admin/unities/', 'UnityController@store')->name('unities.store');
Route::put('/admin/unities/{id}', 'UnityController@update')->name('unities.update');
Route::delete('/admin/unities/{id}', 'UnityController@destroy')->name('unities.destroy');

Route::get('/admin/rooms', 'RoomController@index')->name('rooms.index');
Route::get('/admin/rooms/create', 'RoomController@create')->name('rooms.create');
Route::get('/admin/rooms/{id}/edit', 'RoomController@edit')->name('rooms.edit');
Route::get('/admin/rooms/show/{id}', 'RoomController@show')->name('rooms.show');
Route::post('/admin/rooms/', 'RoomController@store')->name('rooms.store');
Route::put('/admin/rooms/{id}', 'RoomController@update')->name('rooms.update');
Route::delete('/admin/rooms/{id}', 'RoomController@destroy')->name('rooms.destroy');

Route::get('/admin/packages', 'PackageController@index')->name('packages.index');
Route::get('/admin/packages/create', 'PackageController@create')->name('packages.create');
Route::get('/admin/packages/{id}/edit', 'PackageController@edit')->name('packages.edit');
Route::get('/admin/packages/show/{id}', 'PackageController@show')->name('packages.show');
Route::post('/admin/packages/', 'PackageController@store')->name('packages.store');
Route::put('/admin/packages/{id}', 'PackageController@update')->name('packages.update');
Route::delete('/admin/packages/{id}', 'PackageController@destroy')->name('packages.destroy');

// ????????????????????????????????????????????????????
Route::get('/admin/packages/{id}/rooms', 'PackageController@viewRooms')->name('packages.rooms');
Route::post('/admin/packages/{id}/rooms/attach', 'PackageController@attachRooms')->name('packages.rooms.attach');
Route::post('/admin/packages/{id}/rooms/dettach', 'PackageController@dettachRooms')->name('packages.rooms.dettach');

Route::get('/admin/referrals', 'ReferralController@index')->name('referrals.index');
Route::get('/admin/referrals/create', 'ReferralController@create')->name('referrals.create');
Route::get('/admin/referrals/{id}/edit', 'ReferralController@edit')->name('referrals.edit');
Route::get('/admin/referrals/show/{id}', 'ReferralController@show')->name('referrals.show');
Route::post('/admin/referrals/', 'ReferralController@store')->name('referrals.store');
Route::put('/admin/referrals/{id}', 'ReferralController@update')->name('referrals.update');
Route::delete('/admin/referrals/{id}', 'ReferralController@destroy')->name('referrals.destroy');

Route::get('/admin/observations', 'ObservationController@index')->name('observations.index');
Route::get('/admin/observations/create', 'ObservationController@create')->name('observations.create');
Route::get('/admin/observations/{id}/edit', 'ObservationController@edit')->name('observations.edit');
Route::get('/admin/observations/show/{id}', 'ObservationController@show')->name('observations.show');
Route::post('/admin/observations/', 'ObservationController@store')->name('observations.store');
Route::put('/admin/observations/{id}', 'ObservationController@update')->name('observations.update');
Route::delete('/admin/observations/{id}', 'ObservationController@destroy')->name('observations.destroy');

Route::get('/admin/signal/config', 'PaymentController@signalConfigsEdit')->name('signalConfigs.edit');
Route::put('/admin/signal/config', 'PaymentController@signalConfigsUpdate')->name('signalConfigs.update');
Route::get('/admin/signal/config/method/{name}/enable', 'PaymentController@signalEnable')->name('signal.enable');
Route::get('/admin/signal/config/method/{name}/disable', 'PaymentController@signalDisable')->name('signal.disable');
Route::post('/admin/signal/config/method/add', 'PaymentController@signalAdd')->name('signal.add');
Route::get('/admin/signal/config/method/del/{name}', 'PaymentController@signalDel')->name('signal.del');

Route::get('/admin/payments/config', 'PaymentController@paymentsConfigsEdit')->name('paymentsConfigs.edit');
Route::put('/admin/payments/config', 'PaymentController@paymentsConfigsUpdate')->name('paymentsConfigs.update');
Route::get('/admin/payments/config/method/{name}/enable', 'PaymentController@paymentsEnable')->name('payments.enable');
Route::get('/admin/payments/config/method/{name}/disable', 'PaymentController@paymentsDisable')->name('payments.disable');
Route::post('/admin/payments/config/method/add', 'PaymentController@paymentsAdd')->name('payments.add');
Route::get('/admin/payments/config/method/del/{name}', 'PaymentController@paymentsDel')->name('payments.del');


Route::get('/admin/estimates', 'EstimateController@index')->name('estimates.index');
Route::get('/admin/estimates/create', 'EstimateController@create')->name('estimates.create');
Route::get('/admin/estimates/{id}/edit', 'EstimateController@edit')->name('estimates.edit');
Route::get('/admin/estimates/show/{id}', 'EstimateController@show')->name('estimates.show');
Route::post('/admin/estimates/', 'EstimateController@store')->name('estimates.store');
Route::put('/admin/estimates/{id}', 'EstimateController@update')->name('estimates.update');
Route::get('/admin/estimates/search', 'EstimateController@search')->name('estimates.search');
Route::post('/admin/estimates/results', 'EstimateController@results')->name('estimates.results');
Route::get('/admin/estimates/{id}/contract', 'EstimateController@contract')->name('estimates.contract');

Route::get('/admin/contracts', 'ContractController@index')->name('contracts.index');
Route::get('/admin/contracts/create', 'ContractController@create')->name('contracts.create');
Route::get('/admin/contracts/{id}/edit', 'ContractController@edit')->name('contracts.edit');
Route::get('/admin/contracts/show/{id}', 'ContractController@show')->name('contracts.show');
Route::post('/admin/contracts/', 'ContractController@store')->name('contracts.store');
Route::put('/admin/contracts/{id}', 'ContractController@update')->name('contracts.update');
Route::get('/admin/contracts/search', 'ContractController@search')->name('contracts.search');
Route::post('/admin/contracts/results', 'ContractController@results')->name('contracts.results');


Route::get('/admin/reports', 'ReportController@index')->name('reports.index');
Route::get('/admin/reports/clients/search', 'ReportController@clientssearch')->name('reports.clientssearch');
