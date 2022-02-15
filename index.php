<?php
//require form validation
require "validation.php";
//Import PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//include PHPMailer classes
require "PHPMailer-6.5.3\src\SMTP.php";
require "PHPMailer-6.5.3\src\Exception.php"; 
require "PHPMailer-6.5.3\src\PHPMailer.php"; 


if(isset($_POST['submit'])) 
{

$message=
'Full Name:	'.$_POST['name'].'<br />
 Subject:	'.$_POST['subject'].'<br /> 
 Email:		'.$_POST['email'].'<br />
 Message:	'.$_POST['message'].'
';
   
      
    // Instantiate PHPMailer Class  
    $mail = new PHPMailer();  
      
    // Set up SMTP  
    $mail->IsSMTP();                // Sets up a SMTP connection  
    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization    
    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection  
    $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
    $mail->Port = 465;  //Gmail SMTP port
    $mail->Encoding = '7bit';
    
    // Authentication  
    $mail->Username   = "email@gmail.com"; // Your full Gmail address
    $mail->Password   = "password"; // Your Gmail password
      
    // Compose
    $mail->SetFrom($_POST['email'], $_POST['name']);
    $mail->AddReplyTo($_POST['email'], $_POST['name']);
    $mail->Subject = "New Contact Form Enquiry";      // Subject (which isn't required)  
    $mail->MsgHTML($message);
 
    // Send To  
    $mail->AddAddress("email@gmail.com", "Recipient Name"); // Where to send it - Recipient
    $result = $mail->Send();		// Send!  
	$message = $result ? '<div class="alert alert-success" role="alert"><strong>Success!</strong>Message Sent Successfully!</div>' : '<div class="alert alert-danger" role="alert"><strong>Error!</strong>There was a problem delivering the message.</div>';  

	unset($mail);

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Contact Form using PHPMailer</title>

    <!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">

</head>
  <body>
  	<div class="contactform">
  	<div class="panel panel-default">
  		<div class="panel-heading">
    	<h3 class="panel-title"><a href="">Contact Form</a></h3>
    	</div>
    	<div class="panel-body">
    	<form name="form1" id="form1" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    			<fieldset>
				<div class="text-primary">* required fields </div>
				<br>
    			  <input type="text" class="form-control" name="name" placeholder=" * Full Name" /> 
    			  <br />
    			  <input type="text" class="form-control" name="subject" placeholder="* Subject" />
    			  <br /> 
    			  <input type="email" class="form-control" name="email" placeholder="* Your email address" /> 
    			  <br />
    			  <textarea rows="4" class="form-control" cols="20" name="message" placeholder="* Message"></textarea>
    			  <br /> 
    			  <input type="submit" class="btn btn-success"name="submit" value="Send" />
    			</fieldset>
    	</form>
    	<p>
			<!-- Tell user if message has been sent or not -->
			<?php if(!empty($message)) echo $message;  
			?>
		
	</p>

    	</div>
	</div>
	</div> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
