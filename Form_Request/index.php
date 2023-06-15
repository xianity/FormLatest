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
      <div class="header">FILL THE INFORMATION</div>

      <form action="generate-pdf.php" method="POST">
        <p>NAME OF STUDENT</p>
        <input type="text" name="name"/>
        <p>YEAR / SECTION / COURSE</p>
        <input type="text" name="ysc"/>
        <p>ACADEMIC YEAR</p>
        <input type="text" name="ay"/>
        <p>NAME OF SCHOOL</p>
        <input type="text" name="nameOfSchool"/>
        <p>ADDRESS OF SCHOOL</p>
        <input type="text" name="addressOfSchool"/>
        <p>SELECT A REQUEST</p>
        <select name="selector" id="selectID">
          <option value="" disabled selected>
            <i>-- Select an option --</i>
          </option>
          <option value="Form 137-A" name="f137">FORM 137-A</option>
          <option value="Transcript of Records" name="tor">
            TRANSCRIPT OF RECORDS
          </option>
        </select>
        
        <div class="urgentTimes">
          <div class="urgency">
            <p>URGENCY</p>
            <input type="radio" id="yes" name="urgent" value="yes"/>
            <label for="yes">YES</label>
            <input type="radio" id="no" name="urgent" value="no"/>
            <label for="no">NO</label>
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

            <input type="text"  name = "timeReq"/>
          </div>
        </div>

        <div class="mode">
          <p>Check one below:</p>
          <table>
            <tr>
              <td><input type="radio" name="mode" value="copy"></td>
              <td><label for="entrust">Kindly entrust to the bearer the said F137-A / Transcript of Records with remarks "COPY FOR UMAK"</label></td>
            </tr>
            <tr>
              <td><input type="radio" name="mode" value="mail" /></td>
              <td><label for="mail">Please mail the said F137-A / Transcript of Records</label></td>
            </tr>
          </table>
        </div>
        <input type="submit" value="PRINT" class="submitBtn" />
      </form>
    </div>
    <footer></footer>
  </body>
</html>
