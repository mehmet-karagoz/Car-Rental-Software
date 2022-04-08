var checkBoxShowLocation = document.querySelector("#flexCheckChecked");
var dropdownLocation = document.querySelector("#formCard > div > form > div:nth-child(6)");

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