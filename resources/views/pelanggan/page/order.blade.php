@extends('pelanggan.layout.index')

@section('content')

<div class="h-100">
    <h1>.</h1>
    <h1>.</h1>
    <h1>.</h1>
    
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Checkin</th>
                <th>Item</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $index => $order)
            @foreach ($order->items as $item)
            <tr>
                <td>{{ $index + 1}}</td>
                <td>{{ $item->checkin }}</td>
                <td>{{ $item->train->nama }}</td>
                <td>{{ $order->status }}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>

</div>

@endsection