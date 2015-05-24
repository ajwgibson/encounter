<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		
		DB::table('bookings')->delete();
		DB::table('registrations')->delete();

		// Church bookings
		Booking::create(array( 'first' => 'Spencer', 	'last' => 'Kaur', 		'tickets' => 1,  'source' => 'Church', 'numbers' => '1' ));
		Booking::create(array( 'first' => 'Molly', 		'last' => 'Sharpe', 	'tickets' => 2,  'source' => 'Church', 'numbers' => '2,3' ));
		Booking::create(array( 'first' => 'Zara', 		'last' => 'Sharp', 		'tickets' => 4,  'source' => 'Church', 'numbers' => '32,34,36,38' ));
		Booking::create(array( 'first' => 'Archie', 	'last' => 'Field', 		'tickets' => 8,  'source' => 'Church', 'numbers' => '32,33,34,35,36,37,38,39'));
		Booking::create(array( 'first' => 'Charles', 	'last' => 'Dennis', 	'tickets' => 12, 'source' => 'Church', 'numbers' => '132,133,134,135,136,137,138,139,140,141,142' ));
		Booking::create(array( 'first' => 'Jack', 		'last' => 'Ryan', 		'tickets' => 1,  'source' => 'Church', 'numbers' => '501' ));
		Booking::create(array( 'first' => 'Charlotte', 	'last' => 'Crawford', 	'tickets' => 2,  'source' => 'Church', 'numbers' => '503,504' ));
		Booking::create(array( 'first' => 'Rebecca', 	'last' => 'Atkinson', 	'tickets' => 2,  'source' => 'Church', 'numbers' => '505,506' ));
		Booking::create(array( 'first' => 'Lara', 		'last' => 'Douglas', 	'tickets' => 2,  'source' => 'Church', 'numbers' => '602,605' ));
		Booking::create(array( 'first' => 'Harriet', 	'last' => 'Tucker', 	'tickets' => 1,  'source' => 'Church'));
		Booking::create(array( 'first' => 'Lilly', 		'last' => 'Charlton', 	'tickets' => 1,  'source' => 'Church'));
		Booking::create(array( 'first' => 'Logan', 		'last' => 'Clements', 	'tickets' => 2,  'source' => 'Church'));
		
		$booking = Booking::create(array( 'first' => 'Evie', 		'last' => 'Pritchard', 	'tickets' => 1,  'source' => 'Church'));
		$booking->registrations()->save(new Registration(array('tickets' => 2)));
		
		$booking = Booking::create(array( 'first' => 'Lara', 		'last' => 'Armstrong', 	'tickets' => 2,  'source' => 'Church'));
		$booking->registrations()->save(new Registration(array('tickets' => 2)));
		
		$booking = Booking::create(array( 'first' => 'Charlie', 	'last' => 'Slater', 	'tickets' => 6,  'source' => 'Church'));
		$booking->registrations()->save(new Registration(array('tickets' => 2)));
		
		$booking = Booking::create(array( 'first' => 'Rachel', 	'last' => 'Whittaker', 	'tickets' => 1,  'source' => 'Church'));
		$booking->registrations()->save(new Registration(array('tickets' => 1)));


		// EventBrite bookings
		Booking::create(array( 'first' => 'Lauren',		'last' => 'Conway', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Emily', 		'last' => 'Henderson', 	'tickets' => 2,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Sienna', 	'last' => 'Yates', 		'tickets' => 3,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Harrison', 	'last' => 'Carroll', 	'tickets' => 4,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Taylor', 	'last' => 'Palmer', 	'tickets' => 8,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Maya', 		'last' => 'Marsh', 		'tickets' => 10, 'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Riley', 		'last' => 'Farmer', 	'tickets' => 7,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Amelia', 	'last' => 'Ashton', 	'tickets' => 2,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Jonathan', 	'last' => 'Riley', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Anthony', 	'last' => 'Moss', 		'tickets' => 2,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Ellie', 		'last' => 'Henry', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Sofia', 		'last' => 'Phillips', 	'tickets' => 2,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Owen', 		'last' => 'Bartlett', 	'tickets' => 2,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Alicia', 	'last' => 'Jordan', 	'tickets' => 4,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Peter', 		'last' => 'Hancock', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Aidan', 		'last' => 'Walker', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Jennifer', 	'last' => 'Sinclair', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Georgina', 	'last' => 'Henry', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Jonathan', 	'last' => 'Barber', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Francesca', 	'last' => 'Rice', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Scott', 		'last' => 'Rowe', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Nathan', 	'last' => 'Gould', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Harley', 	'last' => 'May', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Brandon', 	'last' => 'Riley', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Brandon', 	'last' => 'Richardson', 'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Adam', 		'last' => 'Little', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Matthew', 	'last' => 'Duncan', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Daisy', 		'last' => 'Wall', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Louis', 		'last' => 'Potts', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Amelie', 	'last' => 'Bentley', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Harriet', 	'last' => 'Cameron', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Jude', 		'last' => 'Fraser', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Aidan', 		'last' => 'Farmer', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Rebecca', 	'last' => 'Wallace', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Lucas', 		'last' => 'Kaur', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Faith', 		'last' => 'Bartlett', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Luke', 		'last' => 'Cooke', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Lilly', 		'last' => 'Farrell', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Peter', 		'last' => 'Boyle', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'James', 		'last' => 'Kay', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Nicholas', 	'last' => 'Morley', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Mason', 		'last' => 'Kent', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Sofia', 		'last' => 'Freeman', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Isobel', 	'last' => 'Watts', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Andrew', 	'last' => 'Garner', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Henry', 		'last' => 'Farmer', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Louie', 		'last' => 'Fowler', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Amy', 		'last' => 'Doyle', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Rhys', 		'last' => 'Buckley', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Bradley', 	'last' => 'Warren', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Sean', 		'last' => 'Dennis', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Muhammad', 	'last' => 'Murphy', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Nicole', 	'last' => 'Robertson', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Aidan', 		'last' => 'Hicks', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Abigail', 	'last' => 'Page', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Kieran', 	'last' => 'Swift', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Isobel', 	'last' => 'Austin', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Jake', 		'last' => 'Bradley', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Yasmin', 	'last' => 'Davey', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Alice', 		'last' => 'Shepherd', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Taylor', 	'last' => 'Bradshaw', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Kian', 		'last' => 'Payne', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Sienna', 	'last' => 'Wilkins', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Eleanor', 	'last' => 'Collier', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Bradley', 	'last' => 'Griffiths', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Jay', 		'last' => 'Black', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Rachel', 	'last' => 'Duncan', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Harriet', 	'last' => 'Chadwick', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Michael', 	'last' => 'Hardy', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Courtney', 	'last' => 'Kennedy', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Jacob', 		'last' => 'North', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Tyler', 		'last' => 'Woods', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Isabelle', 	'last' => 'Smart', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Aaron', 		'last' => 'Norman', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Lydia', 		'last' => 'Newman', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Joe', 		'last' => 'Richards', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Zoe', 		'last' => 'Pollard', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Sam', 		'last' => 'Burke', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Isabel', 	'last' => 'Winter', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Francesca', 	'last' => 'Alexander', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Lily', 		'last' => 'Wall', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Cameron', 	'last' => 'Miah', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Summer', 	'last' => 'Khan', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Rebecca', 	'last' => 'Cooke', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Matthew', 	'last' => 'Davey', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Daisy', 		'last' => 'Khan', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Nathan', 	'last' => 'Gough', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Phoebe', 	'last' => 'Shaw', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Connor', 	'last' => 'Thomas', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Abby', 		'last' => 'Hurst', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Toby', 		'last' => 'Simmons', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Brooke', 	'last' => 'Shah', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Mia', 		'last' => 'Anderson', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Luca', 		'last' => "O'Sullivan", 'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Zachary', 	'last' => 'Welch', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Alex', 		'last' => 'Baker', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Eve', 		'last' => 'Wilkinson', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Oscar', 		'last' => 'Parkinson', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Alex', 		'last' => 'Butcher', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Zara', 		'last' => 'Miller', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Rosie', 		'last' => 'Smith', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Aaliyah', 	'last' => 'Morrison', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Adam', 		'last' => 'Fisher', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Louise', 	'last' => 'Francis', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Riley', 		'last' => 'James', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Gabriel', 	'last' => 'Andrews', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Millie', 	'last' => 'Fry', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Patrick', 	'last' => 'Carr', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Sofia', 		'last' => 'Gould', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Ethan', 		'last' => 'Humphries', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Liam', 		'last' => 'Douglas', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Taylor', 	'last' => 'Brady', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Yasmin', 	'last' => 'Hurst', 		'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Rosie', 		'last' => "O'Neill", 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Demi', 		'last' => 'Pickering', 	'tickets' => 1,  'source' => 'EventBrite' ));
		Booking::create(array( 'first' => 'Shannon', 	'last' => 'Shaw', 		'tickets' => 1,  'source' => 'EventBrite' ));


		// "On the day" registrations that couldn't be matched to bookings
		Registration::create(array('tickets' => 1, 'name' => 'Joseph Brown'));
		Registration::create(array('tickets' => 1, 'name' => 'Mark Black'));
	}

}
