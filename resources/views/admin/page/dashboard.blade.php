@extends('admin.layouts.index')

@section('content')
<!-- content -->
<div class="container">
    <h2>TC List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Lantai</th>
                <th>Kapasitas Class</th>
                <th>Kapasitas Teater</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                
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
                    <td><img src="{{ $train->gambar }}" alt="Train Image" width="100"></td>
                  
                </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
@endsection
