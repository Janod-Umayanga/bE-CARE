  // get the select element
  var select = document.getElementById("period");

  // get the selected value from localStorage
  var selectedValue = localStorage.getItem("selectedValue");

  // loop through the options and set the selected attribute on the matching option
  for (var i = 0; i < select.options.length; i++) {
    var option = select.options[i];
    if (option.value == selectedValue) {
      option.selected = true;
    }
  }

  // listen for changes to the select element and update localStorage
  select.addEventListener("change", function() {
    localStorage.setItem("selectedValue", select.value);
  });
