@extends('admin.layouts.index')

@section('content')
    <!-- content -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 5px;
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
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        tr:hover td {
            background-color: #f2f2f2;
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

        .success-message {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>

    <div class="container mb-5">
        <h4 class="mb-4">History</h4>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Nama User</label>
                <input type="text" class="form-control" id="searchUser" placeholder="Nama User">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Ruangan</label>
                <input type="text" class="form-control" id="searchRuangan" placeholder="Ruangan">
            </div>
            <div class="col-md-2">
                <label for="formGroupExampleInput" class="form-label">Tanggal Awal</label>
                <input type="date" class="form-control" id="searchTanggalAwal" placeholder="Tanggal Awal">
            </div>
            <div class="col-md-2">
                <label for="formGroupExampleInput" class="form-label">Tanggal Akhir</label>
                <input type="date" class="form-control" id="searchTanggalAkhir" placeholder="Tanggal Akhir">
            </div>
            <div class="col-md-2">
                <label for="formGroupExampleInput" class="form-label">Kegiatan</label>
                <input type="text" class="form-control" id="searchKegiatan" placeholder="Kegiatan">
            </div>

            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Status</label>
                <select id="searchStatus" class="form-select" aria-label="Default select example">
                    <option value="All" selected>All</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>

            <div class="col-6">
                <label for="formGroupExampleInput" class="form-label">Tipe</label>
                <select id="searchTipe" class="form-select" aria-label="Default select example">
                    <option value="All" selected>All</option>
                    <option value="Komplimen">Komplimen</option>
                    <option value="Reguler">Reguler</option>
                </select>
            </div>
            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.orders.delete') }}" method="POST" id="deleteForm">
                @csrf
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"></th>
                            <th>Pemesan</th>
                            <th>Ruangan</th>
                            <th>Check-In</th>
                            <th>Check-Out</th>
                            <th>Harga</th>
                            <th>Kegiatan</th>
                            <th>Status</th>
                            <th>Tipe</th>
                        </tr>
                    </thead>
                    <tbody id="orderTableBody">
                        @foreach ($orders->reverse() as $order)
                            @foreach ($order->items as $item)
                                <tr>
                                    <td><input type="checkbox" name="order_ids[]" value="{{ $item->id }}"></td>
                                    <td id="namaUser">{{ $order->guest->name }}</td>
                                    <td id="namaRuangan">{{ $item->train->nama }}</td>
                                    <td id="tanggalAwal">{{ $item->checkin }}</td>
                                    <td id="tanggalAkhir">{{ $item->checkout }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td id="namaKegiatan">{{ $order->nama_kegiatan }}</td>
                                    <td id="status">{{ $item->status }}</td>
                                    @if ($order->surat === null)
                                        <td id="tipe">Reguler</td>
                                    @else
                                        <td id="tipe"><a href="">Komplimen</a></td>
                                    @endif
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

                @if ($orders->isNotEmpty())
                    <button type="submit" onclick="validateAndDelete()" class="delete-button w-100 mb-3"><i
                            class="fas fa-trash"></i></button>


                    <a href="{{ route('admin.export') }}" class="btn btn-success text-white w-100">Export Excel</a>
                @endif
            </form>

        </div>
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

        // Search by status
        document.getElementById('searchStatus').addEventListener('change', searchTable);

        // Search by type
        document.getElementById('searchTipe').addEventListener('change', searchTable);

        function searchTable() {
            const searchValueUser = document.getElementById('searchUser').value.toLowerCase();
            const searchValueRuangan = document.getElementById('searchRuangan').value.toLowerCase();
            const searchValueKegiatan = document.getElementById('searchKegiatan').value.toLowerCase();
            const searchValueTanggalAwal = new Date(document.getElementById('searchTanggalAwal').value);
            const searchValueTanggalAkhir = new Date(document.getElementById('searchTanggalAkhir').value);
            const searchValueStatus = document.getElementById('searchStatus').value.toLowerCase();
            const searchValueTipe = document.getElementById('searchTipe').value.toLowerCase();
            const rows = document.querySelectorAll('#orderTableBody tr');

            rows.forEach(row => {
                const namaUser = row.querySelector('td#namaUser').textContent.toLowerCase();
                const namaRuangan = row.querySelector('td#namaRuangan').textContent.toLowerCase();
                const namaKegiatan = row.querySelector('td#namaKegiatan').textContent.toLowerCase();
                const tanggalAwal = new Date(row.querySelector('td#tanggalAwal').textContent);
                const tanggalAkhir = new Date(row.querySelector('td#tanggalAkhir').textContent);
                const status = row.querySelector('td#status').textContent.toLowerCase();
                const tipe = row.querySelector('td#tipe').textContent.toLowerCase();

                const foundUser = namaUser.includes(searchValueUser);
                const foundRuangan = namaRuangan.includes(searchValueRuangan);
                const foundKegiatan = namaKegiatan.includes(searchValueKegiatan);
                const isAfterTanggalAwal = tanggalAwal >= searchValueTanggalAwal;
                const isBeforeTanggalAkhir = tanggalAkhir <= searchValueTanggalAkhir;
                const foundStatus = searchValueStatus === 'all' || status === searchValueStatus; // Perbaikan disini
                const foundTipe = searchValueTipe === 'all' ? true : tipe === searchValueTipe;

                row.style.display = foundUser && foundRuangan && foundKegiatan && isAfterTanggalAwal &&
                    isBeforeTanggalAkhir && foundStatus && foundTipe ? '' : 'none';
            });
        }
        // Function to check/uncheck all checkboxes
        document.getElementById('checkAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('#orderTableBody input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Get current date
        const currentDate = new Date();

        // Default tanggalAwal
        const firstDateOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 2);
        const formattedFirstDateOfMonth = firstDateOfMonth.toISOString().split('T')[0]; // Format as YYYY-MM-DD
        document.getElementById('searchTanggalAwal').value = formattedFirstDateOfMonth;

        // Default tanggalAkhir
        const lastDateOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1,
            0); // Get the last day of the next month, then subtract 1
        const formattedLastDateOfMonth = lastDateOfMonth.toISOString().split('T')[0]; // Format as YYYY-MM-DD
        document.getElementById('searchTanggalAkhir').value = formattedLastDateOfMonth;
    </script>

    <script>
        function validateAndDelete() {
            // Memeriksa apakah setidaknya satu checkbox terpilih
            const checkboxes = document.querySelectorAll('#orderTableBody input[type="checkbox"]');
            let isAnyChecked = false;
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    isAnyChecked = true;
                }
            });

            // Jika tidak ada yang dipilih, tampilkan pesan kesalahan
            if (!isAnyChecked) {
                alert("pilih salah satu order.");
                return false;
            }

            // Jika ada yang dipilih, tampilkan konfirmasi penghapusan
            if (confirm("apakah anda yakin?")) {
                // Jika pengguna mengonfirmasi, kirimkan formulir penghapusan
                document.getElementById('deleteForm').submit();
            } else {
                // Jika pengguna membatalkan, tidak melakukan apa-apa
                return false;
            }
        }
    </script>
@endsection
