
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
$degree = $_POST['degree']??'';
$dategrad = $_POST['dategrad']??'';
$formattedDate = date('F j, Y', strtotime($dategrad));
$gender = $_POST['gender']??'';
$mater = $_POST['mater']??'';
$unit1 = $_POST['unit1']??'';
$unit2 = $_POST['unit2']??'';
$unit3 = $_POST['unit3']??'';
$unit4 = $_POST['unit4']??'';
$gendername ="";
// $row = 1;
$words = explode(' ', $name);
$surname ="";
// Get the last word
$lastWord = end($words);

// Output the last word


if ($gender == "Male"){
    $gendername = "Mr. ".$name;
    $surname = "Mr. ".$lastWord;
}
else
{
    $gendername = "Ms. ".$name;
    $surname = "Mr. ".$lastWord;
}

$result = mysqli_query($conn, "SELECT * FROM c1form");

$get = mysqli_fetch_assoc($result);
$body1 = $get['contentedit1'];
$body2 = $get['contentedit2'];
$body3 = $get['contentedit3'];
$body4 = $get['forname'];

// foreach($record as $recordrow){
//     $printrecord .= "<tr>
//     <td class='final_admin'>". $row."."."<u>".$recordrow."</u></td>
//   </tr>";
//   $row+=1;
// }
// $row = 1;
// foreach($record as $recordrow){
//     $printrecord1 .= "<tr>
//     <td class='info1'>". $row."."."<u>".$recordrow."</u></td>
//   </tr>";
//   $row+=1;
// }


// $query = "INSERT INTO ched_history(studentName, course, noofUnits , gender, dateofgraduation, date ,username) VALUES('$name', '$course','$nou','$gender','$dog', '$date','$username')";
// if (mysqli_query($conn, $query)){
//     echo "Successfully inserted";
// }
// else{
//     echo "Failed to insert history";
// }


$options = new Options;
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__);



$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", "portrait");


$html = file_get_contents("c1-template.html");
$html = str_replace(["{{ body1 }}","{{ body2 }}","{{ body3 }}","{{ body4 }}","{{ date }}", "{{ name }}", "{{ degree }}","{{ dategrad }}","{{ mater }}","{{ unit1 }}","{{ unit2 }}","{{ unit3 }}","{{ unit4 }}","{{ surname }}"], [$body1,$body2,$body3,$body4,$date, $gendername, $degree, $formattedDate, $mater,$unit1,$unit2,$unit3,$unit4,$surname], $html);





$dompdf->loadHtml($html);
$dompdf->getOptions()->set('fontSubsetting', true);
$dompdf->render();



$dompdf ->addInfo("Title","Form Request");

$dompdf->stream("RequestedForm.pdf",["Attachment"=> 0]); //PDF NAME "NAME TO" , ["Attachment"=> 0] View PDF IN BROWSER


?>