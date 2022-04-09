function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("myTable").deleteRow(i);
}


function showAlert(params) {
  var successAlert = document.getElementById('success');
  successAlert.style.display = '';
}

function showAlertDanger(params) {

  if (confirm('Do you want to remove the car?')) {
    location.href = "car.html";
  }
}