<?php


/* Check all form inputs using check_input function */
$email    = check_input($_POST['email'], "your email adddress is missing. Please hit your browser back button and try again");
$from = check_input($_POST['from'], "Please hit your browser back button and enter your name");
$telephone = check_input($_POST['telephone']);
$subject  = check_input($_POST['subject'], "Please hit your browser back button and enter a subject");
$comments = check_input($_POST['comments'], "Please hit your browser back button and write your message");



$emailaddress = array();
		$emailaddress[1] = "commodore@sgba.org.uk";
		$emailaddress[2] = "vice-commodore@sgba.org.uk";
		
		$emailaddress[3] = "treasurer@sgba.org.uk";
		$emailaddress[4] = "gaye.astley@btinternet.com";
		$emailaddress[5] = "rogerjastley@btinternet.com";
		$emailaddress[6] = "sailing@annedavis.me.uk";
		$emailaddress[7] = "r.lovejoy@open.ac.uk";
		$emailaddress[8] = "brian.deacon@btinternet.com";
		$emailaddress[9] = "chrismoore141266@gmail.com";
		
								
		$emailaddress[10] = "nick.ager@gmail.com";
		$emailaddress[11] = "sara.chisholm-batten@michelmores.com";
		$emailaddress[12] = "steve@goodchild.biz";
		$emailaddress[13] = "sgbamorrell@gmail.com";
		$emailaddress[14] = "knotaproblem@hotmail.co.uk";
		$emailaddress[15] = "roger.stobbart@btinternet.com";


		$contactnameindex = $_REQUEST['emailaddress'];
	if ($contactnameindex == 0 || !isset($_REQUEST['emailaddress'])) die ("You did not choose a recipient. Please hit your browser back button and try again.");
	else $emailaddress = $emailaddress[$contactnameindex];

$CaptchaResult = check_input($_POST["captchaResult"], "Please write a total for the sum");

		$captchaResult = $_POST["captchaResult"];
		$firstNumber = $_POST["firstNumber"];
		$secondNumber = $_POST["secondNumber"];

		$checkTotal = $firstNumber + $secondNumber;

		if ($captchaResult != $checkTotal) 
		exit("The sum is incorrect");
		

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
exit("E-mail is not valid");
}

/* If e-mail is not valid show error message 
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))

{
    show_error("E-mail address not valid");
}
*/


/* Let's prepare the message for the e-mail */
$message = "Hello!

The following person has sent you a message from the SGBA website:

Name: $from
E-mail: $email
Telephone: $telephone
Subject: $subject
Message: $comments
End of message
";

/* Send the message using mail() function */
mail($emailaddress,"$subject",$message,"From: $email" ); include "email_sent.php";

/* Redirect visitor to the thank you page */
header('Location: thankyou-contact.htm');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>