<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['email' => 'local@example.com'], ['name' => 'ララベル　太郎', 'password' => Hash::make('passw@rd'), 'email_verified_at' => now()]);
    }
}
