@extends('admin.layouts.index')

<style>
    .table {
        font-size: 0.7rem;
    }
</style>

@section('content')
    <!-- content -->
    <div class="container">
        <h2>TC List</h2>

        <a href="/admin-training-center-store" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Insert</a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Lantai</th>
                        <th>Classroom</th>
                        <th>Teater</th>
                        <th>Round Table</th>
                        <th>U-Shape</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                        <tr>
                            <td>{{ $train->nama }}</td>
                            <td>{{ $train->lantai }}</td>

                            @foreach ($train->layout_models as $layout)
                                <td>{{ $layout->kapasitas }}</td>
                            @endforeach

                            <td>Rp {{ number_format($train->harga, 0, ',', '.') }}</td>
                            <td>{{ $train->deskripsi }}</td>
                            <td><img src="{{ asset('/storage/posts/' . $train->images()->where('konten', 'utama')->value('gambar')) }}"
                                    class="img-fluid rounded" alt="Train Image" width="100"></td>

                            <td class="d-flex justify-content-center">
                                <form class="mt-3" action="/admin-training-center-delete/{{ $train->id }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    <a href="{{ route('train.showedit', $train->id) }}" class="btn btn-warning me-1"><i class="fas fa-pen text-white py-1"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash text-white py-1"></i></button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
