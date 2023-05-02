// period dropdown
var periodSelect = document.getElementById("period");
var selectedPeriod = localStorage.getItem("selectedPeriod");

for (var i = 0; i < periodSelect.options.length; i++) {
  var option = periodSelect.options[i];
  if (option.value == selectedPeriod) {
    option.selected = true;
  }
}

periodSelect.addEventListener("change", function() {
  localStorage.setItem("selectedPeriod", periodSelect.value);
});


// service dropdown
var serviceSelect = document.getElementById("service");
var selectedService = localStorage.getItem("selectedService");

if (!selectedService) {
  selectedService = "doctorChannel"; // set default value
}

for (var i = 0; i < serviceSelect.options.length; i++) {
  var option = serviceSelect.options[i];
  if (option.value == selectedService) {
    option.selected = true;
  }
}

serviceSelect.addEventListener("change", function() {
  localStorage.setItem("selectedService", serviceSelect.value);
});
