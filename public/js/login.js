
// User Type dropdown
var userTypeSelect = document.getElementById("usertype");
var selectedUsertype = localStorage.getItem("selectedUsertype");

if (!selectedUsertype) {
  selectedUsertype = "patient"; // set default value
}

for (var i = 0; i < userTypeSelect.options.length; i++) {
  var option = userTypeSelect.options[i];
  if (option.value == selectedUsertype) {
    option.selected = true;
  }
}

userTypeSelect.addEventListener("change", function() {
  localStorage.setItem("selectedUsertype", userTypeSelect.value);
});
