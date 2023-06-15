<?php
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;
include('condb.php');
session_start();

$id = $_POST['id'];


$query = "SELECT * FROM history_page where account_id = '$id' ";
$result = mysqli_query($conn,$query);
$row = $result->fetch_assoc();
$name = $row['studentName'];
$date = $row['date'];
echo $date;
echo $name;
// $F137 = $_POST['f137']??'';
// $ToR = $_POST['tor']??'';

$name = $row['studentName'];
$date = $row['date'];
$nofSchool = $row['schoolName'];
$AofSchool = $row['schoolAddress'];
$selector = $row['formtype'];
$YSC = $row['yearSec'];
$AY = $row['acadYear'];

$urgentVal = $row['urgency'];
$tr = $row['timeReq'];
// $entrust = $row['entrust'];
$mailV = $row['copyormail'];

$entrust;
$mail;
$urgentYN;

if ($mailV == 'copy') {
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
$options = new Options;
$options->set('isRemoteEnabled', true);
$options->setChroot(__DIR__);


$dompdf = new Dompdf($options);
$dompdf->setPaper("A4", "portrait");

$html = file_get_contents("template.html");
$html = str_replace(["{{ nofSchool }}","{{ AofSchool }}", "{{ selector }}", "{{ name }}", "{{ ysc }}", "{{ ay }}", "{{ date }}", "{{ urgentYN }}", "{{ tr }}", "{{ entrust }}", "{{ mail }}"], [$nofSchool , $AofSchool, $selector, $name, $YSC, $AY, $date, $urgentYN, $tr, $entrust , $mail , ], $html);

$dompdf->loadHTMl($html);
//$dompdf->loadHtmlFile("template.html");


$dompdf->render();

$dompdf ->addInfo("Title","Form Request");

$dompdf->stream(".'$name'.'form_request'", ["Attachment"=> 0]); //PDF NAME "NAME TO" , ["Attachment"=> 0] View PDF IN BROWSER
// 
?>