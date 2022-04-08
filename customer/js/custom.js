var modal = document.getElementById("reservationModal");

// Get the button that opens the modal
var btns = document.getElementsByClassName("bookCar");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

var modalText = document.getElementById('modal-text');

// When the user clicks the button, open the modal 
for (var i = 0; i < btns.length; i++) {
    btns[i].onclick = function (event) {
        var params = parseURLParams(window.location.href);

        if (params != null && params['pick-up'][0] != '' && params['return'][0] != '') {
            document.getElementById('address-card').style.display = "none";
            document.getElementById('payment-card').style.display = "flex";

        } else {
            document.getElementById('payment-card').style.display = "none";
            document.getElementById('address-card').style.display = "flex";
        }
        modal.style.display = "block";
    }
}

function openPayment(params) {
    var pick_up_date = document.querySelector("#pick-up").value;
    var return_date = document.querySelector("#return").value;
    if (pick_up_date != "" && return_date != "") {
        document.getElementById('address-card').style.display = "none";
        document.getElementById('payment-card').style.display = "flex";
    }
    modal.style.display = "block";
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

function parseURLParams(url) {
    var queryStart = url.indexOf("?") + 1,
        queryEnd = url.indexOf("#") + 1 || url.length + 1,
        query = url.slice(queryStart, queryEnd - 1),
        pairs = query.replace(/\+/g, " ").split("&"),
        parms = {}, i, n, v, nv;

    if (query === url || query === "") return;

    for (i = 0; i < pairs.length; i++) {
        nv = pairs[i].split("=", 2);
        n = decodeURIComponent(nv[0]);
        v = decodeURIComponent(nv[1]);

        if (!parms.hasOwnProperty(n)) parms[n] = [];
        parms[n].push(nv.length === 2 ? v : null);
    }
    return parms;
}
var checkBoxShowLocation = document.querySelector("#flexCheckChecked");
var dropdownLocation = document.querySelector("#address-card > form > div > div:nth-child(3) > div > div");

console.log(dropdownLocation.style.display === '');
checkBoxShowLocation.addEventListener('click', function() {
      if (dropdownLocation.style.display !== '') {
        
        dropdownLocation.style.display = '';
    }else {
      window.setTimeout(function(){
        dropdownLocation.style.display = 'none';
      },.2); // timed to match animation-duration
    }
});