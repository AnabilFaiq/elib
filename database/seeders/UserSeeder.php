<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'faqih',
            'email' => 'faqih@gmail.com',
            'password' => bcrypt('1234')
        ]);
        
        User::create([
            'name' => 'sungjinwoo',
            'email' => 'sjw@gmail.com',
            'password' => bcrypt('1234')
        ]);
    }
}
