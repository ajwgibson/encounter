<?php

class RegistrationController extends BaseController {

	public function index()
	{
        $this->layout->with('subtitle', 'Registrations');

        $registrations = Registration::orderBy('created_at', 'desc')->paginate(25);

		$this->layout->content = 
			View::make('registrations.index')
				->with('registrations', $registrations);
	}

	public function register()
	{
        $this->layout->with('subtitle', 'Register a delegate');
		$this->layout->content = View::make('registrations.register');
	}

	public function search()
    {
        $ticket = Input::get('ticket');
        $name   = Input::get('name');

        if (empty($ticket) && empty($name)) {
            return Redirect::route('register')
                    ->with('message', 'You must provide at least one of the search criteria');
        } 

        if (!(empty($ticket))) {
            $bookings = 
            	Booking::where(function($query) use($ticket) {
                    $query->where('bookings.numbers', $ticket)
                          ->orWhere('bookings.numbers', 'LIKE', "$ticket,%")
                          ->orWhere('bookings.numbers', 'LIKE', "%,$ticket,%")
                          ->orWhere('bookings.numbers', 'LIKE', "%,$ticket");
                })->get();
        }

        if (!(empty($name)) && (!isset($bookings) or ($bookings->count() == 0))) {
            $bookings = 
            	Booking::where(function($query) use($name) {
                    $query->where('bookings.first', 'LIKE', "%$name%")
                          ->orWhere('bookings.last', 'LIKE', "%$name%");
                })->get();
        }

        $booking_count = $bookings->count();

        if ($booking_count == 0) {
            return Redirect::route('register')
                    ->withInput()
                    ->with('message', 'No booking found!');
        } 

        $this->layout->with('subtitle', 'Register a delegate');

        $this->layout->content = 
            View::make('registrations.register')
                ->with('bookings', $bookings);
    }

    public function register_booking()
    {
    	$booking_id = Input::get('booking_id');
    	$tickets = Input::get('tickets');

    	$booking = Booking::findOrFail($booking_id);
    	$booking->registrations()->save(new Registration(array('tickets' => $tickets)));

    	return Redirect::route('register')
		            ->withInput()
		            ->with('info', 'Registration complete!');
    }

    public function register_no_booking()
    {
    	$name    = Input::get('name');
    	$tickets = Input::get('tickets');

    	$validator = Validator::make(
		    array(
		    	'name' => $name, 
		    	'tickets' => $tickets),
		    array(
		    	'name' => array('required'),
		    	'tickets' => array('required', 'integer', 'min:1'))
		);

		if ($validator->fails()) {
            return Redirect::route('register')
                ->withInput()
                ->withErrors($validator);
        }

    	
    	Registration::create(array('tickets' => $tickets, 'name' => $name));

    	return Redirect::route('register')
		            ->with('info', 'Registration complete!');
    }
}
