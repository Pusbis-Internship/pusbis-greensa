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

// // MODAL set Capacity PAX
// window.addEventListener('DOMContentLoaded', function () {
//     var selectElements = document.querySelectorAll('.select-dropdown');
    
//     selectElements.forEach(function (selectElement) {
//         var capacityInput = document.querySelector(selectElement.getAttribute('data-target'));
        
//         selectElement.addEventListener('change', function () {
//             var selectedOption = selectElement.options[selectElement.selectedIndex];
//             var kapasitas = selectedOption.getAttribute('data-value');
//             capacityInput.value = kapasitas;
//         });
//     });
// });

// MODAL set Capacity PAX
window.addEventListener('DOMContentLoaded', function () {
    var selectElements = document.querySelectorAll('.select-dropdown');
    
    selectElements.forEach(function (selectElement) {
        var ketKapasitas = document.querySelector(selectElement.getAttribute('data-target'));
        var ketCukup = document.querySelector(selectElement.getAttribute('data-target2'));
        var btnCart = document.querySelector(selectElement.getAttribute('data-target3'));
        var btnReservasi = document.querySelector(selectElement.getAttribute('data-target4'));
        var pesertaInput = document.getElementById('peserta-cek');
        var pesertaValue = pesertaInput.value;

        selectElement.addEventListener('change', function () {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var kapasitas_ruang = selectedOption.getAttribute('data-value');
            ketKapasitas.value = kapasitas_ruang;

            // jika kapasitas bisa menampung jumlah peserta
            if (kapasitas_ruang >= parseInt(pesertaValue)) {
                ketKapasitas.classList.add('border', 'border-success');
                ketKapasitas.classList.remove('border', 'border-danger');
                ketCukup.style.color = 'green';
                ketCukup.textContent = 'Kapasitas mencukupi untuk jumlah peserta (' + pesertaValue + ')';
                ketCukup.hidden = false;
                btnCart.disabled = false;
                btnReservasi.disabled = false;
            } else {
                ketKapasitas.classList.add('border', 'border-danger');
                ketKapasitas.classList.remove('border', 'border-success');
                ketCukup.style.color = 'red';
                ketCukup.textContent = 'Kapasitas tidak mencukupi untuk jumlah peserta (' + pesertaValue + ')';
                ketCukup.hidden = false;
                btnCart.disabled = true;
                btnReservasi.disabled = true;
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


