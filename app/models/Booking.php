<?php

class Booking extends Eloquent {
	
	protected $table = 'bookings';

	// Relationship: registrations
	public function registrations()
	{
		return $this->hasMany('Registration');
	}


	// How many delegates have been registered against this booking
    public function registration_count()
    {
    	if ($this->registrations) {
    		return $this->registrations->sum('tickets');
    	} else {
    		return 0;
    	}
    }
}