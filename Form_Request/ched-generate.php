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

$result = mysqli_query($conn, "SELECT * FROM chedform1");

$get = mysqli_fetch_assoc($result);
$body1 = $get['contentedit1'];
$body2 = $get['contentedit2'];
$body3 = $get['contentedit3'];
$body4 = $get['forname'];

$result = mysqli_query($conn, "SELECT * FROM chedform2");

$get = mysqli_fetch_assoc($result);
$body21 = $get['content2edit1'];
$body22 = $get['content2edit2'];
$body23 = $get['forname2'];


$result = mysqli_query($conn, "SELECT * FROM chedform3");

$get = mysqli_fetch_assoc($result);
$body31 = $get['content3edit1'];
$body32 = $get['content3edit2'];
$body33 = $get['content3edit3'];
$body34 = $get['forname3'];



$options = new Options;
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__);


$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", "portrait");

$html = file_get_contents("ched_template.html");
$html = str_replace(["{{ body1 }}","{{ body2 }}","{{ body3 }}","{{ body4 }}","{{ date }}", "{{ name }}","{{ course }}","{{ record }}"], [$body1,$body2,$body3,$body4,$date, $gendername, $course,$printrecord1], $html);

$html2 = file_get_contents("cert_grad.html");
$html .= str_replace(["{{ body1 }}","{{ body2 }}","{{ body3 }}","{{ date }}", "{{ name }}","{{ course }}","{{ name1 }}","{{ dog }}"], [$body21,$body22,$body23,$date, $gendername, $course,$lastname,$formattedDate], $html2);

$html3 = file_get_contents("four_c.html");
$html .= str_replace(["{{ body1 }}","{{ body2 }}","{{ body3 }}","{{ body4 }}","{{ date }}", "{{ name }}","{{ course }}","{{ units }}","{{ lastname }}","{{ year }}"], [$body31,$body32,$body33,$body34,$date, $name, $course,$nou,$lastname,$year], $html3);




$dompdf->loadHTMl($html);
//$dompdf->loadHtmlFile("template.html");


$dompdf->render();



$dompdf ->addInfo("Title","Form Request");

$dompdf->stream("RequestedForm.pdf",["Attachment"=> 0]); //PDF NAME "NAME TO" , ["Attachment"=> 0] View PDF IN BROWSER


?>