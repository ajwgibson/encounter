<?php

View::composer('registrations.register', function($view)
{
	$all = Registration::get()->sum('tickets');

	$today = Registration::where(DB::raw('DATE(registrations.created_at)'), DB::raw('CURDATE()'))->get()->sum('tickets');

	$view->with('registration_count_total', $all)
		 ->with('registration_count_today', $today);
});