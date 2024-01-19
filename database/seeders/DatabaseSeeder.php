<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Guest;
use App\Models\Train;
use App\Models\TrainFacility;
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
            'nama' => 'Reguler 101',
            'lantai' => 1,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 102',
            'lantai' => 1,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 201',
            'lantai' => 2,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 202',
            'lantai' => 2,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 203',
            'lantai' => 2,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 204',
            'lantai' => 2,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 301',
            'lantai' => 3,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 302',
            'lantai' => 3,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 303',
            'lantai' => 3,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 304',
            'lantai' => 3,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 401',
            'lantai' => 4,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Reguler 402',
            'lantai' => 4,
            'kap_class' => 30,
            'kap_teater' => 40,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room1.jpg',
        ]);

        Train::create([
            'nama' => 'Ujian Terbuka',
            'lantai' => 4,
            'kap_class' => 60,
            'kap_teater' => 90,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room2.jpg',
        ]);

        Train::create([
            'nama' => 'Aljabar',
            'lantai' => 5,
            'kap_class' => 40,
            'kap_teater' => 60,
            'harga' => 3000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room3.jpg',
        ]);

        Train::create([
            'nama' => 'Convention Hall',
            'lantai' => 5,
            'kap_class' => 130,
            'kap_teater' => 250,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
            'gambar' => 'images/room3.jpg',
        ]);

        TrainFacility::create([
            'train_id' => 1,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 1,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 1,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 1,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 2,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 2,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 2,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 2,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 3,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 3,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 3,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 3,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 4,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 4,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 4,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 4,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 5,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 5,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 5,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 5,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 6,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 6,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 6,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 6,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 7,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 7,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 7,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 7,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 8,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 8,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 8,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 8,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 9,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 9,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 9,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 9,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 10,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 10,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 10,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 10,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 11,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 11,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 11,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 11,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 12,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 12,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 12,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 12,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 13,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 13,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 13,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 13,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 14,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 14,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 14,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 14,
            'fasilitas' => 'Air Conditioner'
        ]);

        TrainFacility::create([
            'train_id' => 15,
            'fasilitas' => 'Sound'
        ]);

        TrainFacility::create([
            'train_id' => 15,
            'fasilitas' => 'Projector'
        ]);

        TrainFacility::create([
            'train_id' => 15,
            'fasilitas' => 'WiFi'
        ]);

        TrainFacility::create([
            'train_id' => 15,
            'fasilitas' => 'Air Conditioner'
        ]);
    }
}
