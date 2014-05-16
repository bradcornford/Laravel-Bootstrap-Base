<?php

use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	/**
	 * Run the seeder.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		$count = 10;
		$faker = Faker::create('en_GB');

		for( $x = 0 ; $x < $count; $x++ )
		{
			User::create(array(
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => Hash::make('letmein')
			));
		}
	}
}