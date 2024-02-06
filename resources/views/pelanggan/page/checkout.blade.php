<body onload="showForm('komplimen')">

<h2>Choose Form Type</h2>
<form>
    <input type="radio" id="komplimen" name="formType" value="komplimen" onclick="showForm('komplimen')" checked>
    <label for="komplimen">Komplimen</label><br>
    <input type="radio" id="reguler" name="formType" value="reguler" onclick="showForm('reguler')">
    <label for="reguler">Reguler</label><br><br>
</form>

<div id="form1" style="display:none;">
    <h2>Form Komplimen</h2>
    <form action="/submit_form1" method="post" enctype="multipart/form-data">
        <label for="nama_kegiatan">Nama Kegiatan:</label><br>
        <input type="text" id="nama_kegiatan" name="nama_kegiatan" required><br>
        <label for="surat_komplimen">Surat Komplimen:</label><br>
        <input type="file" id="surat_komplimen" name="surat_komplimen" required><br><br>
        <input type="submit" value="Checkout">
    </form>
</div>

<div id="form2" style="display:none;">
    <h2>Form Reguler</h2>
    <form action="/submit_form2" method="post">
        <label for="pilih_pembayaran">Pilih Pembayaran:</label><br>
        <select id="pilih_pembayaran" name="pilih_pembayaran">
            <option value="option1">Option 1</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select><br><br>
        <input type="submit" value="Checkout">
    </form>
</div>

<span>Item yang akan di-checkout</span>
<table style="border: 1px solid black;">
    @foreach ($cart->items as $item)
        <tr>
            <td>{{ $item->train->nama }}</td>
            <td>:</td>
            <td>{{ $item->checkin }}</td>
        </tr>
    @endforeach
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
