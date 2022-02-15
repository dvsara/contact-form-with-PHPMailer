# Bootstrap contact form with PHPMailer
 ### PHPMailer

 The PHPMailer class is a very used class by PHP developers because it allows you to comfortably send e-mail messages both as simple text and in HTML format, without forgetting the possibility of sending files attached to our emails. It's not the most popular, but it is easy to use and it's more useful sometimes than the php mail() class.

 PHPmailer is an open source script, it can be freely downloaded from the official site (https://github.com/PHPMailer/PHPMailer), used for free and modified according to different needs as long as the copyright references of the authors are not deleted from the source. Or it can be installed using composer (the instructions are in the official site also).

 ### Instructions
Inside the index.php file replace 

<code>
 $mail->Username   = "examplereceiver@gmail.com"; // Your full Gmail address
 </code>
 <br>
 <code>
$mail->Password   = "examplepassword"; // Your Gmail password
 </code>
<br>
with your email and the password of your email. With this script you are connecting to a gmail account,  but you can use another email provider, you just need to change these lines

<code>$mail->Host = "smtp.gmail.com";  //Gmail SMTP server address</code>
<code>$mail->Port = 465;  //Gmail SMTP port </code>

into whatever you need. 
If you have a google account go to settings and activate Access to less secure apps, otherwise you won't be able to send emails from a local server, and the script inside the index.php file will give you an error.  

Then go this line:

<code>
$mail->AddAddress("examplereceiver@gmail.com", "recipient name"); // Where to send it - Recipient
 </code>
<br>
and insert your email address. You can omit the name of the recipient if you want.

Open index.php on a live server. And the contact form should work.

### Contribute
If you want to contribute you could add input validations and data sanitations. Or you can find an issue that you want to work on in order to contribute to our community and click the issue tab on the project homepage.
