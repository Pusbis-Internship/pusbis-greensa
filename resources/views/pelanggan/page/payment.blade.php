@extends('pelanggan.layout.loginRegis')

@section('content')
    <div class="container my-5">
        <div class="row header-table">
            <div class="col-12 p-0">
                <form action="/order">
                    <button class="btn btn-success mb-3">Kembali ke halaman order</button>
                </form>
            </div>

            {{-- BSI --}}
            @if ($order->metode_pembayaran === 'BSI')
                <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                    <p class="m-0 mt-5">Segera transfer sejumlah <span class="fw-bold text-success">Rp.
                            {{ number_format($totalHarga, 0, ',', '.') }}</span> ke rekening berikut :</p>
                    <img src="{{ asset('assets/images/BSI.png') }}" alt="" class="mt-3" style="width: 30%">
                    <h5 class="m-0 mt-4">030-098-0976</h5>
                    <p class="text-secondary">a/n Greensa</p>
                    <h1 class="mb-3 countdown display-2 fw-bold text-success">00:00:00</h1>

                    <div class="col-5 mb-3">
                        <label class="labels">Upload bukti transfer<span class="text-danger">*</span></label>
                        <input type="file" name="surat" accept=".pdf" class="form-control"
                            placeholder="Upload file SPJ" required>
                        <div class="col-12">
                            <button class="btn btn-success my-4 w-100">Kirim</button>
                        </div>
                    </div>
                </div>
            @else
                {{-- BTN --}}
                <div class="col-12 card d-flex align-items-center justify-content-center text-center">
                    <p class="m-0 mt-5">Segera transfer sejumlah <span class="fw-bold text-success">Rp.
                            {{ number_format($totalHarga, 0, ',', '.') }}</span> ke rekening berikut :</p>
                    <img src="{{ asset('assets/images/BTN.png') }}" alt="" class="mt-5" style="width: 30%">
                    <h5 class="m-0 mt-4">030-098-0976</h5>
                    <p class="text-secondary">a/n Greensa</p>
                    <h1 class="mb-3 countdown display-2 fw-bold text-success">00:00:00</h1>

                    <div class="col-5 mb-3">
                        <label class="labels">Upload bukti transfer<span class="text-danger">*</span></label>
                        <input type="file" name="surat" accept=".pdf" class="form-control"
                            placeholder="Upload file SPJ" required>
                        <div class="col-12">
                            <button class="btn btn-success my-4 w-100">Kirim</button>
                        </div>
                    </div>
                </div>
            @endif

            <label id="countdown">00:00</label>

        </div>
    </div>

    <script>
        // Set the target time to 11:00 AM
        var targetTime = new Date();
        targetTime.setHours(11, 15, 0, 0);
      
        // Get the current time
        var currentTime = new Date();
      
        // Calculate the difference in milliseconds between the current time and the target time
        var difference = targetTime.getTime() - currentTime.getTime();
      
        // Calculate the remaining time in minutes
        var remainingMinutes = Math.floor((difference / (1000 * 60)) % 60);
      
        // Calculate the remaining time in seconds
        var remainingSeconds = Math.floor((difference / 1000) % 60);
      
        // Update the countdown label
        var countdownLabel = document.getElementById("countdown");
        countdownLabel.textContent = remainingMinutes.toString().padStart(2, '0') + ":" + remainingSeconds.toString().padStart(2, '0');
      
        // Function to update the countdown label every second
        function updateCountdown() {
          // Decrement remaining seconds
          remainingSeconds--;
      
          // If remaining seconds become negative, decrement remaining minutes and reset remaining seconds to 59
          if (remainingSeconds < 0) {
            remainingMinutes--;
            remainingSeconds = 59;
          }
      
          // Update the countdown label
          countdownLabel.textContent = remainingMinutes.toString().padStart(2, '0') + ":" + remainingSeconds.toString().padStart(2, '0');
      
          // If remaining time becomes 0, stop the countdown
          if (remainingMinutes === 0 && remainingSeconds === 0) {
            clearInterval(interval);
          }
        }
      
        // Update the countdown label every second
        var interval = setInterval(updateCountdown, 1000);
    </script>

    {{-- Di bagian bawah file blade --}}
    {{-- <script>
        // Fungsi untuk menginisialisasi dan memulai countdown
        function startCountdown(duration, displayElement) {
            var timer = duration,
                hours, minutes, seconds;

            // Mengatur interval countdown
            var countdownInterval = setInterval(function() {
                hours = parseInt(timer / 3600, 10);
                minutes = parseInt((timer % 3600) / 60, 10);
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                // Menampilkan waktu countdown pada elemen yang sesuai
                displayElement.textContent = hours + ":" + minutes + ":" + seconds;

                // Mengurangi satu detik dari waktu countdown
                if (--timer < 0) {
                    clearInterval(countdownInterval); // Menghentikan countdown jika waktu habis
                    // Tambahkan logika atau tindakan yang ingin dilakukan saat waktu habis
                    alert('Waktu pembayaran telah habis!');
                }
            }, 1000); // Setiap 1 detik
        }

        // Memanggil fungsi startCountdown saat dokumen telah siap
        document.addEventListener('DOMContentLoaded', function() {
            var countdownElement = document.querySelector('.countdown'); // Ganti dengan kelas yang sesuai
            var countdownTime = 180 * 60; // 1 jam dalam detik

            startCountdown(countdownTime, countdownElement);
        });
    </script> --}}
@endsection
