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
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CHED INDORSEMENT</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="img/UMakLogo.png" type="image/x-icon">
        <link rel="stylesheet" href="ched.css">
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

      <form action="ched-generate.php" method="POST">
        <p>NAME OF STUDENT</p>
        <input type="text" name="name"/>
        <p>COURSE</p>
        <input type="text" name="course"/>
        <p>NO. OF UNITS</p>
        <input type="text" name="nou"/>
    
     

        <div class="gender__select">
          
          <div class="gender">
            <p>GENDER</p>
            
            <input type="radio" name="gen" id="male" value="male">
            <label class="m" for="male">MALE</label>
            
            <input type="radio" name="gen" id="female" value="female">
            <label class="f" for="female">FEMALE</label>

          </div>
        </div>


    <div class= "docuSubmit"> 
        <p>DOCUMENTS TO BE SUBMITTED</p>

        <input type="checkbox" id="tor" name="tor" value="transcriptOfRecords">
        <label for="tor">Transcript of Records</label><br>
        <input type="checkbox" id="coe" name="coe" value="certOfUnitsEarned">
        <label for="coe"> Certificate of Units Earned</label><br>
        <input type="checkbox" id="f137" name="f137" value="form137">
        <label for="f137"> Form-137 </label><br> 
    </div>



 
        


        
        <input type="submit" value="PRINT" class="submitBtn" />
      </form>
    </div>
    <footer></footer>

        
    </body>
</html>