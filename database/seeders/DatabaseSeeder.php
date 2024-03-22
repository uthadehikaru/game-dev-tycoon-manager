<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@game.dev',
            'password' => Hash::make('gamedev'),
            'email_verified_at' => now(),
            'type' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@game.dev',
            'password' => Hash::make('userdev'),
            'email_verified_at' => now(),
            'type' => 'user',
        ]);

        $this->call([
            GenreSeeder::class,
            PlatformSeeder::class,
            TopicSeeder::class,
            TopicAudienceSeeder::class,
            PlatformAudienceSeeder::class,
            CompanySeeder::class,
            GameSeeder::class,
        ]);
    }
}
