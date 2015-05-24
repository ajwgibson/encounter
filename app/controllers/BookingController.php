<?php

class BookingController extends BaseController {

	public function index()
	{
        $this->layout->with('subtitle', 'Bookings');

        $bookings = Booking::orderBy('last')->orderBy('first')->paginate(25);

		$this->layout->content = 
			View::make('bookings.index')
				->with('bookings', $bookings);
	}

}
