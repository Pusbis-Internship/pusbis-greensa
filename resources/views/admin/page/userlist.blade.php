@extends('admin.layouts.index')

@section('content')
<!-- content -->
<div class="container">
    <h2>List User</h2>

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Kota</th>
                <th>Provinsi</th>
                <th>Negara</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guests as $guest)
                <tr>
                    <td>{{ $guest->name }}</td>
                    <td>{{ $guest->telp }}</td>
                    <td>{{ $guest->alamat }}</td>
                    <td>{{ $guest->kota }}</td>
                    <td>{{ $guest->provinsi }}</td>
                    <td>{{ $guest->negara }}</td>
                    <td>
                        <form action="/admin-user-list-delete/{{ $guest->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
