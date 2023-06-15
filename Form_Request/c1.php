<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "css/c1.css">
    <?php include 'linkheader.php'; ?>
    <title>Form Request</title>
</head>
<body>
<?php include 'header.php'?>


<main>
    <div class="container">
        <div class="title">
            <p>C1 CERTIFICATION</p>
        </div>
        <form method="post" action="c1-generate.php" class="formrequest">
        <p>FILL THE INFORMATION</p>
        <div class="main-flex">
            <div class="flex1">
                <label>NAME OF STUDENT</label>
                <input type="text" name="name" required>
                <label>FINISHED DEGREE</label>
                <input type="text" name="degree" required>
                <label>DATE GRADUATED</label>
                <input type="date" name="dategrad" required>
                
                <label>SCHOOL GRADUATED</label>
                <input type="text"  name ="mater"required>
                <label>GENDER</label>
                <select name="gender" id="">
                <option>Male</option>
                <option>Female</option>
                </select>

            </div>
            <div class="flex2">
            

                <label>ENGLISH UNIT EARNED</label>
                <input type="text" name="unit1" required>
                <label>SOCIAL SCIENCE UNIT EARNED</label>
                <input type="text" name="unit2" required>
                <label>MATH UNIT EARNED</label>
                <input type="text" name="unit3" required>
                <label>RIZAL UNIT EARNED</label>
                <input type="text" name="unit4" required>
           
           
          
            
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