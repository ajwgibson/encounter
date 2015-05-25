<?php

class HomeController extends BaseController {

    public function index()
	{
		$thursday = Registration::where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 5)->sum('tickets');
		$friday   = Registration::where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 6)->sum('tickets');
		$saturday = Registration::where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 7)->sum('tickets');

        $this->layout->with('subtitle', 'home');

		$this->layout->content = 
			View::make('home')
				->with('thursday_registration_count', $thursday)
				->with('friday_registration_count',   $friday)
				->with('saturday_registration_count', $saturday);
	}

}