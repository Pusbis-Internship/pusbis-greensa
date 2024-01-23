<!-- admin/page/train_create.blade.php -->

@extends('admin.layouts.index')

@section('content')
<div class="container">
    <h2>Insert TC</h2>

    <!-- Form untuk menambahkan data -->
    <form action="{{ route('train.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Tambahkan input untuk setiap kolom pada tabel trains -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="lantai" class="form-label">Lantai</label>
            <input type="number" class="form-control" id="lantai" name="lantai" required>
        </div>

        <div class="mb-3">
            <label for="kap_class" class="form-label">kapasitas kelas</label>
            <input type="number" class="form-control" id="kap_class" name="kap_class" required>
        </div>

        <div class="mb-3">
            <label for="kap_teater" class="form-label">kapasitas teater</label>
            <input type="number" class="form-control" id="kap_teater" name="kap_teater" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">harga</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="textarea" class="form-control" id="deskripsi" name="deskripsi" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
        </div>

        <!-- Tambahkan input untuk kolom lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection
