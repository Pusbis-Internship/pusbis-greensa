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
                <th>Kapasitas Class</th>
                <th>Kapasitas Teater</th>
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
                <td>{{ $train->kap_class }}</td>
                <td>{{ $train->kap_teater }}</td>
                <td>{{ $train->harga }}</td>
                <td>{{ $train->deskripsi }}</td>
                <td><img src="{{asset('/storage/posts/'. $train->gambar) }}" alt="Train Image" width="100"></td>
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