<?php

class RegistrationController extends BaseController {

    /**
     * Displays the registration page.
     */
	public function register()
	{
        $this->layout->with('subtitle', 'Register a delegate');
		$this->layout->content = View::make('registrations.register');
	}

    /**
     * Performs the registration customer/ticket search and displays the results.
     */
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

    /**
     * Creates a registration record for a booking.
     */
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

    /**
     * Creates a registration record without a booking.
     */
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

    /**
     * Displays a tabular list of registrations.
     */
    public function index()
    {
        $this->layout->with('subtitle', 'Registrations');

        $registrations = 
            Registration::orderBy('registrations.created_at', 'desc');

        $filtered = false;
        $filter_name     = Session::get('registrations_filter_name',     '');
        $filter_thursday = Session::get('registrations_filter_thursday', '');
        $filter_friday   = Session::get('registrations_filter_friday',   '');
        $filter_saturday = Session::get('registrations_filter_saturday', '');

        if (!(empty($filter_name))) {
            $registrations = $registrations
                ->join('bookings', 'registrations.booking_id', '=', 'bookings.id', 'left outer')
                ->addSelect('registrations.*')
                ->addSelect('bookings.first')
                ->addSelect('bookings.last')
                ->where(function($query) use($filter_name) {
                    $query->where('bookings.first',       'LIKE', "%$filter_name%")
                          ->orWhere('bookings.last',      'LIKE', "%$filter_name%")
                          ->orWhere('registrations.name', 'LIKE', "%$filter_name%");
                }); 
            $filtered = true;
        }

        if (!(empty($filter_thursday))) {
            $registrations = $registrations->where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 5);
            $filtered = true;
        }

        if (!(empty($filter_friday))) {
            $registrations = $registrations->where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 6);
            $filtered = true;
        }

        if (!(empty($filter_saturday))) {
            $registrations = $registrations->where(DB::raw('DAYOFWEEK(registrations.created_at)'), '=', 7);
            $filtered = true;
        }

        $registrations = $registrations->paginate(25);

        $this->layout->content = 
            View::make('registrations.index')
                ->with('registrations', $registrations)
                ->with('filtered', $filtered)
                ->with('filter_name', $filter_name)
                ->with('filter_thursday', $filter_thursday)
                ->with('filter_friday', $filter_friday)
                ->with('filter_saturday', $filter_saturday);
    }

    /**
     * Changes the list filter values in the session
     * and redirects back to the index to force the filtered
     * list to be displayed.
     */
    public function filter()
    {
        $filter_name     = Input::get('filter_name');
        $filter_thursday = Input::get('filter_thursday');
        $filter_friday   = Input::get('filter_friday');
        $filter_saturday = Input::get('filter_saturday');
        
        Session::put('registrations_filter_name',      $filter_name);
        Session::put('registrations_filter_thursday',  $filter_thursday);
        Session::put('registrations_filter_friday',    $filter_friday);
        Session::put('registrations_filter_saturday',  $filter_saturday);

        return Redirect::route('registrations');
    }

    
    /**
     * Removes the list filter values from the session
     * and redirects back to the index to force the 
     * list to be displayed.
     */
    public function resetFilter()
    {
        if (Session::has('registrations_filter_name'))       Session::forget('registrations_filter_name');
        if (Session::has('registrations_filter_thursday'))   Session::forget('registrations_filter_thursday');
        if (Session::has('registrations_filter_friday'))     Session::forget('registrations_filter_friday');
        if (Session::has('registrations_filter_saturday'))   Session::forget('registrations_filter_saturday');

        return Redirect::route('registrations');
    }
}
