<?php

use Carbon\Carbon;

class Booking extends Eloquent {

	protected $table = 'bookings';


	// Define which properties should be treated as dates
  public function getDates()
  {
    $dates = parent::getDates();
    array_push($dates, 'ticket_date');
    return $dates;
  }


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


	// Have all the tickets on this booking been registered now?
  public function registered()
  {
    return $this->registration_count() >= $this->tickets;
  }


	// How many tickets on this booking are still to register?
  public function to_register()
  {
    return $this->tickets - $this->registration_count();
  }


	public function day_or_days()
	{
		return $this->ticket_date ? $this->ticket_date->format('d/m/Y (l)') : 'ALL';
	}


	// Can this booking be registered today?
	public function can_register_today()
	{
		if (isset($this->ticket_date)) {
		 	return $this->ticket_date == Carbon::today();
		}
		return true;
	}


	// Returns the name on the booking
  public function name()
  {
    return $this->first . ' ' . $this->last;
  }

}
