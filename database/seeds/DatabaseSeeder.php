<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Andy Vo',
            'email' => 'admin@laravel-store.com',
            'password' => bcrypt('admin')
        ]);
    }
}
