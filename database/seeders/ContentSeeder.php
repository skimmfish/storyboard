<?php

use Illuminate\Database\Seeder;
use App\Content;


class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
				DB::table('contents')->truncate();
		
		$faker = \Faker\Factory::create();
		
		foreach(range(1,45) as $index){
			
		Content::create([
		'post_title'=> $faker->sentence(3),
		'post_body' =>$faker->paragraph(),
		'publish_status'=>$faker->boolean(),
		'author'=>$faker->title(). ' '.$faker->sentence(1),
		'post_bg_img'=>$faker->word().'.jpg',
		'description'=>$faker->sentence(8)
			
		
		]);

		}
    }
}
