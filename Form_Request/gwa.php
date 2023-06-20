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
    <?php include 'header.php';?>
    <br><br><br>
    <main>
        <div class="container">
        <div class="titleheader">
                <p>GWA CALCULATOR</p>
        </div>
        <div>
            <div class="headinput">
            <div>
            <h2>STUDENT NAME</h2>
            <input type="text" name="name" id="name" placeholder="Enter Student Name" requied>
            </div>
            <div>
            <h2>PROGRAM</h2>
            <input type="text" name="program" id="program" placeholder="Enter Student Program" requied>
            </div>
            <div>
            <h2>COURSE</h2>
            <input type="text" name="course" id="course" placeholder="Enter Student Course" requied>
            </div>
            </div>
        </div>
            <div class="inputDesign">
                <div class="Input3">
                    <h2>SUBJECT</h2>
                    <label for="textbox3"></label>
                    <input type="text" name="textbox3" class="subject-input">
                </div>
                <div class="Input1">
                    <h2>GRADE</h2>
                    <label for="textbox1"></label>
                    <input type="text" name="textbox1" class="grade-input">
                </div>
                <div class="Input2">
                    <h2>UNIT</h2>
                    <label for="textbox2"></label>
                    <input type="text" name="textbox2" class="unit-input">
                </div>
            </div>
            <div class="button">
                <input type="button" value="ADD" id="addButton">
                <input type="button" value="REMOVE" id="removeButton">
                <input type="button" value="COMPUTE" id="storeButton">
                <input type="button" value="CLEAR" id="clearButton">
            </div>
            <div class="gwa">
                <p>RESULT</p>
                <div class="results"></div>
            </div>
        </div>
    </main>
    <br><br>
    <footer>
    </footer>

    <script>
    $(document).ready(function () {
        var counter = 4;

        $("#addButton").click(function () {
            var newInput3 = $('<input type="text" name="textbox' + counter + '" class="subject-input">');
            var newInput1 = $('<input type="text" name="textbox' + (counter + 1) + '" class="grade-input">');
            var newInput2 = $('<input type="text" name="textbox' + (counter + 1) + '" class="unit-input">');
            $(".Input3").append(newInput3);
            $(".Input1").append(newInput1);
            $(".Input2").append(newInput2);

            counter += 4;
        });

        $("#removeButton").click(function () {
    if (counter > 4) {
        counter -= 4;
        $(".Input3 input[type='text']").last().remove();
        $(".Input1 input[type='text']").last().remove();
        $(".Input2 input[type='text']").last().remove();
    } else {
        alert("You can't delete the initial input.");
    }
});

        $("#storeButton").click(function () {
            var subjects = [];
            var grades = [];
            var units = [];

            // Retrieve all subject inputs
            $(".subject-input").each(function () {
                var subject = $(this).val();
                subjects.push(subject);
            });

            // Retrieve all grade inputs
            $(".grade-input").each(function () {
                var grade = $(this).val();
                grades.push(parseFloat(grade));
            });

            // Retrieve all unit inputs
            $(".unit-input").each(function () {
                var unit = $(this).val();
                units.push(parseFloat(unit));
            });
            console.log(subjects);
            // Calculate GWA
            var gwa = calculateGWA(grades, units);

            // Display GWA in the results div
            $(".results").text(gwa.toFixed(2));
        });

        $("#clearButton").click(function () {
            // Clear all input data
            $(".subject-input").val("");
            $(".grade-input").val("");
            $(".unit-input").val("");
            $(".results").empty();
        });

        $(".grade-input, .unit-input").on("input", function () {
            this.value = this.value.replace(/[^0-9.]/g, "");
        });

        function calculateGWA(grades, units) {
            var totalUnits = 0;
            var weightedSum = 0;

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