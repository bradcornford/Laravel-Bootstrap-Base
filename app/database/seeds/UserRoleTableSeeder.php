<?php

use Faker\Factory as Faker;

class UserRoleTableSeeder extends Seeder {

	/**
	 * Run the seeder.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('user_role')->delete();

		$faker = Faker::create('en_GB');
		$users = User::all()->toArray();
		$roles = Role::all()->toArray();

		foreach ($users as $user)
		{
			$count = rand(1, 5);

			for( $x = 0 ; $x < $count; $x++ )
			{
				UserRole::create(array(
					'user_id' => $user['id'],
					'role_id' => $faker->randomElement($roles)['id']
				));
			}
		}
	}
}