<?php

class Registration extends Eloquent {
	
	protected $table = 'registrations';

	protected $fillable = array('tickets', 'name');

	// Eager loading
    protected $with = array('booking');

	// Relationship: booking
	public function booking()
	{
		return $this->belongsTo('Booking');
	}

	// What is the name on the registration
    public function name()
    {
    	if ($this->booking) {
    		return $this->booking->first . ' ' . $this->booking->last;
    	} else {
    		return $this->name;
    	}
    }
}