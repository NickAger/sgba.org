<?php
/* Set e-mail recipient */
$myemail  = "commodore@sgba.org.uk";
$subject = "SGBA Safety Boat Log Sheet";

//* Check all form inputs using check_input function */
$from = check_input($_POST['from'], "Please enter your name");
$boat = check_input($_POST['boat'], "Please enter the boat you used");
$date = check_input($_POST['date'], "Please enter the date you used the boat");
$time = check_input($_POST['time'], "Please enter Time on Water/approx engine hours");
$fuel = check_input($_POST['fuel'], "Please enter Fuel on Return");

$comments = check_input($_POST['comments']);


/* Let's prepare the message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $from
Boat: $boat
Date: $date
Time on water: $time
Fuel on Return: $fuel
Message: $comments
End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thankyou-boat log.htm');
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