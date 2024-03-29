{{-- <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}


<!-- Invoice 1 - Bootstrap Brain Component -->
<section id="invoice-container" class="py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
                <div class="row gy-3 mb-2">
                    <div class="col-12 d-flex align-items-center justify-content-end text-right ">

                        <h4 class="text-uppercase text-endx align-self-center mr-3">
                            GREENSA INN & <br>
                            TRAINING CENTER
                        </h4>
                        <img src="{{ asset('assets/images/logo-invoice.svg') }}" class="img-fluid text-success me-2"
                            alt="Greensa Logo" width="85">
                    </div>
                    {{-- <div class="col-6">
                        <a class="d-block text-end" href="#!">
                            <img src="{{ asset('assets/images/logo-invoice.png') }}" class="img-fluid text-success" alt="Greensa Logo"
                                width="70" >
                        </a>
                    </div> --}}
                    <div class="col-12">
                        <h4>From</h4>
                        <address>
                            <strong>{{ $order->guest->name }}</strong><br>
                            {{ $order->guest->alamat }}, {{ $order->guest->kota }}<br>
                            {{ $order->guest->provinsi }}<br>
                            Phone: {{ $order->guest->telp }}<br>
                            Email: {{ $order->guest->username }}
                        </address>
                    </div>
                </div>
                <div class="row mb-3 d-flex align-items-center">
                    <div class="col-12 col-sm-6 col-md-7">
                        <h4>Bill To</h4>
                        <address>
                            <strong>Greensa Inn & Training Center</strong><br>
                            Jl. Raya Juanda no. 86 Sedati Agung<br>
                            Sedati, Kab. Sidoarjo<br>
                            Jawa Timur 61253<br>
                            Phone: (031) 8668631<br>
                            Email: greensainn@gmail.com
                        </address>
                    </div>
                    <div class="col-12 col-sm-6 col-md-5">
                        <h4 class="row">
                            <span class="col-6">Invoice </span>
                            {{-- <span class="col-6 text-sm-end">INT-001</span> --}}
                        </h4>
                        <div class="row">
                            <span class="col-6">Kegiatan</span>
                            <span class="col-6 text-sm-end"><strong>: {{ $namaKegiatan }}</strong></span>
                            <span class="col-6">Order ID</span>
                            <span class="col-6 text-sm-end">: {{ $order->id }}</span>
                            <span class="col-6">Tanggal Invoice</span>
                            <span class="col-6 text-sm-end">: 12/10/2025</span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-uppercase">No</th>
                                        <th scope="col" class="text-uppercase">Ruangan</th>
                                        <th scope="col" class="text-uppercase">Layout</th>
                                        <th scope="col" class="text-uppercase">Check-in</th>
                                        <th scope="col" class="text-uppercase">Check-out</th>
                                        <th scope="col" class="text-uppercase text-end">Status</th>
                                        <th scope="col" class="text-uppercase text-end">Harga</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($order->items as $index => $item)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                            <td style="white-space: nowrap;">{{ $item->train->nama }}</td>
                                            <td style="white-space: nowrap;">{{ $item->layout }}</td>
                                            <td>{{ $item->checkin }}</td>
                                            <td>{{ $item->checkout }}</td>
                                            <td class="text-end">{{ $item->status }}</td>
                                            @if ($item->status == 'Rejected')
                                                <td class="text-end">0</td>
                                            @else
                                                <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.')}}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    {{-- <tr>
                                        <td colspan="3" class="text-end">Subtotal</td>
                                        <td class="text-end">362</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end">VAT (5%)</td>
                                        <td class="text-end">18.1</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-end">Shipping</td>
                                        <td class="text-end">15</td>
                                    </tr> --}}
                                    <tr>
                                        <th scope="row" colspan="6" class="text-uppercase text-end">Total</th>
                                        <td class="text-end">Rp {{ number_format($totalHarga, 0, ',', '.')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-end ">
                        <button type="submit" class="btn btn-primary mb-3 mr-2" onclick="window.print()">Print
                            Invoice</button>
                        {{-- <button type="button" class="btn btn-success mb-3" onclick="downloadInvoice()">Download
                            Invoice</button> --}}


                        {{-- <button type="submit" class="btn btn-danger mb-3">Submit Payment</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DOMPDF --}}
{{-- <script>
    function downloadInvoice() {
        // Menggunakan AJAX untuk mengirim data HTML ke server dan mendapatkan file PDF
        $.ajax({
            url: '/invoice-download-ajax/{{ $order->id }}', // Sesuaikan dengan URL endpoint di mana Anda menangani generasi PDF
            method: 'GET',
            success: function(response) {
                // Membuat objek Blob dari data PDF
                var blob = new Blob([response], { type: 'application/pdf' });

                // Membuat objek URL dari blob
                var url = window.URL.createObjectURL(blob);

                // Membuat elemen <a> untuk menautkan ke URL blob dan mengunduhnya
                var link = document.createElement('a');
                link.href = url;
                link.download = 'invoice.pdf';

                // Menambahkan elemen <a> ke dokumen dan mengkliknya
                document.body.appendChild(link);
                link.click();

                // Menghapus elemen <a> setelah selesai
                document.body.removeChild(link);
            }
        });
    }
</script> --}}

{{--HTML2PDF --}}
{{-- <script>
    function downloadInvoice() {
        const element = document.getElementById('invoice-container');

        html2pdf(element, {
            margin: 10,
            filename: 'invoice.pdf',
            image: { type: 'jpeg', quality: 1 },
            html2canvas: { 
                scale: 1, 
                logging: true, 
                useCORS: true,
                // width: element.scrollWidth, // Menggunakan scrollWidth agar dapat menangani tabel yang melebihi lebar layar
            },
            jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'portrait',
                onBeforeDraw: (pdf) => {
                    pdf.internal.scaleFactor = 2;
                },
            }
        });
    }
</script> --}}
