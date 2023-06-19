<?php 

include "../condb.php";

$result = mysqli_query($conn, "SELECT * FROM requestform");

$get = mysqli_fetch_assoc($result);
$body1 = $get['body1'];
$body2 = $get['body2'];
$forname = $get['forname'];



if(isset($_POST['submit'])){
    $body1 = $_POST["body1"];
    $body2 = $_POST["body2"];
    $body3 = $_POST["body3"];
    $result = mysqli_query($conn, "UPDATE requestform SET body1 = '$body1', body2 = '$body2', forname = '$body3'");
    
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
    include "linkheader.php";
    ?>
    <link rel="stylesheet" href="css/formreqedit.css">
    <title>REQUEST FORM</title>
</head>
<script>

function resizeInput() {
  const input = document.getElementById('myInput');
  input.style.width = (input.value.length + 1) + 'ch';
}

</script>
<body>
<?php 
    include "navadmin.php";
    ?>

<main>
    <h1>REQUEST FORM </h1>
    <div class="pdf-container">
        <p>UMak-UR-QF-19</p>
        <div class="headerumak">
            <img  id="umaklogo" src="../img/UMakLogo.png">
            <div class="contentheader">
                <h3>UNIVERSITY OF MAKATI</h3>
                <p>J.P. Rizal Extension, West Rembo, Makati City</p>
            </div>
      
        </div>
        <p id="date"><b>June 18, 2023</b></p>

        <div class="schoolInfo">
        <p>The Principal / Registrar</p>
        <p><b>PEMBO ELEMENTARY SCHOOL</b></p>
        <p>J.P RIZAL EXTENSION</p>
        </div>

        <p>Dear Sir / Madam :</p>
        <form method="post" action="">
        <div class="contentedit">

        <p> <input type="text" id="myInput" name="body1" value="<?php echo $body1?>"><u><b>Transcript of Records</b></u> 
        <textarea id="textarea" name="body2"rows="3"><?php echo $body2?></textarea>
        </p>
        </div>

        <table class="studentInfo">
            <tr>
                <td class="zero">&nbsp;</td>
                <td colspan="2">Attended that School / College / University</td>
            </tr>

            <tr>
                <td>Student Name</td>
                <td>Year / Section / Course </td>
                <td> Academic Year</td>
            </tr>

            <tr>
                <td class="info">{{ name }}</td>
                <td class="info">{{ ysc }}</td>
                <td class="info">{{ ay }}</td>
            </tr>
        </table>

        <p>Very Truly Yours,</p>
       
        <div class="signature">
            <p><b>for: <input type="text" id="myInput" name="body3" value="<?php echo $forname?>"></b></p>
            <input type="submit" id="save" name="submit" value="SAVE CHANGES"></form>
            <p>University Registrar</p>
        </div>
        <table class="finalConclude">
            <tr>
                <td class="urgency"> <p><strong></strong></p><hr> </td>
                <td class="infoText">Urgent</td>
            </tr>
            <tr>
                <td class="request"><p><strong></strong></p><hr></td>
                <td class="infoText">Request</td>
            </tr>
            <tr>
                <td class="entrust"><p><strong></strong></p><hr></td>
                <td class="infoText">Kindly entrust to the bearer the said <u>{{ selector }}</u> with remarks "<u>COPY FOR UMAK</u>"</td>
            </tr>
            <tr>
                <td class="mail"><p><strong></strong></p><hr></td>
                <td class="infoText">Please mail the said <u>{{ selector }}</u></td>
            </tr>

        </table>

    </div>
</main>



<footer>

</footer>






</body>
</html>