<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'YM',
            'email' => 'm3@abv.bg',
            'password' => Hash::make('12345678'),
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@abv.bg',
            'password' => Hash::make('12345678'),
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('admins')->insert([
            'name' => 'Vtori',
            'email' => 'vpotr@abv.bg',
            'password' => Hash::make('12345678'),
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
