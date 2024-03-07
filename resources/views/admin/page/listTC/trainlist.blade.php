@extends('admin.layouts.index')

@section('content')
<!-- content -->
<div class="container">
    <h2>TC List</h2>

    <a href="/admin-training-center-store" class="btn btn-primary mb-3">Insert</a>

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
            @foreach($trains as $train)
            <tr>
                <td>{{ $train->nama }}</td>
                <td>{{ $train->lantai }}</td>

                @foreach ($train->layout_models as $layout)
                <td>{{ $layout->kapasitas }}</td>
                @endforeach

                <td>Rp {{ number_format($train->harga, 0, ',', '.')}}</td>
                <td>{{ $train->deskripsi }}</td>

                @foreach ($train->images as $image)
                <td>
                    <img src="{{ asset('/storage/posts/' . $image->gambar) }}" class="img-fluid rounded" alt="Train Image" width="100">
                </td>
                @break
                @endforeach

                <td>
                    <form action="/admin-training-center-delete/{{ $train->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        <a href="{{ route('train.showedit', $train->id) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>
</div>
@endsection