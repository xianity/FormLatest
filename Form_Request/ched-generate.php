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
$course = strtoupper($_POST['course']??'');
$nou = $_POST['nou']??'';
$gender = $_POST['gender']??'';
$record = $_POST['record']??'';
$dog = $_POST['dog']??'';
$printrecord ="";
$printrecord1 ="";
$gendername ="";
$formattedDate = date('F j, Y', strtotime($dog));
$year = date('Y');
$row = 1;
$words = explode(' ', $name);
$lastname ="";
// Get the last word
$lastWord = end($words);

if ($gender == "Male"){
    $gendername = "MR. ".strtoupper($name);
$lastWord = end($words);
    $lastname = "MR. ".strtoupper($lastWord);
}
else
{
    $gendername = "MS. ".strtoupper($name);
    $lastname = "MR. ".strtoupper($lastWord);
}

foreach($record as $recordrow){
    $printrecord .= "<tr>
    <td class='final_admin'>". $row."."."<u>".$recordrow."</u></td>
  </tr>";
  $row+=1;
}
$row = 1;
foreach($record as $recordrow){
    $printrecord1 .= "<tr>
    <td class='info1'>". $row."."."<u>".$recordrow."</u></td>
  </tr>";
  $row+=1;
}


$query = "INSERT INTO ched_history(studentName, course, noofUnits , gender, dateofgraduation, date ,username) VALUES('$name', '$course','$nou','$gender','$dog', '$date','$username')";
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

$html = file_get_contents("ched_template.html");
$html = str_replace(["{{ date }}", "{{ name }}","{{ course }}","{{ record }}"], [$date, $gendername, $course,$printrecord1], $html);

$html2 = file_get_contents("cert_grad.html");
$html .= str_replace(["{{ date }}", "{{ name }}","{{ course }}","{{ name1 }}","{{ dog }}"], [$date, $gendername, $course,$lastname,$formattedDate], $html2);

$html3 = file_get_contents("four_c.html");
$html .= str_replace(["{{ date }}", "{{ name }}","{{ course }}","{{ units }}","{{ lastname }}","{{ year }}"], [$date, $name, $course,$nou,$lastname,$year], $html3);




$dompdf->loadHTMl($html);
//$dompdf->loadHtmlFile("template.html");


$dompdf->render();



$dompdf ->addInfo("Title","Form Request");

$dompdf->stream("RequestedForm.pdf",["Attachment"=> 0]); //PDF NAME "NAME TO" , ["Attachment"=> 0] View PDF IN BROWSER


?>