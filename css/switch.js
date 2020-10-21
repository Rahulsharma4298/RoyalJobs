
function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  document.getElementById("menu-card").style.display = "none";
  
}

function showCurrent(n){
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "none";
  document.getElementById("menu-card").style.display = "block";
  
}