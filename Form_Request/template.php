<?php

include "condb.php";






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template.css">
    <title>Document</title>
</head>
<body>
        <p>UMak-UR-QF-19</p>
        <table class="header">
            <tr class="wewe">
                <td>
                    <img class="logo" src="img/UMakLogo.png">
                </td>

                <td style="width: 79%;"class="umak"> 
                    <h1>UNIVERSITY OF MAKATI</h1>
                    <p class="tdAddress">J.P. Rizal Extension, West Rembo, Makati City</p>
                </td>
            </tr>
        </table>
    <table class="date">
        <tr>
            <td class="cDate"><p><strong>{{ date }}</strong></p></td>
        </tr>
        <!-- <tr>
            <td class="tDate"><p>DATE</p></td>
        </tr> -->
    </table>

    <table class="Dcontent">
        <tr>    
            <td class="rData1"><p>The Principal / Registrar</p></td>
        </tr>
        <tr>
            <td class="rData2"><p>{{ nofSchool }}</p></td>
        </tr>
        <tr>
            <td class="rData3"><p>{{ AofSchool }}</p></td>
        </tr>
    </table>
    
    <p>Dear Sir / Madam :<br><br>
        {{ body1 }}<strong> <u>{{ selector }}</u> </strong>{{ body2 }}
        </p>
        <br>

        <table class="studentInfo">
            <tr>
                <td class="zero">&nbsp;</td>
                <td colspan="2">Attended that School / College / University</td>
            </tr>

            <tr>
                <td>Student Name</td>
                <td>Year / Section / Course </td>
                <td> Academic Year</td>
            </tr>

            <tr>
                <td class="info">{{ name }}</td>
                <td class="info">{{ ysc }}</td>
                <td class="info">{{ ay }}</td>
            </tr>
        </table>

        <br>
        <table class="tableConclude">
            <tr>
                <td class="vty">
                    Very Truly Yours,
                </td>
            </tr>
        </table>

        <table class="tableSignature">
            <tr>
                <td>
                    for: <strong>{{ forname }}</strong>
                </td>
            </tr>

            <tr>
                <td>
                    University Registrar
                </td>
            </tr>
        </table>

        <table class="finalConclude">
            <tr>
                <td class="urgency"> <p><strong>{{ urgentYN }}</strong></p><hr> </td>
                <td class="infoText">Urgent</td>
            </tr>
            <tr>
                <td class="request"><p><strong>{{ tr }}</strong></p><hr></td>
                <td class="infoText">Request</td>
            </tr>
            <tr>
                <td class="entrust"><p><strong>{{ entrust }}</strong></p><hr></td>
                <td class="infoText">Kindly entrust to the bearer the said <u>{{ selector }}</u> with remarks "<u>COPY FOR UMAK</u>"</td>
            </tr>
            <tr>
                <td class="mail"><p><strong>{{ mail }}</strong></p><hr></td>
                <td class="infoText">Please mail the said <u>{{ selector }}</u></td>
            </tr>

        </table>
</body>
</html>