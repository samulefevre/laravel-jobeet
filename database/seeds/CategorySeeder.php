<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Design'            
        ]);

        DB::table('categories')->insert([
            'name' => 'Programming'            
        ]);

        DB::table('categories')->insert([
            'name' => 'Manager'            
        ]);

        DB::table('categories')->insert([
            'name' => 'Administrator'            
        ]);
           
    }
}
