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
        <input type="text" id="searchInput" placeholder="Search...">
        <button id="searchIcon" onclick="submitSearch()"><i class="fas fa-search"></i></button>
    </div>
    <form action="{{ route('admin.orders.delete') }}" method="POST" id="deleteForm">
        @csrf
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Room</th>
                    <th>
                        Check In
                    </th>
                    <th>Check Out</th>
                    <th>Price</th>
                    <th>Activity</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th>action</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @foreach($orders->where('status', 'Pending') as $order)
                <tr>
                    <td><input type="checkbox" name="order_ids[]" value="{{$order->id}}"></td>
                    <td>{{$order->id}}</td>
                    <td>{{$order->guest->name}}</td>
                    <td>{{$order->train->nama}}</td>
                    <td>{{$order->checkin}}</td>
                    <td>{{$order->checkout}}</td>
                    <td>{{$order->harga}}</td>
                    <td>{{$order->nama_kegiatan}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->status}}</td>

                    <td>
                        <!-- <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <select name="status">
                                <option value="Acc">Acc</option>
                                <option value="Reject">Reject</option>
                            </select>
                            <button type="submit">Submit</button>
                        </form> -->
                        ................
                    </td>
                    <td>
                        <form action="{{ route('admin.order.acc', $order->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="action-button"><i class="fas fa-check"></i></button>
                        </form>
                        <form action="{{ route('admin.order.reject', $order->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="action-button"><i class="fas fa-times"></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" onclick="submitForm(document.getElementById('deleteForm'))" class="delete-button"><i class="fas fa-trash"></i> </button>
    </form>
</div>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#orderTableBody tr');

        rows.forEach(row => {
            const columns = row.querySelectorAll('td');
            let found = false;
            columns.forEach(column => {
                const text = column.textContent.toLowerCase();
                if (text.includes(searchValue)) {
                    found = true;
                }
            });
            row.style.display = found ? '' : 'none';
        });
    });

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
</script>
@endsection