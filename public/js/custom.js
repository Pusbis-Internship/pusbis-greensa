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
    var lamaHariElements = document.getElementsByName("lamaHari");
    var lamaHari = document.getElementsByName("lama")[0].value;
    
    for (var i = 0; i < lamaHariElements.length; i++) {
        lamaHariElements[i].value = lamaHari;
    }
});

window.addEventListener('DOMContentLoaded', function () {
    var select = document.getElementById('select1');
    var capacityInput = document.getElementById('capacityPax');

    select.addEventListener('change', function () {
        var selectedOption = select.options[select.selectedIndex];
        var kapasitas = selectedOption.getAttribute('data-value');
        capacityInput.value = kapasitas;
    });
});


