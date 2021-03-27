<?php

require_once __DIR__ . '/vendor/autoload.php';
//get users inputs
$name=$_POST["name"];
$name1=$_POST["name1"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$adress=$_POST["adress"];
$quantite=(double)$_POST["quantity"];
$img="images/logo111.png";
//width='200px' height='200px'
//create pdf
$mpdf= new \Mpdf\Mpdf();
$data='';
$mpdf->AddPage("R");
$mpdf->showImageErrors = true;
$mpdf->img_dpi = 96;
//$mpdf->Image('images/enactus-logo.png', 5, 5, 21, 29, 'png', '', false,false,false,true);

$mpdf->Image('images/enactus.jpeg',  5, 5, 21, 29, 'jpeg', '');
$mpdf->Image('images/logo11.jpeg', 90, 5, 21, 29, 'jpeg', '');
// $mpdf->imageVars['myvariable'] = file_get_contents('images/logo11.png');
// $html = '<img src="var:myvariable" />';
// $mpdf->SetHTMLHeader(" <img src='images/logo111.png'   />");
// $data .=" <img src='images/logo111.png'   />";<img src=''   />
$data .="<div>
<h2>BabySafety & $name1 </h2><h1>Bon de commande</h1>
</div>";
// $data .="<br>";
$date=date('Y-m-d H:i:s');
$file = fopen("FactureNum.txt", 'r') ;
$num=(int)fgets($file);

$data .="<h5>date : le ".$date."     __________  Facture Num: ".--$num." </h5>
Date d'expedition : 1/4/2021 <br>";
//ftruncate($file,0);or die("Unable to open file!")
//file_put_contents($file,'');
fclose($file);

$file = fopen("FactureNum.txt", 'w') ;
fwrite($file,++$num);
fclose($file);

// $data .="";
// $data .="Fournisseur: ENACTUS EMI  <br>                  
//               BabySafety <br>
//              RABAT , MAROC <br>
//              06 72 20 59 57 <br>
//              assmalissigui99@gmail.com <br>";
// $data .="Destinataire: $name1  <br>                  
//              $name <br>
//             $adress <br>
//             $phone <br>
//             $email <br>";
$data .="
<div><table style='table,th,td{
    border: 2px solid black;
  
}
th,td{
    padding:15px;
}
' >
<tr>
<th>
Fournisseur:
</th>
<th>
|||
</th>
<th>
Destinataire:
</th>
</tr>

<tr>
<td>
ENACTUS EMI
</td>
<td>
|||
</td>
<td>
$name1
</td>
</tr>

<tr>
<td>
BabySafety
</td>
<td>
|||
</td>
<td>
$name
</td>
</tr>

<tr>
<td>
RABAT , MAROC
</td>
<td>
|||
</td>
<td>
$adress
</td>
</tr>

<tr>
<td>
06 72 20 59 57
</td>
<td>
|||
</td>
<td>
$phone
</td>
</tr>

<tr>
<td>
assmalissigui99@gmail.com
</td>
<td>
|||   
</td>
<td>
$email
</td>
</tr>
</table>
</div><br><br>
";
$prixTot=(int)$quantite*370;
$data .="<table>
<tr><th> Article No:  </th><th>  Description </th><th> Quantite  </th><th>  Prix unitaire </th><th> Prix total  </th></tr>
<tr><td>  1 </td><td> Sac de couchage BABYSAFETY   </td><td> $quantite  </td><td> 370.00 dh  </td><td> $prixTot  </td></tr>
</table> <br><br>";

$data .="<h2 style='font-weight: 300;'> Totale =_________ $prixTot dh</h2>";
//writepdf
$mpdf->WriteHTML($data);
//output to browser  "hello.pdf",'D'
$filename="BabySafetyBonDeCommande".date('Y-m-d H-i-s').".pdf";
$mpdf -> Output($filename,"D"); //D for download
// $pdf =$mpdf -> Output('','S');

/**
 * to be continued
 */


// I was Working on sending email by phpMailer , but I stopped it because 
// I fing some problemes on how to configure the composer by adding phpmailer liberary (on the composer)
// but here is the lines of code that we will put instead of the Download Output

// //run fct
// SendEmail($pdf,$enqueryData);

// function SendEmail($pdf,$enqueryData){

// //Instantiation and passing `true` enables exceptions
// $mail = new PHPMailer(true);

// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'emi.shop.pi@gmail.com';                     //SMTP username
//     $mail->Password   = 'emi.shop.piemi.shop.pi';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
//     $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

//     //Recipients
//     $mail->setFrom('redaelouahabi@student.emi.ac.ma', 'Mailer');
//     $mail->addAddress('redaelouahabi98@gmail.com', 'Joe User');     //Add a recipient
    



//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = 'Here is the subject';
//     $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
// }
?>