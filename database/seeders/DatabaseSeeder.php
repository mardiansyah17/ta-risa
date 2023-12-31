<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pemesanan;
use App\Models\Price;
use App\Models\Sesi;
use App\Models\User;
use App\Models\Venue;
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

        User::create([
            'id' => 1,
            'name' => 'Risa cantik',
            "email" => "risa@gmail.com",
            'phone' => '08123456789',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'id' => 2,
            'name' => 'admin',
            "email" => "admin@gmail.com",
            'role' => 'admin',
            'phone' => '08123456789',
            'password' => bcrypt('password'),
        ]);
        Venue::create([
            'id' => 1,
            'title' => 'Gedung Basket',
            'description' => 'Gedung Basket',
            'image' => '/venue/tenis.jpg',
            'type' => 'Indoor',
            'kapasistas' => '100',
            'nohp' => '08123456789',

        ]);
        Venue::create([
            'id' => 2,
            'title' => 'Gedung futsal',
            'description' => "Gedung futsal",
            'image' => '/venue/tenis.jpg',
            'type' => 'Indoor',
            'kapasistas' => '100',
            'nohp' => '08123456789',

        ]);
        Venue::create([
            'id' => 3,
            'title' => 'Lapangan sepak bola',
            'description' => "Lapangan sepak bola",
            'image' => '/venue/tenis.jpg',
            'type' => 'Indoor',
            'kapasistas' => '100',
            'nohp' => '08123456789',

        ]);

        Price::create([
            'id' => 1,
            'price' => '1000000',
            'venue_id' => 1,
        ]);
        Price::create([
            'id' => 2,
            'price' => '2000000',
            'venue_id' => 1,
        ]);

        Price::create([
            'id' => 3,
            'price' => '1000000',
            'venue_id' => 2,
        ]);
        Price::create([
            'id' => 4,
            'price' => '2000000',
            'venue_id' => 3,
        ]);

        Sesi::create([
            'jam_mulai' => "10.00",
            'jam_selesai' => "12.00",
            "tanggal" => "2023-08-07",
            'price_id' => 1,
        ]);
        Sesi::create([
            'jam_mulai' => "13.00",
            'jam_selesai' => "15.00",
            "tanggal" => "2023-08-07",
            'price_id' => 1,
        ]);
        Sesi::create([
            'jam_mulai' => "13.00",
            'jam_selesai' => "15.00",
            "tanggal" => "2023-08-010",
            'price_id' => 1,
        ]);

        Sesi::create([
            'jam_mulai' => "13.00",
            'jam_selesai' => "15.00",
            "tanggal" => "2023-08-08",
            'price_id' => 2,
        ]);
        Sesi::create([
            'jam_mulai' => "13.00",
            'jam_selesai' => "15.00",
            "tanggal" => "2023-08-010",
            'price_id' => 3,
        ]);

        Sesi::create([
            'jam_mulai' => "13.00",
            'jam_selesai' => "15.00",
            "tanggal" => "2023-08-011",
            'price_id' => 4,
        ]);
    }
}
