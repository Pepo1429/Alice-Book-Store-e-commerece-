
<?php 
 
require 'C:\xampp\composer\vendor\autoload.php';
require 'navbar.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
 $email = $_POST['email'];
 $message = $_POST['message'];
 $name = $_POST['name'];
$mail = new PHPMailer; 
 
$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'peporaev123@gmail.com';   // SMTP username 
$mail->Password = 'Pepomen1';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 
 
// Sender info 
$mail->setFrom('peporaev123@gmail.com'); 
$mail->addReplyTo($email, $name ); 
 
// Add a recipient 
$mail->addAddress('peporaev123@gmail.com'); 
 
//$mail->addCC('cc@example.com'); 
//$mail->addBCC('bcc@example.com'); 
 
// Set email format to HTML 
$mail->isHTML(true); 
 
// Mail subject 
$mail->Subject = 'AliceBookStore-Contact Form'; 
 
// Mail body content 
$bodyContent = $message; 
$mail->Body    = $bodyContent; 
 
// Send email 
if(!$mail->send()) { 
    echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
} else { 
    echo 'Message has been sent.'; 
} 
}
 
?>

<div id="map"></div>
<div id="directionsPanel" style="float:right;width:30%;height:100%"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgnFpk8Usr2FeKmiSyWZM_vZ1FDu2YZfU&callback=getLocation&libraries=&v=weekly"
      async
    ></script> 

<div class = "contactForm">
<fieldset><legend>Contact Us</legend></fieldset>
<p id = "forminfo">Please complete this form and one of our staff member will reply to you by email as soon as possible.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
<a>Name: <input type="text" name="name"></a> 
<a>Email: <input type="text" name="email"></a> 
<a>Message: <textarea name="message" rows="6" cols="25"></textarea><br/></a> 
<input type="submit" id = "sendBut" class="btn btn-primary" value="Send">
<input type="reset" id = "resetCont"class="btn btn-secondary" value="Clear">
</form>
</div>

<div class = "contactInfo">
<fieldset><legend>Contact Information</legend></fieldset>
<p>If you would prefer to contact us by phone.<p>
<p>Please call: 07444224538</p>
<p>Sorry, the phone lines are closed on Bank Holidays and New Year, <br><br>
If you have some query please use the provided contact form to contact us <br> 
or You can come personaly at the shop which is located near Marble Arch London. </p>
<p>Our staff team is working hard to respond to all enquiries as soon as possible.<br><br><br><br><br>
 Thanks for you patience.</p>
</div>

<?php include 'footer.php';?>
