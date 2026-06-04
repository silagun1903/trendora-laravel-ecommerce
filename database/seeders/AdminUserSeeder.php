<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::updateOrCreate(
            ['email' => 'admin@trendora.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('12345678'),
            ]
        );

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $adminUser->roles()->syncWithoutDetaching([
            $adminRole->id,
            $userRole->id,
        ]);
    }
}