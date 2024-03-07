<!-- admin/page/train_create.blade.php -->

@extends('admin.layouts.index')

@section('content')
<div class="container">
    <h2>Edit TC</h2>

    <!-- Form untuk menambahkan data -->
    <form action="{{ route('train.edit', $train->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Tambahkan input untuk setiap kolom pada tabel trains -->
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ $train->nama }}" required>
        </div>

        <div class="mb-3">
            <label for="lantai" class="form-label">Lantai</label>
            <input type="number" class="form-control" name="lantai" value="{{ $train->lantai }}" required>
        </div>

        @foreach ($train->layout_models as $layout)
        <div class="mb-3">
            <label for="kap_class" class="form-label">Kapasitas {{ $layout->nama_layout }}</label>
            <input type="number" class="form-control" name="kap_{{ $layout->nama_layout }}" value="{{ $layout->kapasitas }}" required>
        </div>
        @endforeach

        <div class="mb-3">
            <label for="harga" class="form-label">harga</label>
            <input type="number" class="form-control" name="harga" value="{{ $train->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="textarea" class="form-control" name="deskripsi" value="{{ $train->deskripsi }}" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" value="{{ $train->gambar }}" accept="image/*">
        </div>

        <!-- Tambahkan input untuk kolom lainnya sesuai kebutuhan -->
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection
