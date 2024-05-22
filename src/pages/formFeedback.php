<?php
/*formFeedback.php
This form allows a client to express their opinion
about the website, the buisness, or to ask a question*/
session_start();
$_SESSION['SECURE'] = '!@#%^%FDSSFDWQR@';
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
    <main class="w3-container">
        <div class="w3-container w3-border-left w3-border-right w3-border-blue w3-light-blue">
            <article>
                <h3 class="w3-center">Feedback Form ... Tell us What You Think,
                    or Ask Us a Question</h3>
                <p class="error w3-center">Each * dentotes a required field.</p>
                <form id="contactForm" action="scripts/formFeedbackProcess.php" method="post">
                    <div class="w3-row">
                        <div class="w3-third w3-container w3-wide">
                            <h4>Salutation:<span class="w3-text-red">*</span></h4>
                        </div>
                        <div class="w3-twothird w3-container">
                            <p>
                                <select name="salutation" required>
                                    <option value="" selected disabled hidden>
                                        Choose one
                                    </option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Dr.">Dr.</option>
                                </select>
                            </p>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-third w3-container w3-wide">
                            <h4>First Name:<span class="w3-text-red">*</span></h4>
                        </div>
                        <div class="w3-twothird w3-container">
                            <p>
                                <?php
                                $firstNameTitle = "Initial capital, spaces, hypens&#010;" .
                                    "and apostrophes allowed.";
                                ?>
                                <input type="text" name="firstName" required title="<?php echo $firstNameTitle; ?>"
                                    style="width:100%;" pattern="^[A-Z][A-Za-z '-]*$">
                            </p>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-third w3-container w3-wide">
                            <h4>Last Name:<span class="w3-text-red">*</span></h4>
                        </div>
                        <div class="w3-twothird w3-container">
                            <p>
                                <?php
                                $lastNameTitle = "Initial capital, spaces, hypens&#010;" .
                                    "and apostrophes allowed.";
                                ?>
                                <input type="text" name="lastName" required title="<?php echo $lastNameTitle; ?>"
                                    style="width:100%;" pattern="^[A-Z][A-Za-z '-]*$">
                            </p>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-third w3-container w3-wide">
                            <h4>E-mail Address:<span class="w3-text-red">*</span></h4>
                        </div>
                        <div class="w3-twothird w3-container">
                            <p>
                                <?php
                                $email = "x@y.z x and y alphnumeric, . or -, z 2 or 3 letters";
                                ?>
                                <input type="text" name="email" required title="<?php echo $email; ?>"
                                    style="width:100%" pattern="^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$">
                            </p>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-third w3-container w3-wide">
                            <h4>Phone Number:<span class="w3-text-red"></span></h4>
                        </div>
                        <div class="w3-twothird w3-container">
                            <p>
                                <?php
                                $phone = "xxx-yyy-zzzz, area code xxx- optional";
                                ?>
                                <input type="text" name="phone" title="<?php echo $phone; ?>"
                                    style="width:100%" pattern="^(\d{3}-)?\d{3}-\d{4}$">
                            </p>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-third w3-container w3-wide">
                            <h4>Subject:<span class="w3-text-red">*</span></h4>
                        </div>
                        <div class="w3-twothird w3-container">
                            <p>
                                <input type="text" name="subject" required
                                       style="width: 100%">
                            </p>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-third w3-container w3-wide">
                            <h4>Comments:<span class="w3-text-red">*</span></h4>
                        </div>
                        <div class="w3-twothird w3-container">
                            <p>
                                <textarea name="message" rows="6" required style="width: 100%;"></textarea>
                            </p>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-third w3-container">
                            <p>&nbsp;</p>
                        </div>
                        <div class="w3-twothird w3-container">
                            <h6>
                                Please check if you would like us to get
                                back to you: <input type="checkbox" name="reply">
                            </h6>
                        </div>
                    </div>
                    <div class="w3-third w3-container">
                        <p>&nbsp;</p>
                    </div>
                    <div class="w3-twothird w3-container">
                        <p>
                            <input type="submit" value="Send Feedback">
                            <input type="reset" value="Reset Form">
                        </p>
                    </div>
                </form>
            </article>
        </div>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>

</html>