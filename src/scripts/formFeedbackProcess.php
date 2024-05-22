<?php
/*formFeedbackProcess.php
Processes the submitted feedback form data by first contacting a response
message from the users input. First the form data is sanitized by doing 
server-side redundant validation of the data recieved. Then the following
actions are performed:
    -send an email message to the business based on clients form data
    -send a modified confirmation email to the client from the business
    -return a confirmation page to the clients brwoser
    -log the feedback information from the form in a file on the server
*/
session_start();
$secure = $_SESSION['SECURE'];
if ($secure != "!@#%^%FDSSFDWQR@")
{
    die('ORIGIN test failed.');
}

$salutation = $firstName = $lastName = "";
$email = $phoneNumber = "";
$subject = $message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $salutation = sanitized_input($_POST["salutation"]);
    $firstName = sanitized_input($_POST["firstName"]);
    if (!preg_match("/^[A-Z][A-Za-z '-]*$/", $firstName))
        die("Bad first name!");
    $lastName = sanitized_input($_POST["lastName"]);
    if (!preg_match("/^[A-Z][A-Za-z '-]*$/", $lastName))
        die("Bad last name!");
    $email = sanitized_input($_POST["email"]);
    if (!preg_match("/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$/", $email))
        die("Bad email!");
    $phoneNumber = sanitized_input($_POST["phone"]);
    $phoneNumber = !empty($_POST['phone']) ? $_POST['phone'] : "Not given";
    if(!empty($_POST['phone']) && !preg_match("/^(\d{3}-)?\d{3}-\d{4}$/", $phoneNumber))
        die("Bad phone number!");
    $subject = sanitized_input($_POST["subject"]);
    $message = sanitized_input($_POST["message"]); 
}

function sanitized_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Step 1
//construct the message to be sent to the business
$messageToBusiness = 
     "From: $salutation $firstName $lastName\r\n". 
     "E-mail address: $email\r\n".
     "Phone number: $phoneNumber\r\n". 
     "------------------------\r\n". 
     "Subject: $subject\r\n". 
     "------------------------\r\n". 
     "$message\r\n". 
     "========================\r\n";

//now send an email to the business containing the feedback
$headerToBuisness = "From: $email\r\n";
mail("u50@mail.cs.smu.ca", $subject,
     $messageToBusiness, $headerToBuisness);

//Step 2
//construct email confirmation message for the client
$messageToClient = 
    "Dear $salutation $lastName:\r\n". 
    "The following message was received from you by Mountain Bike Central:\r\n". 
    "========================\r\n". 
    $messageToBusiness.
    "Thank you for your interest and your feedback.\r\n". 
    "From the Mountain Bike Central team\r\n". 
    "=========================\r\n";

if (isset($_POST['reply'])) $messageToClient .=
    "P.S We will contact you shortly with more information.";

$headerToClient = "From: u50@mail.cs.smu.ca\r\n"; 
mail($email, "Re: $subject",
     $messageToClient, $headerToClient);

//Step 3
//transform the confirmation to the client message to the client to HTML5 format
$display = str_replace("\r\n", "\r\n<br>", $messageToClient);
$display = "<!DOCTYPE html>
    <html lang='en'>
    <head><meta charset='utf-8'><title>Your Message</title></head>
    <body><code>$display</code></body>
    </html>";
echo $display;

//Step 4
//log the feedback information in data/feedback.txt on the web server
$filevar = fopen("../data/feedback.txt", "a")
    or die("Error: Could not open the log file.");
fwrite($filevar,
   "\n----------------------------------------------------------------\n")
   or die("Error: Could not write divider to log file.");
fwrite($filevar, "Date recieved: ".date("jS \of F, Y \a\\t H:i:s\n"))
   or die("Error: Could not write date to the log file.");
fwrite($filevar, $messageToBusiness)
   or die("Error: Could not write message to the log file.");
?> 