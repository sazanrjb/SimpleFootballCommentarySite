<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		\App\User::create(array(
			'name' => 'Sajan Rajbhandari',
			'username' => 'sazanrjb',
			'password' => Hash::make('test123')
		));

	}
}
