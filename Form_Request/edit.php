<?php
// logout
session_start();
if (is_null($_SESSION['id']))
{
  header('location:login.php');
}

if (isset($_POST['logout'])){

  unset($_SESSION['id']);
  header('location:login.php');
}

include "condb.php";

if (isset($_POST['edit'])) {
  $studentname = $_POST['name'];
  $yearsec = $_POST['ysc'];
  $acadyear = $_POST['ay'];
  $schoolName = $_POST['nameOfSchool'];
  $schoolAddress = $_POST['addressOfSchool'];
  $urgent = $_POST['urgent'];
  $timereq = $_POST['timeReq'];
  $copymail = $_POST['mode'];
  $formtype = $_POST['selector'];
  $date = date_default_timezone_set('Asia/Manila');
  $accountID = $_GET['id'];

  $sql = "UPDATE history_page 
  SET studentName = '$studentname', yearSec = '$yearsec', acadYear = '$acadyear', schoolName = '$schoolName', schoolAddress = '$schoolAddress', urgency = '$urgent', timeReq = '$timereq', copyormail = '$copymail', formtype = '$formtype' 
  WHERE account_id = '$accountID'";

  $result = $conn->query($sql);

  if ($result == TRUE){
    echo "<script type='text/javascript'>alert('Record Updated');</script>";
  }

  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

  $accountID = $_GET['id'];

  $sql = "SELECT * FROM history_page WHERE account_id = '$accountID'";
  
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $studentname = $row['studentName'];
    $course = $row['course'];
    $date = $row['date'];
    $user = $row['username'];
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/UMakLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="index.css" />
    <title>Form Request</title>
  </head>
  <body>
    <!-- NAVIGATION BAR -->
    <nav>
      <div class="logo">
        <img src="img/UMakLogo.png" alt="Logo" />
        <span>UNIVERSITY OF MAKATI</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="index.php"> REQUEST FORM</a>
        </li>
        <li>
          <a href="ched.php">CHED INDORSEMENT</a>
        </li>
        <li>
          <a href="history.php">HISTORY</a>
        </li>
        <li>
          <form action="index.php" method="post" enctype="multipart/form-data">
            <button type="submittt" name="logout" class="logout">LOG OUT</button>
          </form>
        </li>
      </ul>
    </nav>
    <!-- END OF NAVIGATION BAR -->
    <div class="content">
      <div class="header">UPDATE INFORMATION</div>

      <form action="" method="POST">
        <p>NAME OF STUDENT</p>
        <input type="text" name="name" value ="<?php echo $studentname;?>">
        <p>YEAR / SECTION / COURSE</p>
        <input type="text" name="ysc" value = "<?php echo $yearsec;?>">
        <p>ACADEMIC YEAR</p>
        <input type="text" name="ay" value = "<?php echo $acadyear;?>">
        <p>NAME OF SCHOOL</p>
        <input type="text" name="nameOfSchool" value = "<?php echo $schoolName;?>">
        <p>ADDRESS OF SCHOOL</p>
        <input type="text" name="addressOfSchool" value = "<?php echo $schoolAddress; ?>">
        <p>SELECT A REQUEST</p>
        <select name="selector" id="selectID" value = "">
          <option value="" disabled selected>
            <i>-- Select an option --</i>
          </option>

          <?php if($formtype=="Form 137-A"){
               echo "<option value='Form 137-A' name='f137' selected>FORM 137-A</option> >";
               echo "<option value='Transcript of Records' name='tor'>Transcript of Records</option>";
          }

          else{
            echo "<option value='Form 137-A' name='f137' >FORM 137-A</option> >";
            echo "<option value='Transcript of Records' selected name='tor'>TRANSCRIPT OF RECORDS</option>";
          }            
            ?>
        </select>
        
        <div class="urgentTimes">
          <div class="urgency">
            <p>URGENCY</p>

            <?php 
              if ($urgent=="yes"){
                echo "<input type='radio' id='yes' name='urgent' value='yes' checked/>
                      <label for='yes'>YES</label>";
                echo "<input type='radio' id='no' name='urgent' value='no'/>
                      <label for='no'>NO</label>";
              }
              else{
                echo "<input type='radio' id='yes' name='urgent' value='yes'/>
                      <label for='yes'>YES</label>";
                echo "<input type='radio' id='no' name='urgent' value='no' checked/> 
                      <label for='no'>NO</label>";
              }
            ?>

          </div>


          <div class="times">
            <p>
              TIMES REQUESTED
              <span class="info">ⓘ
                <span class="pop-up">
                  How many times <br />
                  it was requested</span
                >
              </span>
            </p>

            <input type="text"  name = "timeReq" value="<?php echo $timereq; ?>">
          </div>
        </div>

        <div class="mode">
          <p>Check one below:</p>
          <table>
            <?php 
              if ($copymail == "copy"){
                echo "<tr>
                        <td><input type='radio' name='mode' value='copy' checked ></td>
                        <td><label for='entrust'>Kindly entrust to the bearer the said F137-A / Transcript of Records with remarks 'COPY FOR UMAK'</label></td>
                      </tr>";
                echo "<tr>
                        <td><input type='radio' name='mode' value='mail' /></td>
                        <td><label for='mail'> Please mail the said F137-A / Transcript of Records</label></td>
                      </tr>";
              }
              else {
                echo "<tr>
                        <td><input type='radio' name='mode' value='copy'></td>
                        <td><label for='entrust'>Kindly entrust to the bearer the said F137-A / Transcript of Records with remarks 'COPY FOR UMAK'</label></td>
                      </tr>";

                echo "<tr>
                        <td><input type='radio' name='mode' value='mail' checked ></td>
                        <td><label for='mail'> Please mail the said F137-A / Transcript of Records</label></td>
                      </tr>";
              }
            ?>
          </table>
        </div>

        <input type="submit" name = "edit" value="UPDATE" class="submitBtn" />
      </form>
    </div>
    <footer></footer>
    
  </body>
</html>

