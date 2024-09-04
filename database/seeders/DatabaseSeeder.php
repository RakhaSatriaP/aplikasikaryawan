<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;


use App\Models\User;
use App\Models\Employee;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Employee::factory(11)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $role = Role::create(['name' => 'user']);
        // $user = User::where('id', 1)->first();
        // $user->assignRole($role);

        // User::create(
        //     [
        //         'name' => 'Super Admin',
        //         'email' => 'rakha.satria40702@gmail.com',
        //         'password' => bcrypt('password'),
        //     ]
        // )->assignRole('superadmin');
    }
}
