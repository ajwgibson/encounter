<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::group(array('before' => 'auth.basic'), function()
{
	Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));

	Route::get('register', array('as' => 'register', 'uses' => 'RegistrationController@register'));
	Route::post('search', array('as' => 'register.search', 'uses' => 'RegistrationController@search'));
	Route::post('register_booking', array('as' => 'register.booking', 'uses' => 'RegistrationController@register_booking'));
	Route::post('register_nobooking', array('as' => 'register.nobooking', 'uses' => 'RegistrationController@register_no_booking'));

	Route::get('bookings', array('as' => 'bookings', 'uses' => 'BookingController@index'));
	Route::post('bookings/filter',     array('as' => 'bookings.filter',      'uses' => 'BookingController@filter'));
    Route::get('bookings/resetfilter', array('as' => 'bookings.resetfilter', 'uses' => 'BookingController@resetFilter'));
	
	Route::get('registrations', array('as' => 'registrations', 'uses' => 'RegistrationController@index'));	
	Route::post('registrations/filter',     array('as' => 'registrations.filter',      'uses' => 'RegistrationController@filter'));
    Route::get('registrations/resetfilter', array('as' => 'registrations.resetfilter', 'uses' => 'RegistrationController@resetFilter'));
});

