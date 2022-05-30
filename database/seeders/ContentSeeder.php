<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            'post_body' => Str::random(200),
            'post_title' => Str::random(30),
            'category' => Str::random(5),
            'post_bg_img'=>'img5.jpg',
            'description'=>Str::random(100),
            'publish_status'=>1,
            'user_id'=>1

        ]);
    }
}
