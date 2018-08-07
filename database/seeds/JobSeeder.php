<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'category_id' => 2,
            'type' => 'full-time',
            'company' => 'Sensio Labs',
            'logo' => 'sensio-labs.gif',
            'url' => 'http://www.sensiolabs.com/',
            'position' => 'Web Developer',
            'location' => 'Paris, France',
            'description' => 'You\'ve already developed websites with symfony and you want to work with Open-Source technologies. You have a minimum of 3 years experience in web development with PHP or Java and you wish to participate to development of Web 2.0 sites using the best frameworks available.',
            'how_to_apply' => 'Send your resume to fabien.potencier [at] sensio.com',
            'is_public' => true,
            'is_activated' => true,
            'token' => 'job_sensio_labs',
            'email' => 'job@example.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'expires_at' => Carbon::create('2019','07','08')->toDateTimeString()
        ]);

        DB::table('jobs')->insert([
            'category_id' => 1,
            'type' => 'part-time',
            'company' => 'Extreme Sensio',
            'logo' => 'extreme-sensio.gif',
            'url' => 'http://www.extreme-sensio.com/',
            'position' => 'Web Designer',
            'location' => 'Paris, France',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.',
            'how_to_apply' => 'Send your resume to fabien.potencier [at] sensio.com',
            'is_public' => true,
            'is_activated' => true,
            'token' => 'job_extreme_sensio',
            'email' => 'job@example.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'expires_at' => Carbon::create('2020','08','06')->toDateTimeString()
        ]);

    }
}
