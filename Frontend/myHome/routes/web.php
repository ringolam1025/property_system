<?php

Route::get('/', 'FNIndexController@index')->name('FNIndex.index');

Route::get('/propertyList', 'FNPropertyListController@index')->name('FNPropertyList.index');
Route::post('/propertyList', 'FNPropertyListController@index')->name('FNPropertyList.index');
Route::get('/propertyList/search', 'FNPropertyListController@search')->name('FNPropertyList.search');
Route::resource('/property', 'FNPropertyController');

/* WebPage */
Route::get('/aboutus', 'FNAboutUsController@index')->name('FNAboutUs.index');
Route::get('/contactus', 'FNContactUsController@index')->name('FNContactUs.index');
/* WebPage */

/* Member */
Route::get('/profile', 'FNProfileController@index')->name('FNProfile.index');
Route::get('/history', 'FNBrowseHistoryController@index')->name('FNBrowseHistory.index');
/* Member */

Route::get('/get/district', 'MasterController@getDistrict');

Route::group(['middleware' => ['get.menu']], function () {    
    //Route::get('/dashboard', function () { return view('dashboard.homepage'); });
    Route::group(['middleware' => ['role:user']], function () {
        Route::get('/data/appointment','AppointmentController@index');
        Route::get('/data/appointment/printPASP','AppointmentController@printPASP')->name('printPASP');;
    });
    Auth::routes();

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('users', 'UsersController')->except( ['create', 'store'] );
        Route::resource('roles', 'RolesController');
        Route::get('/roles/move/move-up',      'RolesController@moveUp')->name('roles.up');
        Route::get('/roles/move/move-down',    'RolesController@moveDown')->name('roles.down');       
        Route::prefix('menu/element')->group(function () { 
            Route::get('/',             'MenuElementController@index')->name('menu.index');
            Route::get('/move-up',      'MenuElementController@moveUp')->name('menu.up');
            Route::get('/move-down',    'MenuElementController@moveDown')->name('menu.down');
            Route::get('/create',       'MenuElementController@create')->name('menu.create');
            Route::post('/store',       'MenuElementController@store')->name('menu.store');
            Route::get('/get-parents',  'MenuElementController@getParents');
            Route::get('/edit',         'MenuElementController@edit')->name('menu.edit');
            Route::post('/update',      'MenuElementController@update')->name('menu.update');
            Route::get('/show',         'MenuElementController@show')->name('menu.show');
            Route::get('/delete',       'MenuElementController@delete')->name('menu.delete');
        });
        Route::prefix('menu/menu')->group(function () { 
            Route::get('/',         'MenuController@index')->name('menu.menu.index');
            Route::get('/create',   'MenuController@create')->name('menu.menu.create');
            Route::post('/store',   'MenuController@store')->name('menu.menu.store');
            Route::get('/edit',     'MenuController@edit')->name('menu.menu.edit');
            Route::post('/update',  'MenuController@update')->name('menu.menu.update');
            Route::get('/delete',   'MenuController@delete')->name('menu.menu.delete');
        });

        Route::prefix('data')->group(function () {
            /* Start Dashboard */
            Route::get('/dashboard','DashboardController@index');
            /* End Dashboard */   
            
            /* Start Agent */
            Route::prefix('/agent')->group(function () {
                Route::get('/', 'AgentController@index')->name('agent.index');
                Route::post('/search', 'AgentController@search')->name('agent.search');
                Route::get('/{id}/delete', 'AgentController@destroy')->name('agent.destroy');
                Route::post('/store', 'AgentController@store')->name('agent.store');
            });
            Route::resource('agent', 'AgentController');
            /* End Agent */

            /* Start searchHistory */
            Route::prefix('/searchHistory')->group(function () {
                Route::get('/', 'SearchHistoryController@index')->name('searchHistory.index');
                Route::post('/search', 'SearchHistoryController@search')->name('searchHistory.search');
                Route::get('/{id}/delete', 'SearchHistoryController@destroy')->name('searchHistory.destroy');
                Route::post('/store', 'SearchHistoryController@store')->name('searchHistory.store');
            });
            Route::resource('searchHistory', 'SearchHistoryController');
            /* End searchHistory */

            /* Start Appointment */
            Route::prefix('/appointment')->group(function () {
                Route::get('/','AppointmentController@index');
                Route::post('/create','AppointmentController@create');
                Route::post('/update','AppointmentController@update');
                Route::post('/delete','AppointmentController@destroy');
            });            
            /* End Appointment */

            /* Start Template */
            Route::prefix('/template')->group(function () {
                Route::get('/', 'TemplateController@index')->name('template.index');
                Route::post('/search', 'TemplateController@search')->name('template.search');
                Route::get('/{id}/delete', 'TemplateController@destroy')->name('template.destroy');
                Route::post('/store', 'TemplateController@store')->name('template.store');
            });
            Route::resource('template', 'TemplateController');
            /* End Template */

            /* Start Sub District */
            Route::prefix('/subdistrict')->group(function () {
                Route::get('/', 'subDistrictController@index')->name('subdistrict.index');
                Route::post('/search', 'subDistrictController@search')->name('subdistrict.search');
                Route::get('/{id}/delete', 'subDistrictController@destroy')->name('subdistrict.destroy');
                Route::post('/store', 'subDistrictController@store')->name('subdistrict.store');
            });
            Route::resource('subdistrict', 'subDistrictController');
            /* End Sub District */

            /* Start District */
            Route::prefix('/district')->group(function () {
                Route::get('/', 'DistrictController@index')->name('district.index');
                Route::post('/search',       'DistrictController@search')->name('district.search');
                Route::get('/{id}/delete', 'DistrictController@destroy')->name('district.destroy');
                Route::post('/store', 'DistrictController@store')->name('district.store');
            });
            Route::resource('district', 'DistrictController');
            /* End District */           

            /* Start Branch */
            Route::prefix('/branch')->group(function () {
                Route::get('/', 'BranchController@index')->name('branch.index');
                Route::post('/search', 'BranchController@search')->name('branch.search');
                Route::get('/{id}/delete', 'BranchController@destroy')->name('branch.destroy');
                Route::post('/store', 'BranchController@store')->name('branch.store');
            });
            Route::resource('branch', 'BranchController');
            /* End Branch */

            /* Start Estate */
            Route::prefix('/estate')->group(function () {
                Route::get('/', 'EstateController@index')->name('estate.index');
                Route::post('/search', 'EstateController@search')->name('estate.search');
                Route::get('/{id}/delete', 'EstateController@destroy')->name('estate.destroy');
                Route::post('/store', 'EstateController@store')->name('estate.store');
            });
            Route::resource('estate', 'EstateController');
            /* End Estate */

            /* Start Phase */
            Route::prefix('/phase')->group(function () {
                Route::get('/', 'PhaseController@index')->name('phase.index');
                Route::post('/search', 'PhaseController@search')->name('phase.search');
                Route::get('/{id}/delete', 'PhaseController@destroy')->name('phase.destroy');
                Route::post('/store', 'PhaseController@store')->name('phase.store');
            });
            Route::resource('phase', 'PhaseController');
            /* End Phase */
            
            /* Start Property */
            Route::prefix('/property')->group(function () {
                Route::get('/', 'PropertyController@index')->name('property.index');
                Route::post('/search', 'PropertyController@search')->name('property.search');
                Route::get('/{id}/delete', 'PropertyController@destroy')->name('property.destroy');
                Route::post('/store', 'PropertyController@store')->name('property.store');
            });
            Route::resource('property', 'PropertyController');
            /* End Property */

            /* Start Customer */
            Route::prefix('/customer')->group(function () {
                Route::get('/', 'CustomerController@index')->name('customer.index');
                Route::post('/search', 'CustomerController@search')->name('customer.search');
                Route::get('/{id}/delete', 'CustomerController@destroy')->name('customer.destroy');
                Route::post('/store', 'CustomerController@store')->name('customer.store');
            });
            Route::resource('customer', 'CustomerController');
            /* End Customer */
        });
        
    });
});