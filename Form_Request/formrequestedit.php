<?php
// logout
session_start();
if (is_null($_SESSION['id']))
{
  header('location:login.php');
}
include "condb.php";
$accountID = $_GET['id'];

  $sql = "SELECT * FROM history_page WHERE account_id = '$accountID'";
  
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
      $studentname = $row['studentName'];
      $yearsec = $row['yearSec'];
      $acadyear = $row['acadYear'];
      $schoolName = $row['schoolName'];
      $schoolAddress = $row['schoolAddress'];
      $formtype = $row['formtype'];
      $urgent = $row['urgency'];
      $timereq = $row['timeReq'];
      $copymail = $row['copyormail'];
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'linkheader.php'; ?>
    <link rel="stylesheet" href = "css/formrequest.css">
    <title>Form Request</title>
</head>
<body>
<?php include 'header.php'?>


<main>
    <div class="container">
        <div class="title">
            <p>FORM REQUEST</p>
        </div>

        <form method="post" action="generate-pdf.php" class="formrequest">
        <p>FILL THE INFORMATION</p>
        <div class="main-flex">
            <div class="flex1">
                <label>NAME OF STUDENT</label>
                <input type="text" name="name" value ="<?php echo $studentname;?>">
                <label>NAME OF SCHOOL</label>
                <input type="text" name="nameOfSchool" value = "<?php echo $schoolName;?>">
                <label>ADDRESS OF SCHOOL</label>
                <input type="text" name="addressOfSchool" value = "<?php echo $schoolAddress; ?>">
                <label>SELECT A REQUEST</label>
                <select name="selector" id="selectID">
                <option value="" disabled selected>
                    <i>-- Select an option --</i>
                </option>
                <?php if($formtype=="Form 137-A")
                {
               echo "<option value='Form 137-A' name='f137' selected>FORM 137-A</option> >";
               echo "<option value='Transcript of Records' name='tor'>Transcript of Records</option>";
                }

                else
                {
                echo "<option value='Form 137-A' name='f137' >FORM 137-A</option> >";
                echo "<option value='Transcript of Records' selected name='tor'>TRANSCRIPT OF RECORDS</option>";
                }            
                ?>

                </select>
                <label>TIMES REQUESTED ⓘ</label>
                <input type="text"  name ="timeReq" value="<?php echo $timereq; ?>">

            </div>
            <div class="flex2">
            <label>YEAR / SECTION / COURSE</label>
            <input type="text" name="ysc" value = "<?php echo $yearsec;?>">
            <label>ACADEMIC YEAR</label>
            <input type="text" name="ay" value = "<?php echo $acadyear;?>">
           
            <label>URGENCY<label>
            <div class="urgency">
            <?php 
              if ($urgent=="yes"){
                echo" <div class='yes'>
                <input type='radio' id='yes' name='urgent' value='yes' checked>
                <label for='yes'>YES</label>
                </div>
                <div class='no'>
                <input type='radio' id='no' name='urgent' value='no' >
                <label for='no'>NO</label>
                </div>";
              }
              else{
                echo" <div class='yes'>
                <input type='radio' id='yes' name='urgent' value='yes' x>
                <label for='yes'>YES</label>
                </div>
                <div class='no'>
                <input type='radio' id='no' name='urgent' value='no' checked>
                <label for='no'>NO</label>
                </div>";
              }
            ?>

          </div>

         
          <label>Check one below:</label>
          <div class="below">
          <?php 
              if ($copymail == "copy"){
                echo " <div class='below1'>
                <input type='radio' name='mode' value='copy' checked>
                <label for='entrust'>Kindly entrust to the bearer the said F137-A / Transcript of Records with remarks 'COPY FOR UMAK'</label>
                </div>
                <div class='below1'>
                <input type='radio' name='mode' value='mail' >
                <label for='mail'>Please mail the said F137-A / Transcript of Records</label>
                </div>";
              }
              else {
                echo " <div class='below1'>
                <input type='radio' name='mode' value='copy' >
                <label for='entrust'>Kindly entrust to the bearer the said F137-A / Transcript of Records with remarks 'COPY FOR UMAK'</label>
                </div>
                <div class='below1'>
                <input type='radio' name='mode' value='mail' checked >
                <label for='mail'>Please mail the said F137-A / Transcript of Records</label>
                </div>";

              }
            ?>


               
          </div>
            
            </div>
        </div>
        <div class="buttonForm">
        <button>RESET</button><input type="submit" value="PRINT" class="submitBtn" />
        </div>
        </form>
    </div>
</main>


<footer>

</footer>


</body>
</html>