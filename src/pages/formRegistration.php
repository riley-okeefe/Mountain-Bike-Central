<?php
/*formRegistration.php
This form allows a client to register with Mountain Bike 
Central, which is required for the purchase of products
on the website
*/
session_start();
$_SESSION['SECURE'] = '!@#$^%FDSSFDWQR@';
$_SESSION['ORIGIN'] = $_SERVER['PHP_SELF'];
include("../common/header.html");
?>

<body class="body w3-auto">
    <header class="w3-container">
        <?php
        echo '<div class="w3-border w3-border-blue w3-light-blue">';
        include("../common/banner.php");
        include("../common/menus.html");
        echo '</div>';
        ?>
    </header>

    <?php
    $isMrs = isset($_SESSION['POST_SAVE']["salutation"]) &&
        $_SESSION['POST_SAVE']["salutation"] == "Mrs.";
    $isMs = isset($_SESSION['POST_SAVE']["salutation"]) &&
        $_SESSION['POST_SAVE']["salutation"] == "Ms.";
    $isMr = isset($_SESSION['POST_SAVE']["salutation"]) &&
        $_SESSION['POST_SAVE']["salutation"] == "Mr.";
    $isDr = isset($_SESSION['POST_SAVE']["salutation"]) &&
        $_SESSION['POST_SAVE']["salutation"] == "Dr.";
    $firstNameSaved = isset($_SESSION['POST_SAVE']["firstName"]) ?
        $_SESSION['POST_SAVE']["firstName"] : "";
    $middleInitialSaved = isset($_SESSION['POST_SAVE']["middleInitial"]) ?
        $_SESSION['POST_SAVE']["middleInitial"] : "";
    $lastNameSaved = isset($_SESSION['POST_SAVE']["lastName"]) ?
        $_SESSION['POST_SAVE']["lastName"] : "";
    $isFemale = isset($_SESSION['POST_SAVE']["gender"]) &&
        $_SESSION['POST_SAVE']["gender"] == "Female";
    $isMale = isset($_SESSION['POST_SAVE']["gender"]) &&
        $_SESSION['POST_SAVE']["gender"] == "Male";
    $isOther = isset($_SESSION['POST_SAVE']["gender"]) &&
        $_SESSION['POST_SAVE']["gender"] == "Other";
    $emailSaved = isset($_SESSION['POST_SAVE']["email"]) ?
        $_SESSION['POST_SAVE']["email"] : "";
    $phoneSaved = isset($_SESSION['POST_SAVE']["phone"]) ?
        $_SESSION['POST_SAVE']["phone"] : "";
    $streetSaved = isset($_SESSION['POST_SAVE']["street"]) ?
        $_SESSION['POST_SAVE']["street"] : "";
    $citySaved = isset($_SESSION['POST_SAVE']["city"]) ?
        $_SESSION['POST_SAVE']["city"] : "";
    $postalCodeSaved = isset($_SESSION['POST_SAVE']["postalCode"]) ?
        $_SESSION['POST_SAVE']["postalCode"] : "";
    $isAB = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "AB";
    $isBC = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "BC";
    $isMB = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "MB";
    $isNB = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "NB";
    $isNL = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "NL";
    $isNS = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "NS";
    $isON = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "ON";
    $isPE = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "PE";
    $isQC = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "QC";
    $isSK = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "SK";
    $isNT = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "NT";
    $isNU = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "NU";
    $isYT = isset($_SESSION['POST_SAVE']["region"]) &&
        $_SESSION['POST_SAVE']["region"] == "YT";
    $loginNameSaved = isset($_SESSION['POST_SAVE']["loginName"]) ?
        $_SESSION['POST_SAVE']["loginName"] : "";
    $password1Saved = isset($_SESSION['POST_SAVE']["password1"]) ?
        $_SESSION['POST_SAVE']["password1"] : "";
    $password2Saved = isset($_SESSION['POST_SAVE']["password2"]) ?
        $_SESSION['POST_SAVE']["password2"] : "";
    ?>
    <main class="w3-container">
        <article class="w3-container w3-border-left w3-border-right w3-border-blue w3-light-blue">
            <h4 class="w3-center"><strong>Registration From</strong></h4>
            <h5 class="w3-center">(sorry, but only Canadian residents for the moment)</h5>
            <p class="error w3-center">Each * denotes a required field.</p>
            <form id="registrationForm" action="scripts/formRegistrationResponse.php" method="post" autocomplete="on">
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Salutation:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <select name="salutation" style="width: 25%" required>
                            <option value="" selected disabled hidden>Choose one</option>
                            <option value="Mrs." <?php if ($isMrs)
                                echo "selected"; ?>>Mrs.</option>
                            <option value="Ms." <?php if ($isMs)
                                echo "selected"; ?>>Ms.</option>
                            <option value="Mr." <?php if ($isMr)
                                echo "selected"; ?>>Mr.</option>
                            <option value="Dr." <?php if ($isDr)
                                echo "selected"; ?>>Dr.</option>
                        </select>
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        First Name:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" name="firstName" required 
                               style="width: 80%;" 
                               value="<?php echo $firstNameSaved; ?>"
                               title="Initial capital; spaces, apostrophes,&#10;and hyphens allowed"
                               pattern="^[A-Z][A-Za-z '-]*$">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Middle Initial:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" 
                               name="middleInitial" 
                               style="width: 10%;" 
                               value="<?php echo $middleInitialSaved; ?>"
                               title="Capital letter, followed by an optional period" 
                               pattern="^[A-Z](\.)?$">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Last Name:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" 
                               name="lastName" required 
                               style="width: 80%;" 
                               value="<?php echo $lastNameSaved; ?>"
                               title="Initial capital; spaces, apostrophes,&#10;and hyphens allowed"
                               pattern="^[A-Z][A-Za-z '-]*$">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Gender:
                    </div>
                    <div class="w3-threequarter w3-container">
                    <select name="gender" required>
                            <option value="" selected disabled hidden>Choose one</option>
                            <option value="Female" <?php if ($isFemale)
                                echo "selected"; ?>>Female</option>
                            <option value="Male" <?php if ($isMale)
                                echo "selected"; ?>>Male</option>
                            <option value="Other" <?php if ($isOther)
                                echo "selected"; ?>>Other</option>
                        </select>
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        E-mail Address:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" 
                               name="email" required 
                               style="width: 80%;" 
                               value="<?php echo $emailSaved; ?>"
                               title="x@y.z, with . or - allowed in x and/or y, and z must have only 2 or 3 letters"
                               placeholder="Must be unique within our database"
                               pattern="^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Phone Number:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" 
                               name="phone"
                               style="width: 80%;" 
                               value="<?php echo $phoneSaved; ?>"
                               title="xxx-yyy-zzzz, (xxx)yyy-zzzz or just yyy-zzzz"
                               pattern="^((\d{3}-)?\d{3}-\d{4})|\(\d{3}\)\d{3}-\d{4}$">
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Street Address:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" 
                               name="street" required 
                               style="width: 80%;" 
                               value="<?php echo $streetSaved; ?>">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        City:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" 
                               name="city" required 
                               style="width: 80%;" 
                               value="<?php echo $citySaved; ?>">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Region:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <select name="region" required>
                            <option value="">Choose one</option>
                            <optgroup label="Provinces">
                                <option title="Alberta" value="AB" <?php if ($isAB) echo "selected"; ?>>
                                AB
                                </option>
                                <option title="British Columbia" value="BC" <?php if ($isBC) echo "selected"; ?>>
                                BC
                                </option>
                                <option title="Manitoba" value="MB" <?php if ($isMB) echo "selected"; ?>>
                                MB
                                </option>
                                <option title="New Brunswick" value="NB" <?php if ($isNB) echo "selected"; ?>>
                                NB
                                </option>
                                <option title="Newfoundland and Labrador" value="NL" <?php if ($isNL) echo "selected"; ?>>
                                NL
                                </option>
                                <option title="Nova Scotia" value="NS" <?php if ($isNS) echo "selected"; ?>>
                                NS
                                </option>
                                <option title="Ontario" value="ON" <?php if ($isON) echo "selected"; ?>>
                                ON
                                </option>
                                <option title="Prince Edward Island" value="PE" <?php if ($isPE) echo "selected"; ?>>
                                PE
                                </option>
                                <option title="Quebec" value="QC" <?php if ($isQC) echo "selected"; ?>>
                                QC
                                </option>
                                <option title="Saskatchewan" value="SK" <?php if ($isSK) echo "selected"; ?>>
                                SK
                                </option>
                            </optgroup>
                            <optgroup label="Territories">
                                <option title="Northwest Territories" value="NT" <?php if ($isNT) echo "selected"; ?>>
                                NT
                                </option>
                                <option title="Nunavut" value="NU" <?php if ($isNU) echo "selected"; ?>>
                                NU
                                </option>
                                <option title="Yukon Territory" value="YT" <?php if ($isYT) echo "selected"; ?>>
                                YT
                                </option>
                            </optgroup>
                        </select>
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Postal Code:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" 
                               name="postalCode" required 
                               style="width: 30%;" 
                               value="<?php echo $postalCodeSaved; ?>"
                               title="A1B2C3 or A1B 2C3"
                               pattern="^[A-Z]\d[A-Z] ?\d[A-Z]\d$">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Login Name:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="text" 
                               name="loginName" required 
                               style="width: 80%;" 
                               value="<?php echo $loginNameSaved; ?>"
                               title="Must start with a letter, contain only letters and digits, and be 6 to 15 characters in length"
                               placeholder="Choose your preferred username for login"
                               pattern="[A-Za-z][A-Za-z0-9]{5,14}">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Password:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="password" 
                               name="password1" required 
                               style="width: 80%;" 
                               value="<?php echo $password1Saved; ?>"
                               title="8 to 15 characters, including at least one
                                      uppercase letter, one lowercase letter, one digit 
                                      and one special character from the group @^_+=[]:"
                               placeholder="Choose a good, strong password"
                               pattern="^(?=.*\d)(?=.*[@^_+=[\]:])(?=.*[A-Z])(?=.*[a-z])\S{8,15}$">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        Password again:
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="password" 
                               name="password2" required 
                               style="width: 80%;" 
                               value="<?php echo $password2Saved; ?>"
                               placeholder="Re-enter same password as above">
                        <span class="w3-text-red">*</span>
                    </div>
                </div>
                <div class="w3-row w3-section">
                    <div class="w3-quarter w3-container">
                        &nbsp;
                    </div>
                    <div class="w3-threequarter w3-container">
                        <input type="submit" 
                               value="Submit Form Data">
                        <input type="reset" 
                               value="Reset Form Data" onclick="this.form.reset()">
                    </div>
                </div>
            </form>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>

</html>