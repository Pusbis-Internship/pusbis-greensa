@extends('admin.layouts.index')

@section('content')
<!-- content -->
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        border-radius: 20px;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
        font-weight: bold;
        text-transform: uppercase;
    }

    td {
        background-color: #fff;
        color: #666;
        border-bottom: 1px solid #ddd;
    }

    tr:nth-child(even) td {
        background-color: #f9f9f9;
    }

    tr:hover td {
        background-color: #f2f2f2;
    }

    #searchInput {
        padding: 2px;
        margin-bottom: 5px;
        border-radius: 10px;
        border: 1px solid #ccc;
    }

    #searchIcon {
        padding: 10px;
        border: none;
        background: transparent;
        cursor: pointer;
    }

    .delete-button {
        padding: 8px;
        background-color: #f44336;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #d32f2f;
    }

    .delete-button i {
        font-size: 18px;
    }

    .action-button {
        padding: 5px;
        margin: 5px 0;
        background-color: transparent;
        /* Ubah background menjadi transparan */
        color: black;
        border: 1px solid transparent;
        /* Jadikan border transparan secara default */
        border-radius: 5px;
        cursor: pointer;
        transition: border-color 0.3s;
        /* Animasi perubahan warna border */
    }

    .action-button:hover {
        background-color: #f2f2f2;
        /* Ubah background saat tombol dihover */
        border-color: #333;
        /* Ubah warna border menjadi hitam saat tombol dihover */
    }

    .action-button i {
        font-size: 16px;
        /* Perkecil ukuran ikon */
    }
</style>

<div class="container">
    <h1>Admin - Show Order</h1>
    <div style="position:relative;">
        <input type="text" id="searchUser" placeholder="Nama user">
        <input type="text" id="searchRuangan" placeholder="Ruangan">
        <input type="date" id="searchTanggalAwal" placeholder="Tanggal awal">
        <input type="date" id="searchTanggalAkhir" placeholder="Tanggal akhir">
        <input type="text" id="searchKegiatan" placeholder="Nama kegiatan">
    </div>
    <form action="{{ route('admin.orders.delete') }}" method="POST" id="deleteForm">
        @csrf
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>Customer Name</th>
                    <th>Room</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Price</th>
                    <th>Activity</th>
                    <th>action</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @foreach($orders as $order)
                @foreach($order->items->where('status', 'Pending') as $item)
                <tr>
                    <td><input type="checkbox" name="order_ids[]" value="{{$item->id}}"></td>
                    <td id="namaUser">{{$order->guest->name}}</td>
                    <td id="namaRuangan">{{$item->train->nama}}</td>
                    <td id="tanggalAwal">{{$item->checkin}}</td>
                    <td id="tanggalAkhir">{{$item->checkout}}</td>
                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td id="namaKegiatan">{{$order->nama_kegiatan}}</td>

                    <td>
                        <form action="">
                            @csrf
                        </form>
                        <form action="{{ route('admin.order.acc', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="action-button"><i class="fas fa-check"></i></button>
                        </form>
                        <form action="{{ route('admin.order.reject', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="action-button"><i class="fas fa-times"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        <button type="submit" onclick="submitForm(document.getElementById('deleteForm'))" class="delete-button"><i class="fas fa-trash"></i> </button>
    </form>
</div>
<script>
    // Search by namaUser
    document.getElementById('searchUser').addEventListener('keyup', searchTable);

    // Search by namaRuangan
    document.getElementById('searchRuangan').addEventListener('keyup', searchTable);

    // Search by namaKegiatan
    document.getElementById('searchKegiatan').addEventListener('keyup', searchTable);

    // Search by checkin date
    document.getElementById('searchTanggalAwal').addEventListener('change', searchTable);

    // Search by checkin date
    document.getElementById('searchTanggalAkhir').addEventListener('change', searchTable);

    function searchTable() {
        const searchValueUser = document.getElementById('searchUser').value.toLowerCase();
        const searchValueRuangan = document.getElementById('searchRuangan').value.toLowerCase();
        const searchValueKegiatan = document.getElementById('searchKegiatan').value.toLowerCase();
        const searchValueTanggalAwal = new Date(document.getElementById('searchTanggalAwal').value);
        const searchValueTanggalAkhir = new Date(document.getElementById('searchTanggalAkhir').value);
        const rows = document.querySelectorAll('#orderTableBody tr');

        rows.forEach(row => {
            const namaUser = row.querySelector('td#namaUser').textContent.toLowerCase();
            const namaRuangan = row.querySelector('td#namaRuangan').textContent.toLowerCase();
            const namaKegiatan = row.querySelector('td#namaKegiatan').textContent.toLowerCase();
            const tanggalAwal = new Date(row.querySelector('td#tanggalAwal').textContent);
            const tanggalAkhir = new Date(row.querySelector('td#tanggalAkhir').textContent);

            const foundUser = namaUser.includes(searchValueUser);
            const foundRuangan = namaRuangan.includes(searchValueRuangan);
            const foundKegiatan = namaKegiatan.includes(searchValueKegiatan);
            const isAfterTanggalAwal = tanggalAwal >= searchValueTanggalAwal;
            const isBeforeTanggalAkhir = tanggalAkhir <= searchValueTanggalAkhir;

            row.style.display = foundUser && foundRuangan && foundKegiatan && isAfterTanggalAwal && isBeforeTanggalAkhir ? '' : 'none';

        });
    }

    // Function to check/uncheck all checkboxes
    document.getElementById('checkAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('#orderTableBody input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    setInterval(function() {
        location.reload();
    }, 60000);

    // Get current date
    const currentDate = new Date();

    // Default tanggalAwal
    const firstDateOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 2);
    const formattedFirstDateOfMonth = firstDateOfMonth.toISOString().split('T')[0]; // Format as YYYY-MM-DD
    document.getElementById('searchTanggalAwal').value = formattedFirstDateOfMonth;

    // Default tanggalAkhir
    const lastDateOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0); // Get the last day of the next month, then subtract 1
    const formattedLastDateOfMonth = lastDateOfMonth.toISOString().split('T')[0]; // Format as YYYY-MM-DD
    document.getElementById('searchTanggalAkhir').value = formattedLastDateOfMonth;

</script>
@endsection