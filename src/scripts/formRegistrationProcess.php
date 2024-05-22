<?php
//formRegistrationProcess.php
$secure = $_SESSION['SECURE'];
if ($secure != "!@#$^%FDSSFDWQR@")
{
    die('SECURE test failed.');
}
$origin = $_SESSION['ORIGIN'];
if ($origin != "/~u38/submissions/submission06/pages/formRegistration.php")
{
    die('ORIGIN test failed!');
}

$salutation = $firstName = $middleInitial = $lastName = "";
$gender = $email = $phone = $street = "";
$city = $region = $postalCode = "";
$loginName = $password1 = $password2 = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $salutation = sanitized_input($_POST["salutation"]);
    $firstName = sanitized_input($_POST["firstName"]);
    if (!preg_match("/^[A-Z][A-Za-z '-]*$/", $firstName))
        die("Bad first name!");
    $middleInitial = sanitized_input($_POST["middleInitial"]);
    if (!empty($_POST['middleInitial']) &&
        !preg_match("/^[A-Z][A-Za-z '-]*$/", $middleInitial))
        die("Bad middle initial!");
    $lastName = sanitized_input($_POST["lastName"]);
    if (!preg_match("/^[A-Z][A-Za-z '-]*$/", $lastName))
        die("Bad last name!");
    $gender = sanitized_input($_POST["gender"]);
    $email = sanitized_input($_POST["email"]);
    if (!preg_match("/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$/", $email))
        die("Bad email!");
    $phone = sanitized_input($_POST["phone"]);
    if (!empty($_POST['phone']) &&
        !preg_match("/^((\d{3}-)?\d{3}-\d{4})|\(\d{3}\)\d{3}-\d{4}$/", $phone))
        die("Bad phone number!");
    $street = sanitized_input($_POST["street"]);
    if (empty($_POST['street']))
        die("Missing street address!");
    $city = sanitized_input($_POST["city"]);
    if (empty($_POST['city']))
        die("Missing city!");
    $region = sanitized_input($_POST["region"]);
    if (!preg_match("/^[A-Z]{2}$/", $region))
        die("Bad region!");
    $postalCode = sanitized_input($_POST['postalCode']);
    if (!empty($_POST['postalCode']) &&
        !preg_match("/^[A-Z]\d[A-Z] ?\d[A-Z]\d$/", $postalCode))
        die("Bad postal code!");
    $loginName = sanitized_input($_POST["loginName"]);
    if (!preg_match("/[A-Za-z][A-Za-z0-9]{5,14}/", $loginName))
        die("Bad login name!");
    $password1 = sanitized_input($_POST["password1"]);
    if (!preg_match("/^(?=.*\d)(?=.*[@^_+=[\]:])(?=.*[A-Z])(?=.*[a-z])\S{8,15}$/", $password1))
        die("Bad first password!");
    $password2 = sanitized_input($_POST["password2"]);
    if (!preg_match("/^(?=.*\d)(?=.*[@^_+=[\]:])(?=.*[A-Z])(?=.*[a-z])\S{8,15}$/", $password2))
        die("Bad second password!");
}

function sanitized_input($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (emailAlreadyExists($db, $_POST['email']))
{
    echo "<h3>Sorry, but your e-mail address is already registered in our database.
          To register, you must use a different e-mail address.</h3>";
}
else if ($_POST['password1'] != $_POST['password2'])
{
    echo "<h3>Sorry, but the passwords you entered do no match.
          Your attempt to register has failed. Please try again.</h3>";
}
else 
{
    $loginDateTime = date('Y-m-d h:i:s');
    $loginPassword = md5($_POST['password1']);
    $uniqueLoginName = getUniqueLoginName($db, $_POST['loginName']);
    if ($uniqueLoginName != $_POST['loginName'])
    {
        echo "<h3>Your preffered login name already exists. So we have assigned 
              \"$uniqueLoginName\" as your login name.</h3>";
    }
    $firstName = str_replace("'", "\'", $firstName);
    $lastName = str_replace("'", "\'", $lastName);
    $query = "INSERT INTO my_Customer
    (
        salutation, first_name, middle_initial, last_name, gender,
        email, phone, street, city, region, postal_code,
        date_time, login_name, login_password
    )
    VALUES
    (
        '$salutation', '$firstName', '$middleInitial', '$lastName',
        '$gender', '$email', '$phone',
        '$street', '$city', '$region', '$postalCode',
        '$loginDateTime', '$uniqueLoginName', '$loginPassword'
    );";
    if (mysqli_query($db, $query))
    {
        echo "<h3>Thank you for registering with Mountain Bike Central.<br>
              Your login username for our website is
              \"$uniqueLoginName\".<br>
              Remember to record the password you supplied
              in a safe place.<br>
              To log in and start shopping in our e-store please
              <a href='pages/formLogin.php'>Click here</a>.<br>";
    }
    else
    {
        echo "<h3>Unable to register: </h3>".mysqli_error($db).
             " Error #".mysqli_errno($db);
    }
}
mysqli_close($db);
// Main script ends here

/* emailAlreadyExists($db, $email)
 $db - the associated database
 $email - the associated email
 Determine if the supplied email address during registration
 is already in the database.
*/ 
function emailAlreadyExists($db, $email)
{
    $query = "SELECT * FROM my_Customer WHERE email = '$email'";
    $customers = mysqli_query($db, $query);
    if ($customers) 
        $numRecords = mysqli_num_rows($customers);
    else 
        $numRecords = 0;

    return ($numRecords > 0) ? true : false;
}

/* getUniqueLoginName($db, $email)
 $db - the associated database
 $email - the associated email
 Assigns a unique login name to user upon registration. If the login
 name requested by the customer already exists, the customer will be
 assigned the login name with appended with the lowest possible positive
 integer value that makes the result unique in the database.
*/ 
function getUniqueLoginName($db, $loginName)
{
    $uniqueLoginName = $loginName;
    $query = "SELECT * FROM my_Customer WHERE login_name = '$uniqueLoginName'";
    $customers = mysqli_query($db, $query);
    if ($customers)
        $numRecords = mysqli_num_rows($customers);
    else 
        $numRecords = 0;
    if ($numRecords != 0)
    {
        // try appending positive integers until a unique username is achieved
        $i = 0;
        do
        {
            $i++;
            $uniqueLoginName = $loginName.$i;
            $query = "SELECT * FROM my_Customer WHERE login_name = '$uniqueLoginName'";
            $customers = mysqli_query($db, $query);
            if ($customers)
                $numRecords = mysqli_num_rows($customers);
            else 
                $numRecords = 0;
        }
        while ($numRecords != 0);
    }
    return $uniqueLoginName;
}
?>