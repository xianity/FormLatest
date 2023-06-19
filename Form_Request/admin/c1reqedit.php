<?php

use FontLib\Table\Type\head;

include "../condb.php";

if(isset($_POST['submit'])){
    $body1 = $_POST["body1"];
    $body2 = $_POST["body2"];
    $body3 = $_POST["body3"];
    $body4 = $_POST["body4"];
    $result = mysqli_query($conn, "UPDATE c1form SET contentedit1 = '$body1', contentedit2 = '$body2', contentedit3 = '$body3', forname = '$body4'");
    header("Location:c1reqedit.php");
}

$result = mysqli_query($conn, "SELECT * FROM c1form");

$get = mysqli_fetch_assoc($result);
$body1 = $get['contentedit1'];
$body2 = $get['contentedit2'];
$body3 = $get['contentedit3'];
$forname = $get['forname'];





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
    <link rel="stylesheet" href="css/gwareqedit.css">
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
    <h1>C1 CERTIFICATE FORM </h1>
    <div class="pdf-container">
        <div class="headerumak">
            <img  id="umaklogo" src="../img/UMakLogo.png">
            <div class="contentheader">
                    <h1 class="rp">Republic of the Philippines</h1>
                    <h1 class="cm">CITY OF MAKATI</h1>
                    <h1 class="um">UNIVERSITY OF MAKATI</h1>
                    <h1 class="jp">J.P. Rizal Extension, West Rembo, Makati City</h1>
                    <h1 class="tn">Tel. Nos. 882-0535 • 882-0677 • 882-0676 • 883-1660 • 883-1862 • 883-1867 • 883-1868</h1>
            </div>
            <img  id="umaklogo" src="../img/makati.jpg">
        </div>
        <hr>
        <p id="headOffice"><b>OFFICE OF THE UNIVERSITY REGISTRAR</b></p>

        <p id="certicateheader"><b>CERTIFICATION</b></p>
        <form method="post" action="">
      
        <div class="contentedit1">
        <textarea id="textarea" name="body1"rows="3"><?php echo $body1?></textarea>
        </div>

        <div class="contentedit2">
        <textarea id="textarea" name="body2"rows="8"><?php echo $body2?></textarea>
        </div>

        <div class="contentedit3">
        <textarea id="textarea" name="body3"rows="3"><?php echo $body3?></textarea>
        </div>

        <p id="date">Issued on {{ date }}.</p>
       
        <div class="signature">
            <p><input type="text" id="myInput" name="body4" value="<?php echo $forname?>"></p>
            <input type="submit" id="save" name="submit" value="SAVE CHANGES">
        </form>
            <p>University Registrar</p>
        </div>

        <div class="seal">
            <p><i>Not valid without the</i></p>
            <p><i>University seal.</i></p>
        </div>

    </div>
</main>



<footer>

</footer>






</body>
</html>