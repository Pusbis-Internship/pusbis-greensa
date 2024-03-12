<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Admin;
use App\Models\Guest;
use App\Models\Train;
use App\Models\CartItem;
use App\Models\TrainFacility;
use App\Models\LayoutModels;
use App\Models\TrainImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create admin
        Admin::create([
            'username' => 'admin@mail',
            'password' => bcrypt(1)
        ]);

        // create guest
        Guest::create([
            'name' => 'anon',
            'nik' => '123',
            'telp' => '123',
            'alamat' => 'sby',
            'kota' => 'sby',
            'provinsi' => 'sby',
            'negara' => 'sby',
            'username' => 'anon@mail',
            'email' => 'faridsyarifudin10@gmail.com',
            'password' => bcrypt(1)
        ]);

        Guest::create([
            'name' => 'anon2',
            'nik' => '234',
            'telp' => '234',
            'alamat' => 'sby',
            'kota' => 'sby',
            'provinsi' => 'sby',
            'negara' => 'sby',
            'username' => 'anon2@mail',
            'email' => 'anon2@mail',
            'password' => bcrypt(1)
        ]);

        // create train
        Train::create([
            'nama' => 'Reguler 101',
            'lantai' => 1,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 102',
            'lantai' => 1,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 201',
            'lantai' => 2,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 202',
            'lantai' => 2,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 203',
            'lantai' => 2,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 204',
            'lantai' => 2,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 301',
            'lantai' => 3,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 302',
            'lantai' => 3,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 303',
            'lantai' => 3,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 304',
            'lantai' => 3,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 401',
            'lantai' => 4,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Reguler 402',
            'lantai' => 4,
            'harga' => 2000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Ujian Terbuka',
            'lantai' => 4,
            'harga' => 3500000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Aljabar',
            'lantai' => 5,
            'harga' => 3000000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        Train::create([
            'nama' => 'Convention Hall',
            'lantai' => 5,
            'harga' => 8500000,
            'deskripsi' => 'Ini deskripsi dolor...',
        ]);

        // create facility
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

        // create layout
        LayoutModels::create([
            'train_id' => 1,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 1,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 1,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 1,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 2,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 2,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 2,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 2,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 3,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 3,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 3,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 3,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 4,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 4,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 4,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 4,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 5,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 5,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 5,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 5,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 6,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 6,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 6,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 6,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 7,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 7,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 7,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 7,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 8,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 8,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 8,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 8,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 9,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 9,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 9,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 9,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 10,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 10,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 10,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 10,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 11,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 11,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 11,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 11,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 12,
            'nama_layout' => 'Classroom',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 12,
            'nama_layout' => 'Teater',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 12,
            'nama_layout' => 'Round Table',
            'kapasitas' => 20
        ]);
        LayoutModels::create([
            'train_id' => 12,
            'nama_layout' => 'U Shape',
            'kapasitas' => 15
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 13,
            'nama_layout' => 'Classroom',
            'kapasitas' => 60
        ]);
        LayoutModels::create([
            'train_id' => 13,
            'nama_layout' => 'Teater',
            'kapasitas' => 90
        ]);
        LayoutModels::create([
            'train_id' => 13,
            'nama_layout' => 'Round Table',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 13,
            'nama_layout' => 'U Shape',
            'kapasitas' => 30
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 14,
            'nama_layout' => 'Classroom',
            'kapasitas' => 40
        ]);
        LayoutModels::create([
            'train_id' => 14,
            'nama_layout' => 'Teater',
            'kapasitas' => 60
        ]);
        LayoutModels::create([
            'train_id' => 14,
            'nama_layout' => 'Round Table',
            'kapasitas' => 30
        ]);
        LayoutModels::create([
            'train_id' => 14,
            'nama_layout' => 'U Shape',
            'kapasitas' => 20
        ]);
        // LAYOUTS MODEL
        LayoutModels::create([
            'train_id' => 15,
            'nama_layout' => 'Classroom',
            'kapasitas' => 130
        ]);
        LayoutModels::create([
            'train_id' => 15,
            'nama_layout' => 'Teater',
            'kapasitas' => 250
        ]);
        LayoutModels::create([
            'train_id' => 15,
            'nama_layout' => 'Round Table',
            'kapasitas' => 45
        ]);
        LayoutModels::create([
            'train_id' => 15,
            'nama_layout' => 'U Shape',
            'kapasitas' => 30
        ]);

        // create gambar
        // gambar train 01
        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 1,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 02
        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 2,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 03
        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 3,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 04
        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 4,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 05
        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 5,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 06
        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 6,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 07
        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 7,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 08
        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 8,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 09
        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 9,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 10
        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 10,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 11
        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 11,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 12
        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'utama',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'biasa1',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'biasa2',
            'gambar'    => 'room1.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 12,
            'konten'    => 'biasa3',
            'gambar'    => 'room1.jpg',
        ]);

        // gambar train 13
        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'utama',
            'gambar'    => 'room2.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'biasa1',
            'gambar'    => 'room2.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'biasa2',
            'gambar'    => 'room2.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 13,
            'konten'    => 'biasa3',
            'gambar'    => 'room2.jpg',
        ]);

        // gambar train 14
        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'utama',
            'gambar'    => 'room3.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'biasa1',
            'gambar'    => 'room3.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'biasa2',
            'gambar'    => 'room3.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 14,
            'konten'    => 'biasa3',
            'gambar'    => 'room3.jpg',
        ]);

        // gambar train 15
        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'denah',
            'gambar'    => 'denah101.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'utama',
            'gambar'    => 'room4.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'biasa1',
            'gambar'    => 'room4.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'biasa2',
            'gambar'    => 'room4.jpg',
        ]);

        TrainImage::create([
            'train_id'  => 15,
            'konten'    => 'biasa3',
            'gambar'    => 'room4.jpg',
        ]);

        // create cart
        Cart::create([
            'guest_id' => 1,
        ]);

        Cart::create([
            'guest_id' => 2,
        ]);
    }
}
