const navbar = document.getElementsByTagName("nav")[0];
window.addEventListener("scroll", function () {
    console.log(window.scrollY);
    if (window.scrollY > 1) {
        navbar.classList.replace("bg-transparent", "nav-color");
    } else if (this.window.scrollY <= 1) {
        navbar.classList.replace("nav-color", "bg-transparent");
    }
});

// GET TOMORROW DATE
var tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);

// Format the date as "YYYY-MM-DD"
var formattedDate = tomorrow.toISOString().split('T')[0];

// Set the value of the input
document.getElementById("check-in").value = formattedDate;
document.getElementById("checkin").value = formattedDate;
document.getElementById("check-in").setAttribute("min", formattedDate);

// LAMA HARI IN MODALBOOK
window.addEventListener('DOMContentLoaded', function () {
    var lamaHari = document.getElementsByName("lama")[0].value;
    document.getElementsByName("lamahari")[0].value = lamaHari;
});


// SET SELECT FORM LAYOUT MODELS FOR CAPACITY
// Mendapatkan elemen select dan input
var select = document.getElementById('select1');
var capacityInput = document.getElementById('capacityPax');
// Menambahkan event listener untuk perubahan pada select
select.addEventListener('change', function () {
    // Mendapatkan nilai kapasitas dari atribut data-value
    var selectedOption = select.options[select.selectedIndex];
    var kapasitas = selectedOption.getAttribute('data-value');

    // Mengubah nilai input kapasitas
    capacityInput.value = kapasitas;
});

// document.addEventListener('DOMContentLoaded', function () {
//     $('#modalBook').on('show.bs.modal', function (event) {
//         var button = $(event.relatedTarget); // Button that triggered the modal
//         var trainId = button.data('train-id'); // Extract the train ID from data attribute
//         var trainHarga = button.data('train-harga'); // Extract the train harga from data attribute
//         var trainNama = button.data('train-nama'); // Extract the train nama from data attribute

//         // Update the modal content with the retrieved values
//         var modal = $(this);
//         modal.find('.modal-body #trainId').val(trainId);
//         modal.find('.modal-body #trainHarga').val(trainHarga);
//         modal.find('.modal-body #trainNama').val(trainNama);
//     });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     $('#modalBook').on('show.bs.modal', function (event) {
//         var button = $(event.relatedTarget); // Button that triggered the modal
//         var trainHarga = button.data('train-harga'); // Extract the train harga from data attribute

//         // Update the text content of the <h3> element with the trainHarga value
//         var hargaElement = document.getElementById('trainHarga');
//         hargaElement.textContent = trainHarga;
//     });
// });


