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
            <label>Gambar Utama</label>
            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'utama')->value('gambar')) }}" class="img-fluid rounded" width="200">
            <input type="file" class="form-control" name="gambar_utama" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Gambar Display 1</label>
            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa1')->value('gambar')) }}" class="img-fluid rounded" width="200">
            <input type="file" class="form-control" name="gambar_biasa1" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Gambar Display 2</label>
            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa2')->value('gambar')) }}" class="img-fluid rounded" width="200">
            <input type="file" class="form-control" name="gambar_biasa2" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Gambar DIsplay 3</label>
            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'biasa3')->value('gambar')) }}" class="img-fluid rounded" width="200">
            <input type="file" class="form-control" name="gambar_biasa3" accept="image/*">
        </div>

        <div class="mb-3">
            <label>Gambar Denah</label>
            <img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'denah')->value('gambar')) }}" class="img-fluid rounded" width="200">
            <input type="file" class="form-control" name="gambar_denah" accept="image/*">
        </div>

        <!-- Tambahkan input untuk kolom lainnya sesuai kebutuhan -->
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
@endsection
