var modal = document.getElementById("reservationModal");

// Get the button that opens the modal
var btns = document.getElementsByClassName("bookCar");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var modalText = document.getElementById('modal-text');

function openPayment(params) {
    window.location.href = "payment.php?carid="+params;
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
