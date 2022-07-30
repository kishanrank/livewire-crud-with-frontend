<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::whereEmail('admin@admin.com')->first();
        $user = User::whereEmail('user@user.com')->first();

        if (!$admin) {
            User::create([
                'name' => 'Admin Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'role' => User::ROLE_ADMIN
            ]);
        }

        if (!$user) {
            User::create([
                'name' => 'Admin User',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
                'role' => User::ROLE_USER
            ]);
        }

        Book::factory()->count(20)->create();
    }
}
