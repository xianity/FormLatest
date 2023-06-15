<?php 
include 'condb.php';
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
    <link rel="stylesheet" href="history.css" />
    <link rel="icon" href="img/UMakLogo.png" />
    <title>History</title>
  </head>
  <body>
    <!-- NAVIGATION BAR -->
    <nav>
      <div class="logo">
        <img src="img/UMakLogo.png" alt="Logo" />
        <span>UMak Request Form</span>
      </div>
      <ul class="nav-links">
        <li><a href="index.php"> REQUEST FORM</a></li>
        <li>
          <a href="ched.php">CHED INDORSEMENT</a>
        </li>
        <li><a href="history.php"> HISTORY</a></li>
        <li>
          <form action="" method="post" enctype="multipart/form-data">
            <button type="submit" name="logout" class="logout">LOG OUT</button>
          </form>
        </li>
      </ul>
    </nav>
    <!-- END OF NAVIGATION BAR -->
    <div class="content">
      <div class="table-wrapper">
          <div class="header">HISTORY</div>
          <table>
            <thead>
              <tr>
                <td class="th"><b> DATE</b></td>
                <td class="th"><b> USERNAME</b></td>
                <td class="th"><b> STUDENT NAME</b></td>
                <td class="th"><b> TYPE OF FORM</b></td>
                <td class="th"></td>
                <td class="th"></td>
              </tr>
            </thead>

            <?php 
            $sql = "SELECT * FROM history_page";
              $select = mysqli_query($conn, $sql);


                if (mysqli_num_rows($select) > 0){
                    while ($row = mysqli_fetch_assoc($select)){
                        $studentname = $row['studentName'];
                        $ftype = $row['formtype'];
                        $date = $row['date'];
                        $user = $row['username'];
                        $id = $row['account_id'];

                        echo '
                        <tbody>
                          <form action="print-pdf.php" method="POST">
                            <tr>
                                <td>'.$date.'</td>
                                <td>'.$user.'</td>
                                <td>'.$studentname.'</td>
                                <td>'.$ftype.'<input type="hidden" name = "id" value ="'.$id.'"></td>
                                <td><a href="edit.php?id='.$id.'" name="edit" class="edit"> EDIT </a></td>
                               <td><input type="submit" value="PRINT" class="submitBtn"/></td>

                            <tr>
                          </form>
                        <tbody>';
                    }
                }
            ?>
          </table>

      </div>
    </div>
    <footer></footer>
  </body>
</html>