<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
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
        User::factory()
            ->count(1)
            ->create([
                'username'=>'admin',
                'email' => 'admin@example.org',
                'password' => Hash::make('1234'),
                'direction'=>'Dirección',
                'email_verified_at' => Carbon::now(),
            ])
            ->each(function ($user) {
                $user->assignRole('Admin');
            });
    }
}
