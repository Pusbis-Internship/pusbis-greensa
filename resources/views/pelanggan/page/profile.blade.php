@extends('pelanggan.layout.index')


@section('content')
<style>
    /* body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;

    } */

    #hotel {
        background: #fafafa;
        /* background: f2f2f2 linear; */
        /* height: 100vh; */
        width: 100%;
        padding: 100px 0px 100px 0px;
    }

    h2 {
        margin-top: 0;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="tel"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>

<section id="hotel">
    <div class="container">
        <h2>Edit Profil Pengguna</h2>
        <form action="{{ route('profile.update', ['id' => $guest->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="name" name="name" value="{{ $guest->name }}" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="number" id="nik" name="nik" value="{{ $guest->nik }}" required>
            </div>
            <div class="form-group">
                <label for="notelp">Nomor Telepon:</label>
                <input type="number" id="telp" name="telp" value="{{ $guest->telp }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" value="{{ $guest->alamat }}" required>
            </div>
            <div class="form-group">
                <label for="kota">Kota:</label>
                <input type="text" id="kota" name="kota" value="{{ $guest->kota }}" required>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi:</label>
                <input type="text" id="provinsi" name="provinsi" value="{{ $guest->provinsi }}" required>
            </div>
            <div class="form-group">
                <label for="negara">Negara:</label>
                <input type="text" id="negara" name="negara" value="{{ $guest->negara }}" required>
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggallahir" name="tanggallahir" value="{{ $guest->tanggallahir }}" required>
            </div>
            <input type="submit" value="Simpan">
        </form>
    </div>
</section>
@endsection