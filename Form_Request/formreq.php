<?php 
include 'condb.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'linkheader.php'; ?>
    <title>Form Request</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1 class="history">FORM HISTORY</h1>
    <main>
        <div class="table-container">
        <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Username</th>
                <th>Student Name</th>
                <th>Type of Form</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>March 31, 2023</td>
                    <td>xian</td>
                    <td>Jommel P</td>
                    <td>Form 137-A</td>
                    <td><button>EDIT</button> <button>PRINT</button> </td>
                </tr> -->
            

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

                                echo '<form action="print-pdf.php" method="POST">
                                    <tr>
                                        <td>'.$date.'</td>
                                        <td>'.$user.'</td>
                                        <td>'.$studentname.'</td>
                                        <td>'.$ftype.'<input type="hidden" name = "id" value ="'.$id.'"></td>
                                        <td><a href="formrequestedit.php?id='.$id.'" name="edit" class="edit"> PRINT </a></td>
                                    <tr>
                                </form>
                                ';
                            }
                        }
                    ?>
            </tbody>
        </table>
        </div>
    </main>
<footer>
</footer>




    
</body>
</html>