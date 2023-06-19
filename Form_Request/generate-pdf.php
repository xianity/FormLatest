<?php
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;
include('condb.php');
session_start();


$date = date_default_timezone_set('Asia/Manila');

$date = date('F d, Y');
$name = $_POST['name']??'';
$selector = $_POST['selector'];
$ysc = $_POST['ysc']??'';
$ay = $_POST['ay']??'';
$nofSchool = $_POST['nameOfSchool']??'';
$AofSchool = $_POST['addressOfSchool']??'';
$urgentVal = $_POST['urgent']??'';
$urgentYN;
$tr = $_POST['timeReq']??'';
$modeVal = $_POST['mode'];
$username = $_SESSION['username'];
$entrust;
$mail;

if ($modeVal == 'copy') {
    $entrust = "x";
    $mail = "&nbsp;";
}
else {
    $entrust = "&nbsp;";
    $mail = "x";
}

if ($urgentVal == 'yes'){
    $urgentYN = "x";
}
else {
    $urgentYN = "&nbsp;";
}

$result = mysqli_query($conn, "SELECT * FROM requestform");

$get = mysqli_fetch_assoc($result);
$body1 = $get['body1'];
$body2 = $get['body2'];
$forname = $get['forname'];


$sql = "INSERT INTO history_page (username,date,studentName,formtype,yearSec,acadYear,schoolName,schoolAddress,urgency,timeReq,copyormail) VALUES ('$username','$date','$name','$selector','$ysc','$ay','$nofSchool','$AofSchool','$urgentVal','$tr','$modeVal')";

if($result = mysqli_query($conn,$sql))


// $F137 = $_POST['f137']??'';
// $ToR = $_POST['tor']??'';

$options = new Options;
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__);


$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", "portrait");

// $html = file_get_contents("template.html");
// $html = str_replace(["{{ nofSchool }}","{{ AofSchool }}", "{{ selector }}", "{{ name }}", "{{ ysc }}", "{{ ay }}", "{{ date }}", "{{ urgentVal }}", "{{ urgentYN }}", "{{ tr }}", "{{ modeVal }}", "{{ entrust }}", "{{ mail }}"], [$nofSchool,$AofSchool,$selector,$name,$ysc,$ay,$date,$urgentVal, $urgentYN, $tr, $modeVal, $entrust, $mail], $html);
$html = file_get_contents("template.php");
$html = str_replace(["{{ nofSchool }}","{{ AofSchool }}", "{{ selector }}", "{{ name }}", "{{ ysc }}", "{{ ay }}", "{{ date }}", "{{ urgentVal }}", "{{ urgentYN }}", "{{ tr }}", "{{ modeVal }}", "{{ entrust }}", "{{ mail }}","{{ body1 }}","{{ body2 }}","{{ forname }}"], [$nofSchool,$AofSchool,$selector,$name,$ysc,$ay,$date,$urgentVal, $urgentYN, $tr, $modeVal, $entrust, $mail, $body1, $body2, $forname], $html);
$dompdf->loadHTMl($html);
//$dompdf->loadHtmlFile("template.html");


$dompdf->render();

$dompdf ->addInfo("Title","Form Request");

$dompdf->stream("RequestedForm.pdf",["Attachment"=> 0]); //PDF NAME "NAME TO" , ["Attachment"=> 0] View PDF IN BROWSER

?>