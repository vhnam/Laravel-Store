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

        Type::create([
            'name' => 'Rotary Trumpet'
        ]);

        Type::create([
            'name' => 'D Trumpet'
        ]);

        Type::create([
            'name' => 'Bb Trumpet'
        ]);

        Type::create([
            'name' => 'C Trumpet'
        ]);

        Type::create([
            'name' => 'Alto Saxophone'
        ]);

        Type::create([
            'name' => 'Tenor Saxophone'
        ]);

        Type::create([
            'name' => 'Soprano Saxophone'
        ]);

        Brand::create([
            'name' => 'Others',
            'photo' => 'unknown.png',
            'description' => 'No Brand'
        ]);

        Brand::create([
            'name' => 'Vincent Bach',
            'photo' => 'vincent-bach.png',
            'description' => 'The Vincent Bach Corporation is an American manufacturer of brass musical instruments that began early in the twentieth century and still exists as a subsidiary of Conn-Selmer, a division of Steinway Musical Instruments.'
        ]);

        Brand::create([
            'name' => 'Yamaha',
            'photo' => 'yamaha.png',
            'description' => "Since 1887, when it began producing reed organs, the Yamaha Corporation in Japan (then Nippon Gakki Co., Ltd.) has grown to become the world's largest manufacturer of a full line of musical instruments, and a leading producer of audio/visual products, semiconductors and other computer related products, sporting goods, home appliances and furniture, specialty metals, machine tools, and industrial robots."
        ]);

        Brand::create([
            'name' => 'Yanagisawa',
            'photo' => 'yanagisawa.png',
            'description' => 'Yanagisawa Wind Instruments is a Japanese woodwind company known for its range of professional grade saxophones. Along with Yamaha they are one of the leading manufacturers of saxophones in Japan. The company currently manufactures sopranino, soprano, alto, tenor and baritone saxophones.'
        ]);

        Category::create([
            'name' => 'Others'
        ]);

        Category::create([
            'name' => 'Trombone'
        ]);

        Category::create([
            'name' => 'Trumpet'
        ]);

        Category::create([
            'name' => 'Saxophone'
        ]);

        Category::create([
            'name' => 'Clarinet'
        ]);
    }
}
