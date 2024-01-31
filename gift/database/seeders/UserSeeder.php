<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test1@example.com',
        //     'password' => '123',
        // ]);

        User::updateOrCreate(
            ['email' => 'test1@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('123'),
            ]
        );
    }
}
