<?php
	
class UserTableSeeder extends Seeder {
	
	public function run() {
		DB::table('users')->delete();
		
		$user = User::create(array(
			'username' => 'buddyboy',
			'password' => sha1('12345'),
			'email' => 'bryant.vietnam@gamil.com'
		));
		
		$faker = Faker\Factory::create();
		
		for($i = 0; $i < 3; $i++) {
			$user = User::create(array(
				'username' => $faker->userName,
				'password' => $faker->word,
				'email' => $faker->email
			));
		}
	}
}