<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::group(array('before' => 'auth.basic'), function()
{
	Route::get('/', array('as' => 'register', 'uses' => 'RegistrationController@register'));
	Route::get('bookings', array('as' => 'bookings', 'uses' => 'BookingController@index'));
	Route::get('registrations', array('as' => 'registrations', 'uses' => 'RegistrationController@index'));
	Route::post('search', array('as' => 'register.search', 'uses' => 'RegistrationController@search'));
	Route::post('register_booking', array('as' => 'register.booking', 'uses' => 'RegistrationController@register_booking'));
	Route::post('register_nobooking', array('as' => 'register.nobooking', 'uses' => 'RegistrationController@register_no_booking'));
});

