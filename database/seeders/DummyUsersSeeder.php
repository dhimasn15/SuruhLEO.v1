<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $UserData = [
           
            [
                'name'=> 'Dhimas',
                'email'=> 'userdhimas@gmail.com',
                'role'=> 'user',
                'password'=>bcrypt('123456')
            ]
           
            
           
            ];

            foreach($UserData as $key => $val){
                User::create($val);
            }
    }
}
