<?php

use App\Uniform;
use Illuminate\Database\Seeder;

class UniformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uniform::truncate();
        Uniform::create([
        	'name'  => 'Muslim',
        	'price' => 115000
        ]);
    }
}
