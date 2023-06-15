<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gwa.css">
    <title>GWA CALCULATOR</title>
    <?php include 'linkheader.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery CDN -->
</head>
<body>
    <?php include'header.php';?>
    <main>

        <div class="container">
            <div class="titleheader">
                <p>GWA CALCULATOR</p>
            </div>
            <div class="inputDesign">
                <div class="Input1">
                    <h2>GRADE</h2>
                    <label for="textbox1"> </label>
                    <input type="text" name="textbox1" id="textbox1">
                </div>
                <div class="Input2">
                    <h2>UNIT</h2>
                    <label for="textbox2"> </label>
                    <input type="text" name="textbox2" id="textbox2">
                </div>
            </div>
            <div class="button">
                <input type="button" value="ADD" id="addButton">
                <input type="button" value="REMOVE" id="removeButton">
                <input type="button" value="COMPUTE" id="storeButton">
                <input type="button" value="CLEAR" id="clearButton">
            </div>
            <div class="gwa"><p>RESULT</p>
            <div class="results"></div></div>
        </div>
    </main>

    
<footer>

</footer>
    <script>
    $(document).ready(function () {
        var counter = 2;

        $("#addButton").click(function () {
            var newInput1 = $('<input type="text" name="textbox' + counter + '" id="textbox' + counter + '">');
            var newInput2 = $('<input type="text" name="textbox' + (counter + 1) + '" id="textbox' + (counter + 1) + '">');

            $(".Input1").append(newInput1);
            $(".Input2").append(newInput2);

            counter += 2;
        });

        $("#removeButton").click(function () {
            if (counter > 2) {
                counter -= 2;
                $("#textbox" + counter).remove();
                $("#textbox" + (counter + 1)).remove();
            } else {
                alert("You can't delete the initial input.");
            }
        });

        $("#storeButton").click(function () {
            var grades = [];
            var units = [];

            // Retrieve all grade inputs
            $(".Input1 input[type='text']").each(function () {
                var grade = $(this).val();
                grades.push(parseFloat(grade));
            });

            // Retrieve all unit inputs
            $(".Input2 input[type='text']").each(function () {
                var unit = $(this).val();
                units.push(parseFloat(unit));
            });

            // Calculate GWA
            var gwa = calculateGWA(grades, units);

            // Display GWA in the results div
            $(".results").text( gwa.toFixed(2));
        });

        $("#clearButton").click(function () {
            // Clear all input data
            $(".Input1 input[type='text']").val("");
            $(".Input2 input[type='text']").val("");
            $(".results").empty();
        });
        
        $(".Input1 input[type='text'], .Input2 input[type='text']").on("input", function () {
            this.value = this.value.replace(/[^0-9.]/g, "");
        });

        function calculateGWA(grades, units) {
            var totalUnits = 0;
            var weightedSum =

 0;

            for (var i = 0; i < grades.length; i++) {
                var grade = grades[i];
                var unit = units[i];

                if (!isNaN(grade) && !isNaN(unit)) {
                    totalUnits += unit;
                    weightedSum += grade * unit;
                }
            }

            if (totalUnits === 0) {
                return 0;
            }

            var gwa = weightedSum / totalUnits;
            return gwa;
        }
    });
    </script>
</body>
</html>