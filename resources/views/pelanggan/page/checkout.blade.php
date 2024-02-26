<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>

    <h2>Choose Form Type</h2>
    <form>
        <input type="radio" id="komplimen" name="formType" value="komplimen" onclick="showForm('komplimen')" checked>
        <label for="komplimen">Komplimen</label><br>
        <input type="radio" id="reguler" name="formType" value="reguler" onclick="showForm('reguler')">
        <label for="reguler">Reguler</label><br><br>
    </form>

    <div id="form1" style="display:block;">
        <h2>Form Komplimen</h2>
        @if ($fromCart == True)
            <form action="/checkout-komplimen/{{ $cart->id }}" method="POST"> @csrf
                <label>Nama Kegiatan:</label><br>
                <input type="text" name="nama_kegiatan" required><br><br>
                <label>Surat Komplimen:</label><br>
                <input type="file" name="surat_komplimen"><br><br>
                <input type="submit" value="Checkout">
            </form>
        @else
            <form action="/checkout-komplimen-langsung" method="POST"> @csrf
            <input type="hidden" name="item" value="{{ json_encode($item) }}">
                <label>Nama Kegiatan:</label><br>
                <input type="text" name="nama_kegiatan" required><br><br>
                <label>Surat Komplimen:</label><br>
                <input type="file" name="surat_komplimen"><br><br>
                <input type="submit" value="Checkout">
            </form>
        @endif
    </div>

    <div id="form2" style="display:none;">
        <h2>Form Reguler</h2>
        @if ($fromCart == True)
            <form action="/checkout-reguler{{ $cart->id }}" method="POST"> @csrf
                <label>Nama Kegiatan:</label><br>
                <input type="text" name="nama_kegiatan" required><br><br>
                <input type="button" id="pay-button" value="Checkout">
            </form>
        @else
            <form action="/checkout-reguler-langsung" method="POST"> @csrf
                <input type="hidden" name="item" value="{{ json_encode($item) }}">
                <label>Nama Kegiatan:</label><br>
                <input type="text" name="nama_kegiatan" required><br><br>
                <input type="button" id="pay-button" value="Checkout">
            </form>
        @endif
    </div>

    <span>Item yang akan di-checkout</span>
    <table style="border: 1px solid black;">

        @if ($fromCart == True)
            @foreach ($cart->items as $item)
            <tr>
                <td>{{ $item->train->nama }}</td>
                <td> : </td>
                <td>{{ $item->layout }}</td>
                <td> : </td>
                <td>{{ $item->checkin }}</td>
            </tr>
            @endforeach

        @else
            <tr>
                <td>{{ $train->nama }}</td>
                <td>   :   </td>
                <td>{{ $item['layout'] }}</td>
                <td>   :   </td>
                <td>{{ $item['checkin'] }}</td>
            </tr>
        @endif
    </table>

    <script>
        function showForm(formType) {
            if (formType === 'komplimen') {
                document.getElementById('form1').style.display = 'block';
                document.getElementById('form2').style.display = 'none';
            } else {
                document.getElementById('form1').style.display = 'none';
                document.getElementById('form2').style.display = 'block';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
            // Also, use the embedId that you defined in the div above, here.
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("waiting for your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>

</body>