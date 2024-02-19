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
</style>

<div class="container">
    <h4>History</h4>
    <input type="text" id="searchInput" placeholder="Search...">
    <form action="{{ route('admin.orders.delete') }}" method="POST" id="deleteForm">
        @csrf
        <table>
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll"></th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Room</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Price</th>
                    <th>Activity</th>
                    <th>Status</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody id="orderTableBody">
                @foreach($orders->reverse() as $order)
                <tr>
                    <td><input type="checkbox" name="order_ids[]" value="{{$order->id}}"></td>
                    <td>{{$order->id}}</td>
                    <td>{{$order->guest->name}}</td>
                    <td>{{$order->train->nama}}</td>
                    <td>{{$order->checkin}}</td>
                    <td>{{$order->checkout}}</td>
                    <td>{{$order->harga}}</td>
                    <td>{{$order->nama_kegiatan}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->updated_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit">Delete Selected Orders</button>
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

    
</script>
@endsection