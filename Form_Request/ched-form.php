<?php
// logout
session_start();
if (is_null($_SESSION['id']))
{
  header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'linkheader.php'; ?>
    <link rel="stylesheet" href = "css/chedform.css">
    <title>Form Request</title>
</head>
<body>
<?php include 'header.php'?>


<main>
    <div class="container">
        <div class="title">
            <p>CHED FORM REQUEST</p>
        </div>

        <form method="post" action="ched-generate.php" class="formrequest">
        <p class="fill">FILL THE INFORMATION</p>
        <div class="main-flex">
            <div class="flex1">
                <label>NAME OF STUDENT</label>
                <input type="text" name="name" required>
                <label>COURSE</label>
                <input type="text" name="course" required>
                <label>NO. OF UNITS</label>
                <input type="text" name="nou" required>
                <label>Date of Graduation</label>
                <input type="date" name="dog" required>
                <label>GENDER<label>
                <div class="gender">
                    <div class="Male">
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male">Male</label>
                    </div>
                    <div class="Female">
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female">Female</label>
                    </div>
                </div>
                    <label>NO. OF UNITS</label>
                    <div class="UNITS">
                        <input type="checkbox" id="tor" name="record[]" value="Transcript of Records">
                        <label for="tor" id="unit">Transcript of Records</label><br>
                        <input type="checkbox" id="coe" name="record[]" value="Diploma">
                        <label for="coe" id="unit"> Diploma</label><br>
                        <input type="checkbox" id="f137" name="record[]" value="Certificate of Graduation">
                        <label for="f137" id="unit"> Certificate of Graduation </label><br>
                    </div>
                    <div class="buttonForm">
                    <button>RESET</button><input type="submit" value="PRINT" class="submitBtn" />
                    </div>
            </div>

            </div>
        </div>
       
        </form>
    </div>
</main>


<footer>

</footer>


</body>
</html>