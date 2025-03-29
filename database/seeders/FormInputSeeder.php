<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormInputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('input_form')->insert([
            [
                'name' => 'John',
                'nim' => '2023071066',
                'prodi' => 'informatika',
            ],
            [
                'name' => 'Jane',
                'nim' => '2023071077',
                'prodi' => 'sistem informasi',
            ],
        ]);
        
    }
}
