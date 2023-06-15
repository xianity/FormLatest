<?php
// logout
session_start();
if (is_null($_SESSION['id']))
{
  header('location:login.php');
}
include "condb.php";
$accountID = $_GET['id'];

$sql = "SELECT * FROM gwa_history WHERE id = '$accountID'";

$result = $conn->query($sql);
if ($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $name = $row['name'];
  $professor = $row['professor'];
  $date = $row['semester'];
  $gwa = $row['gwa'];
  $gender = $row['gender'];
}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'linkheader.php'; ?>
    <link rel="stylesheet" href = "css/gwa_form.css">
    <title>Form Request</title>
</head>
<body>
<?php include 'header.php'?>


<main>
    <div class="container">
        <div class="title">
            <p>GWA CERTIFICATION</p>
        </div>

        <form method="post" action="gwa-generate.php" class="formrequest">
        <p class="fill">FILL THE INFORMATION</p>
        <div class="main-flex">
            <div class="flex1">
                <label>NAME OF STUDENT</label>
                <input type="text" name="name" value="<?php echo $name;?>" required>
                <label>NAME OF PROFESSOR</label>
                <input type="text" name="nof" value="<?php echo $professor;?>" required>
                <label>CURRENT SEMESTER</label>
                <select name="semester" required>
                    <option value="first-semester" disabled selected>Select Semester</option>
                    <?php 
                    if($semester=="First Semester")
                        {
                    echo" <option value='First Semester' selected>First-Semester</option>
                    <option value='Second Semester'>Second-Semester</option>";
                        }

                    else
                        {
                            echo" <option value='First Semester' >First-Semester</option>
                            <option value='Second Semester'selected>Second-Semester</option>";
                        }            
                        ?>
                    <!-- <option value="First Semester">First-Semester</option>
                    <option value="Second Semester">Second-Semester</option> -->
                </select>
                <label>GENERAL AVERAGE</label>
                <input type="text" name="gwa" value="<?php echo $gwa;?>">
                <label>GENDER<label>
                <div class="gender">
                     <?php 
                    if($gender == "Male")
                    {
                        echo " <div class='Male'>
                        <input type='radio' id='male' name='gender' value='Male' checked>
                        <label for='male'>Male</label>
                        </div>
                        <div class='Female'>
                        <input type='radio' id='female' name='gender' value='Female'>
                        <label for='female'>Female</label>
                        </div>";
                    }
                    else{
                        echo " <div class='Male'>
                        <input type='radio' id='male' name='gender' value='Male' >
                        <label for='male'>Male</label>
                        </div>
                        <div class='Female'>
                        <input type='radio' id='female' name='gender' value='Female' checked>
                        <label for='female'>Female</label>
                        </div>";

                    }

                    ?>
                    <!-- <div class="Male">
                    <input type="radio" id="male" name="gender" value="Male"/>
                    <label for="male">Male</label>
                    </div>
                    <div class="Female">
                    <input type="radio" id="female" name="gender" value="Female"/>
                    <label for="female">Female</label>
                    </div> -->
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