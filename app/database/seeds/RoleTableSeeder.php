<?php

use Faker\Factory as Faker;

class RoleTableSeeder extends Seeder {

	/**
	 * Run the seeder.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('roles')->delete();

		$count = 5;
		$faker = Faker::create('en_GB');

		for( $x = 0 ; $x < $count; $x++ )
		{
			Role::create(array(
				'name' => $faker->word,
				'active' => $faker->randomNumber(0, 1)
			));
		}
	}
}