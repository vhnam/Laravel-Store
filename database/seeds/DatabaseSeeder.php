<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Category;

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

        Type::create([
            'name' => 'Others'
        ]);

        Brand::create([
            'name' => 'Others'
        ]);

        Category::create([
            'name' => 'Others'
        ]);
    }
}
