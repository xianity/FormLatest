<?php

use FontLib\Table\Type\head;

include "../condb.php";

if(isset($_POST['submit'])){
    $body1 = $_POST["body1"];
    $body2 = $_POST["body2"];
    $body3 = $_POST["body3"];
    $body4 = $_POST["body4"];
    $result = mysqli_query($conn, "UPDATE chedform1 SET contentedit1 = '$body1', contentedit2 = '$body2', contentedit3 = '$body3', forname = '$body4'");
    header("Location:chedreqpdf.php");
}

if(isset($_POST['submit1'])){
    $body1 = $_POST["body1"];
    $body2 = $_POST["body2"];
    $body3 = $_POST["body3"];
    $body4 = $_POST["body4"];
    $result = mysqli_query($conn, "UPDATE chedform2 SET content2edit1 = '$body1', content2edit2 = '$body2', forname2 = '$body4'");
    header("Location:chedreqpdf.php");
}

if(isset($_POST['submit2'])){
    $body1 = mysqli_real_escape_string($conn, $_POST["body1"]);
    $body2 = mysqli_real_escape_string($conn, $_POST["body2"]);
    $body3 = mysqli_real_escape_string($conn, $_POST["body3"]);
    $body4 = mysqli_real_escape_string($conn, $_POST["body4"]);

    // Construct and execute the SQL query
    $query = "UPDATE chedform3 SET content3edit1 = '$body1', content3edit2 = '$body2', content3edit3 = '$body3', forname3 = '$body4'";
    $result = mysqli_query($conn, $query);
}

$result = mysqli_query($conn, "SELECT * FROM chedform1");

$get = mysqli_fetch_assoc($result);
$body1 = $get['contentedit1'];
$body2 = $get['contentedit2'];
$body3 = $get['contentedit3'];
$forname = $get['forname'];


$result = mysqli_query($conn, "SELECT * FROM chedform2");

$get = mysqli_fetch_assoc($result);
$body21 = $get['content2edit1'];
$body22 = $get['content2edit2'];
$body23 = $get['content2edit3'];
$forname2 = $get['forname2'];




$result = mysqli_query($conn, "SELECT * FROM chedform3");

$get = mysqli_fetch_assoc($result);
$body31 = $get['content3edit1'];
$body32 = $get['content3edit2'];
$body33 = $get['content3edit3'];
$forname3 = $get['forname3'];



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
    <link rel="stylesheet" href="css/chedreqedit.css">
    <link rel="stylesheet" href="css/gwareqedit.css">
    <link rel="stylesheet" href="css/checreqpage3.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>CHED FORM</title>
</head>
<script>
  $(document).ready(function() {
    $('#button1').click(function() {
      $('#page1').show();
      $('#page2').hide();
      $('#page3').hide();
    });

    $('#button2').click(function() {
      $('#page1').hide();
      $('#page2').show();
      $('#page3').hide();
    });

    $('#button3').click(function() {
      $('#page1').hide();
      $('#page2').hide();
      $('#page3').show();
    });
  });
</script>
<body>
<?php 
    include "navadmin.php";
    ?>

<main>
    <h1>CHED CERTIFICATE FORM</h1>
    <div class="buttonpage">
        <button id="button1">1</button>
        <button id="button2">2</button>
        <button id="button3">3</button>
    </div>
    <div class="pdf-container" id="page1">

    <div class="date">
    <p class="cDate"><strong>{{ date }}</strong></p>
    <p class="tDate">Date</p>

    </div>
    
        
     <div class="headerdetails">

                <p class="rData1">Dr. JULIETA M. PARAS, CESE</p>
                <p class="rData2"><p>Director IV</p></td>
                <p class="rData3">CHED National Capital Region</p>
                <p class="rData4">2nd Floor Higher Education Development Center (HEDC) Bldg.</p>
                <p class="rData4">Carlos P. Garcia Avenue, UP Campus, Diliman, Quezon City</p>
    </div>    
   
