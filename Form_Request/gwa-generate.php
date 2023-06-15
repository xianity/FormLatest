<?php 
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;
include('condb.php');
session_start();

$date = date_default_timezone_set('Asia/Manila');
$username = $_SESSION['username'];
$date = date('F d, Y');
$name = $_POST['name']??'';
$gender = $_POST['gender']??'';
$nof = $_POST['nof']??'';
$semester = $_POST['semester']??'';
$gwa = $_POST['gwa']??'';
$fullname = explode(" ", $name);
$lastname = end($fullname);
$lname = "";

$gendername ="";
$row = 1;

if ($gender == "Male"){
    $gendername = "MR. ".strtoupper($name);
    $lname = "Mr. ".$lastname;
}
else
{
    $gendername = "Ms. ".$name;
    $lname = "Ms. ".$lastname;
}




$query = "INSERT INTO gwa_history(name, professor, gwa , gender, date ,username,semester) VALUES('$name', '$nof','$gwa','$gender', '$date','$username','$semester')";
if (mysqli_query($conn, $query)){
    echo "Successfully inserted";
}
else{
    echo "Failed to insert history";
}


$options = new Options;
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__);


$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", "portrait");



$html = file_get_contents("cert_gwa.html");
$html = str_replace(["{{ date }}", "{{ name }}","{{ nof }}","{{ semester }}","{{ gwa }}","{{ lastname }}"], [$date, $gendername, $nof , $semester,$gwa ,$lname], $html);






$dompdf->loadHTMl($html);
//$dompdf->loadHtmlFile("template.html");


$dompdf->render();



$dompdf ->addInfo("Title","Form Request");

$dompdf->stream("RequestedForm.pdf",["Attachment"=> 0]); //PDF NAME "NAME TO" , ["Attachment"=> 0] View PDF IN BROWSER


?>