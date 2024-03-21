// NAVBAR
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementsByTagName("nav")[0];
    const navbarToggler = document.querySelector('.navbar-toggler');

    // Scroll event listener
    window.addEventListener("scroll", function () {
        if (window.scrollY > 1) {
            navbar.classList.replace("bg-transparent", "nav-color");
        } else {
            navbar.classList.replace("nav-color", "bg-transparent");
        }
    });

    // Toggle button click event
    navbarToggler.addEventListener('click', function () {
        if (navbar.classList.contains('bg-transparent')) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('nav-color');
        } else {
            navbar.classList.remove('nav-color');
            navbar.classList.add('bg-transparent');
        }
    });
});



// AKHIR NAVBAR

// MODAL set Lama Hari
window.addEventListener('DOMContentLoaded', function () {
    var lamaHariElements = document.getElementsByName("lamaHari");
    var lamaHari = document.getElementsByName("lama")[0].value;
    
    for (var i = 0; i < lamaHariElements.length; i++) {
        lamaHariElements[i].value = lamaHari;
    }
});

// MODAL set Capacity PAX
window.addEventListener('DOMContentLoaded', function () {
    var selectElements = document.querySelectorAll('.select-dropdown');
    
    selectElements.forEach(function (selectElement) {
        var capacityInput = document.querySelector(selectElement.getAttribute('data-target'));
        var pesertaInput = document.getElementById('peserta-cek');
        var pesertaValue = pesertaInput.value;
        var keteranganKapasitas = document.getElementById('label-keterangan-kapasitas');
        var btnCart = document.getElementById('addCart');
        var btnPesan = document.getElementById('reservasi');

        selectElement.addEventListener('change', function () {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var kapasitas_ruang = selectedOption.getAttribute('data-value');
            capacityInput.value = kapasitas_ruang;

            if (kapasitas_ruang >= pesertaValue) {
                capacityInput.classList.add('border', 'border-success');
                capacityInput.classList.remove('border', 'border-danger');
                keteranganKapasitas.style.color = 'green';
                keteranganKapasitas.textContent = 'Kapasitas mencukupi untuk jumlah peserta (' + pesertaValue + ')';
                keteranganKapasitas.hidden = false;
                btnCart.disabled = false;
                btnPesan.disabled = false;
            } else {
                capacityInput.classList.add('border', 'border-danger');
                capacityInput.classList.remove('border', 'border-success');
                keteranganKapasitas.style.color = 'red';
                keteranganKapasitas.textContent = 'Kapasitas tidak mencukupi untuk jumlah peserta (' + pesertaValue + ')';
                keteranganKapasitas.hidden = false;
                btnCart.disabled = true;
                btnPesan.disabled = true;
            }
        });
    });
});

// CAPACITY IN DETAIL
document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen-elemen yang diperlukan
    var selectLayout = document.getElementById('select1');
    var capacityInput = document.getElementById('capacityPax');

    // Tambahkan event listener untuk perubahan pada dropdown layout
    selectLayout.addEventListener('change', function () {
        // Ambil nilai kapasitas dari atribut data-value
        var selectedOption = selectLayout.options[selectLayout.selectedIndex];
        var kapasitas = selectedOption.getAttribute('data-value');

        // Setel nilai input kapasitas sesuai dengan layout yang dipilih
        capacityInput.value = kapasitas;
    });
});


