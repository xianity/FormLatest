<!DOCTYPE html>
<html>
<head>
  <title>Dynamic Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .input-group {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .input-group label {
      margin-right: 10px;
    }

    .input-group input {
      width: 200px;
    }
  </style>
  <script>
    $(document).ready(function() {
      var counter = 2;
      var inputValues1 = [];
      var inputValues2 = [];
      var inputSubjects = [];

      $("#addButton").click(function() {
        var newInputGroup = $("<div>").addClass("input-group");

        for (var i = 0; i < 3; i++) {
          var newTextBox = $("<div>");
          var inputId = "textbox" + counter;

          if (i === 2) {
            newTextBox.html(
              '<label for="' + inputId + '">Subject:</label>' +
              '<input type="text" name="' + inputId + '" id="' + inputId + '">');
          } else {
            newTextBox.html(
              '<label for="' + inputId + '">Textbox #' + counter + ':</label>' +
              '<input type="text" name="' + inputId + '" id="' + inputId + '">');
          }

          newInputGroup.append(newTextBox);
          counter++;
        }

        newInputGroup.appendTo("#TextBoxesGroup");
      });

      $("#removeButton").click(function() {
        if (counter <= 4) {
          alert("Cannot remove all textboxes!");
          return false;
        }

        counter -= 3;
        $(".input-group:last-of-type").remove();
      });

      $("#storeButton").click(function() {
        inputValues1 = [];
        inputValues2 = [];
        inputSubjects = [];
        var inputs = $(".input-group input");

        for (var i = 0; i < inputs.length; i += 3) {
          inputValues1.push(parseFloat(inputs[i].value));
          inputValues2.push(parseFloat(inputs[i + 1].value));
          inputSubjects.push(inputs[i + 2].value);
        }

        console.log("Input values 1:", inputValues1);
        console.log("Input values 2:", inputValues2);
        console.log("Subjects:", inputSubjects);

        // Perform additional calculations or operations here

        // Clear the input values and subjects arrays
        inputValues1 = [];
        inputValues2 = [];
        inputSubjects = [];

        // Clear the input values and subjects fields
        $(".input-group input").val("");
      });

      $("#clearButton").click(function() {
        $(".input-group input").val("");
      });
    });
  </script>
</head>
<body>
  <div id="TextBoxesGroup">
    <div class="input-group">
      <div>
        <label for="textbox1">Textbox #1:</label>
        <input type="text" name="textbox1" id="textbox1">
      </div>
      <div>
        <label for="textbox2">Textbox #2:</label>
        <input type="text" name="textbox2" id="textbox2">
      </div>
      <div>
        <label for="subject1">Subject:</label>
        <input type="text" name="subject1" id="subject1">
      </div>
    </div>
  </div>
  <input type="button" value="Add Button" id="addButton">
  <input type="button" value="Remove Button" id="removeButton">
  <input type="button" value="Store Values" id="storeButton">
  <input type="button" value="Clear" id="clearButton">
</body>
</html>