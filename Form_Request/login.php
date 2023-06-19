<?php
include 'condb.php';
session_start();

$message = ""??'';
if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);

   $select = mysqli_query($conn, "SELECT * FROM form_account WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) >0) {
        
        $_SESSION['username'] = $email;
        $result = mysqli_fetch_assoc($select);
        $_SESSION['id'] = $result['account_id'];
       $user_type = $result['user_type'];
       if ($user_type == "admin") {
        header('location:admin/formreqedit.php');
       }
       else{
          header('location:formrequest.php');
       }
      
   }

    else { 
        $message = 'Incorrect username or password!';
    } 
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link rel="shortcut icon" href="img/UMakLogo.png" type="image/x-icon">
    <title>University of Makati</title>
  </head>

  <body>
    <div class="blueContainer"></div>
    <img src="img/whitebg.png" alt="" class="whiteContainer" />

    <div class="Container">
      <div class="UmakLogo">
        <img class="umaklogocenter" src="img/umaklogo.png" alt="UMak Logo" />
      </div>

      <div class="logIn">
        <div class="compress">
          <div class="yellowBox"></div>
          <p class="big">STUDENT</p>
        </div>

        <p class="verify">FORM REQUEST</p>

        <form action="" method="post" enctype="multipart/form-data">

     
        <input type="text" name="username" placeholder="User Name" required />
       

      

        <input type="password" name="password" id="password" class="input-text" placeholder="Password" required />
          
     

        <p class="inc"> <?php echo $message ?></p>
        
        <div class="buttonCenter">
            <input type="submit" class="submitButton" name="submit" value="LOG IN" />
        </div>

        </form>
      </div>
    </div>

    <script src="alumni.js"></script>
  </body>
</html>
