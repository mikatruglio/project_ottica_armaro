<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'a.mariatina@alice.it'],
            [
                'name' => 'MariaTina',
                'password' => bcrypt(env('ADMIN1_PASSWORD', 'default1')),
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'giuseppe.truglio.1592@gmail.com'],
            [
                'name' => 'Peppe',
                'password' => bcrypt(env('ADMIN2_PASSWORD', 'default2')),
                'is_admin' => true,
            ]
        );
    }
}

