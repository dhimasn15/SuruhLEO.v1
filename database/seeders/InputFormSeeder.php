<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InputForm;

class InputFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        InputForm::create([
            'name' => 'Contoh Nama',
            'no_telp' => '08123456789',
            'prodi' => 'Informatika',
            'gender' => 'male',
            'description' => 'Deskripsi contoh untuk testing'
        ]);
    }
}
