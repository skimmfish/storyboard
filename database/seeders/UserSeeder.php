<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('users')->truncate();
		
		$faker = \Faker\Factory::create();
		foreach(range(1,25) as $index){
		
			User::create([
			'name'=>$faker->name(),
			'email'=>$faker->email(),
			'password'=>$faker->password(),
			'url'=>$faker->url(),
			'telephone'=>'02092891192',
			'profile_img'=>$faker->word().'.png'
			
			]);
		}

    }
}
