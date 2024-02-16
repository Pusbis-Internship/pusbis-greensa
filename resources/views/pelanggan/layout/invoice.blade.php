<style>
    table {
        border: 1px solid black;
    }

    th, td {
        border: 1px solid black;
        min-width: 120px; /* Adjust the value according to your requirement */
        padding: 8px; /* Add padding for better spacing */
        text-align: center; /* Optional: Align content to center */
    }
</style>

<h2>Invoice</h2>
<h3>Untuk Kegiatan: {{ $namaKegiatan }}</h3>

<table>
    <thead>
        <th>No</th>
        <th>Nama Ruangan</th>
        <th>Layout</th>
        <th>Check-In</th>
        <th>Check-Out</th>
        <th>Status</th>
        <th>Harga</th>
    </thead>
        
    <tbody>
        @foreach ($orders as $index => $order)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $order->train->nama }}</td>
            <td>{{ $order->layout }}</td>
            <td>{{ $order->checkin }}</td>
            <td>{{ $order->checkout }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->harga }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="6">Total Harga</td>
            <td>{{ $totalHarga }}</td>
        </tr>
    </tbody>
</table>