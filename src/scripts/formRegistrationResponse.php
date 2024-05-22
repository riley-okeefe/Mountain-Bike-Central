<?php
//formRegistrationResponse.php
session_start();
include("../common/header.html");
?>
<body class="body w3-auto">
    <header class="w3-container">
        <?php
        echo '<div class="w3-border w3-border-blue w3-light-blue">';
        include("../common/banner.php");
        include("../common/menus.html");
        include("../scripts/connectToDatabase.php");
        ?>
    </header>
    <main class="w3-container">
        <article class="w3-container w3-border-left w3-border-right w3-border-blue w3-light-blue">
            <?php
            // saved values used to fill in registration form values if we
            // have to go back to the registration form and try again
            $SESSION['POST_SAVE'] = $_POST;
            /*
            //code segments for testing
            // first outputs saved $_POST data values
            echo "<pre>";
            echo "Saved POST values:<br>";
            print_r($_SESSION['POST_SAVE']);
            echo "</pre>";

            // second outputs the actual $_POST data values
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            */
            include("../scripts/formRegistrationProcess.php");
            ?>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>

</html>

