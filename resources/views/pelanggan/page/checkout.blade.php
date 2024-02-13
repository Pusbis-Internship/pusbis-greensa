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
    @else
        <form action="/checkout-komplimen-langsung" method="POST"> @csrf
        <input type="hidden" name="item" value="{{ json_encode($item) }}">
    @endif
        <label>Surat Komplimen:</label><br>
        <input type="file" name="surat_komplimen"><br><br>
        <input type="submit" value="Checkout">
    </form>
</div>

<div id="form2" style="display:none;">
    <h2>Form Reguler</h2>
    @if ($fromCart == True)
        <form action="/checkout-reguler/{{ $cart->id }}" method="POST"> @csrf
    @else
        <form action="/checkout-reguler-langsung" method="POST"> @csrf
        <input type="hidden" name="item" value="{{ json_encode($item) }}">
    @endif
        <label>Pilih Pembayaran:</label><br>
        <select name="pilih_pembayaran">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select><br><br>
        <input type="submit" value="Checkout">
    </form>
</div>

<span>Item yang akan di-checkout</span>
<table style="border: 1px solid black;">

    @if ($fromCart == True)
        @foreach ($cart->items as $item)
        <tr>
            <td>{{ $item->train->nama }}</td>
            <td>   :   </td>
            <td>{{ $item->layout }}</td>
            <td>   :   </td>
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

</body>
