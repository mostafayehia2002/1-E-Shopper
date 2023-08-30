<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\password;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::create([

            'name'=>'mostafa',
            'password'=>'12345678',
            'email'=>'gad993813@gmail.com',
            'status'=>'1',
        ]);
    }
}