<form method="post" action="">

            <p class="letter__Content">
            <textarea id="textarea" name="body2" rows="3"><?php echo $body2?></textarea>
            </p>
            <br>


        <table class="studentInfo">
            {{ record }}
        </table>
        <br>


        <div class="thankyou">
                <p class="infoText">Thank you.</p>
                <p class="infoConclude">Respectfully yours,</p>
        </div>


        <div class="student">
                <p class="student__Name"><b>{{ name }}</b></p>
                <p class="student__Text"><b>Student</b></p>
        </div>

        <hr>
       
                
         <br>

            <h1 class="title">1st Indorsement</h1>
            <p class="header__Umak">University of Makati</p>
            <p class="date__format">{{ date }}</p>
            <br>
        

        <p class="letter__content1">
        <textarea id="textarea" name="body3" rows="5"><?php echo $body3?></textarea>
       
        </p>

        
        <br>
        <br>

        <div class="letter__conclude">
            <p><b><input type="text" id="myInput" name="body4" value="<?php echo $forname?>"></b></p>
            <p><b>University Registrar</b></p>
            <input type="submit" id="save" name="submit" value="SAVE CHANGES">
        </form>
        </div>
        <br> <br> <br><br>
        <table class="final__conclude">
            <tr>
                <td class="final__main">
                    Note: The following documents are attached:
                </td>
            </tr>

            {{ record }}
        </table>

        

    </div>


    <div class="pdf-container" id="page2">

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
        <textarea id="textarea" name="body1"rows="3"><?php echo $body21?></textarea>
        </div>

        <div class="contentedit2">
        <textarea id="textarea" name="body2"rows="3"><?php echo $body22?></textarea>
        </div>


        <p id="date">Issued on {{ date }}.</p>
       
        <div class="signature">
            <p><input type="text" id="myInput" name="body4" value="<?php echo $forname2?>"></p>
            <input type="submit" id="save" name="submit1" value="SAVE CHANGES">
        </form>
            <p>University Registrar</p>
        </div>

        <div class="seal">
            <p><i>Not valid without the</i></p>
            <p><i>University seal.</i></p>
        </div>
    </div>













    <div class="pdf-container" id="page3">
                <p class="f__date">{{ date }}</p>

            <p class="f__head">CAV LUC No:_______ Series of {{ year }}</p>

            <p class="f__title">CERTIFICATION, AUTHENTICATION AND VERIFICATION</p>

            <p class="f__concern">To Whom It May Concern:</p>
            <p class="f__certify">
            This is to certify that based on our record, mentioned below:
            </p>

            <table class="f__table">
            <tr>
                <td>Name of Student:</td>

                <td><b> {{ name }} </b></td>
            </tr>

            <tr>
                <td>Degree:</td>

                <td><b> {{ course }} </b></td>
            </tr>

            <tr>
                <td>Date of Grad/Units Earned:</td>

                <td><b> {{ units }} UNITS</b></td>
            </tr>

            <tr>
                <td>Name of Institution:</td>
                <td><b> UNIVERSITY OF MAKATI </b></td>
            </tr>

            <tr>
                <td>Address:</td>
                <td><b> JP RIZAL EXT. WEST REMBO, MAKATI CITY </b></td>
            </tr>
            </table>
                <form method="post" action="">
            <p class="f__content">
            <textarea id="textarea" name="body1"rows="6"><?php echo $body31?></textarea>
            <!-- This is to further certify that Makati Polytechnic Community College, now
            University of Makati was established as a duly authorized public higher
            education institution created by virtue of Municipal Ordinance Number 108,
            hence it is exempted from the issuance of Special Order by the Commission
            on Higher Education. -->
            </p>

            <p class="f__fcontent">
            <textarea id="textarea" name="body2"rows="3"><?php echo $body32?></textarea>
            <!-- This certification must not be honored if the copies of the students
            Transcript of Records and Diploma presented are not duly
            authenticated/certified by the School Registrar. -->
            </p>

            <p class="f__issue">
            <textarea id="textarea" name="body3"rows="3"><?php echo $body33?></textarea>
            <!-- Issued upon the request of <b>{{ lastname }}</b> for whatever legal purpose it
            may serve. -->
            </p>

            <table class="f__conclude">
            <tr>
                <td class="f__signature">
                <b><input type="text" id="myInput" name="body4" value="<?php echo $forname3?>"></b>
                <input type="submit" id="save" name="submit2" value="SAVE CHANGES">
         </form>
                </td>
            </tr>

            <tr>
                <td class="f__uni">University Registrar</td>
            </tr>
            </table>

            <p class="f__final">
            NOT VALID WITHOUT UNIVERSITY SEAL OR WITH ERASURE OR ALTERATION
            </p>

            <table class="f__finale">
            <tr>
                <td>Processed by:</td> <td>__________</td>
            </tr>

            <tr>
                <td>Reviewed by:</td> <td>__________</td>
            </tr>

            <tr>
                <td>OR No:</td> <td>__________</td>
            </tr>

            <tr>
                <td>Date Issued:</td> <td>__________</td>
            </tr>

            <tr>
                <td>Amount:</td> <td>__________</td>
            </tr>

            </table>









                </div>




</main>



<footer>

</footer>






</body>
</html>