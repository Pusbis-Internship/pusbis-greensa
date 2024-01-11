const navbar = document.getElementsByTagName("nav")[0];
window.addEventListener("scroll", function () {
    console.log(window.scrollY);
    if (window.scrollY > 1) {
        navbar.classList.replace("bg-transparent", "nav-color");
    } else if (this.window.scrollY <= 1) {
        navbar.classList.replace("nav-color", "bg-transparent");
    }
});


// Tanggal Check-in Check-out
$(document).ready(function() {
    $('#check-in').on('change', function() {
        var checkInDate = $(this).val();
        var nextDay = new Date(checkInDate);
        nextDay.setDate(nextDay.getDate() + 1);
        var nextDayFormatted = nextDay.toISOString().split('T')[0];
        $('#check-out').prop('min', nextDayFormatted);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var checkIn = document.getElementById('check-in');
    var today = new Date();
    checkIn.setAttribute('min', today.toISOString().split('T')[0]);
});