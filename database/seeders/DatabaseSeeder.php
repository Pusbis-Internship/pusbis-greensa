<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Guest;
use App\Models\Train;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Guest::create([
            'name' => 'anon',
            'nik' => '123',
            'telp' => '123',
            'alamat' => 'sby',
            'kota' => 'sby',
            'provinsi' => 'sby',
            'negara' => 'sby',
            'username' => 'anon@mail',
            'email' => 'anon@mail',
            'password' => bcrypt(1)
        ]);

        Train::create([
            'nama' => 'Room 1',
            'lantai' => 1,
            'kapasitas' => 100,
            'harga' => 10000,
            'deskripsi' => 'Ini deskripsi',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Room 2',
            'lantai' => 1,
            'kapasitas' => 150,
            'harga' => 20000,
            'deskripsi' => 'Ini deskripsi',
            'gambar' => 'images/room2.jpg',
        ]);

        Train::create([
            'nama' => 'Room 3',
            'lantai' => 2,
            'kapasitas' => 100,
            'harga' => 10000,
            'deskripsi' => 'Ini deskripsi',
            'gambar' => 'images/room3.jpg',
        ]);

        Train::create([
            'nama' => 'Room 4',
            'lantai' => 2,
            'kapasitas' => 200,
            'harga' => 20000,
            'deskripsi' => 'Ini deskripsi',
            'gambar' => 'images/room4.jpg',
        ]);
    }
}
