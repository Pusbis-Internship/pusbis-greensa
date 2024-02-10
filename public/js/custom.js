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
        
        selectElement.addEventListener('change', function () {
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var kapasitas = selectedOption.getAttribute('data-value');
            capacityInput.value = kapasitas;
        });
    });
});


