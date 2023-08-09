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
            'name' => 'Test User',
            "email" => "email@gmail.com",
            'phone' => '08123456789',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'id' => 2,
            'name' => 'admin',
            "email" => "admin@gmail.com",
            'phone' => '08123456789',
            'password' => bcrypt('password'),
        ]);
        Venue::create([
            'id' => 1,
            'title' => 'Gedung Basket',
            'description' => 'Gedung Basket',
            'image' => 'https://images.unsplash.com/photo-1612837017391-4b6b7b0b0b0b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmFza2V0JTIwZ2VkZ2V8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80',
            'type' => 'Indoor',
            'kapasistas' => '100',
            'nohp' => '08123456789',

        ]);
        Venue::create([
            'id' => 2,
            'title' => 'Gedung futsal',
            'description' => "Gedung futsal",
            'image' => 'https://images.unsplash.com/photo-1612837017391-4b6b7b0b0b0b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmFza2V0JTIwZ2VkZ2V8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80',
            'type' => 'Indoor',
            'kapasistas' => '100',
            'nohp' => '08123456789',

        ]);
        Venue::create([
            'id' => 3,
            'title' => 'Lapangan sepak bola',
            'description' => "Lapangan sepak bola",
            'image' => 'https://images.unsplash.com/photo-1612837017391-4b6b7b0b0b0b?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmFza2V0JTIwZ2VkZ2V8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80',
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

        Pemesanan::create([
            'user_id' => 1,
            "venue_id" => 1,
            "sesi_id" => 1,
            "status" => 'belum bayar',
            "kode_transaksi" => Pemesanan::generateTransactionCode()
        ]);

        Pemesanan::create([
            'user_id' => 1,
            "venue_id" => 2,
            "sesi_id" => 2,
            "status" => 'belum bayar',
            "kode_transaksi" => Pemesanan::generateTransactionCode()
        ]);

    }
}
