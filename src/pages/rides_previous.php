<?php
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
    <main class="w3-container">
        <article class="w3-container w3-border-left w3-border-right w3-border-blue w3-light-blue">
            <h3>Previous Rides</h3>
            <p>
                Although we have only recently started our buisness we have had the privledge of hosting a few bike rides.
                Find our previous community bike rides below:
            </p>
            <dl>
                <dt>Monday, January 1st, 2024</dt>
                <dd>We hosted our very first community bike ride, to start the year off right.</dd>
                <dt>Saturday, January 13th, 2024</dt>
                <dd>We hosted our very first beginners bike ride.</dd>
                <dt>Sunday, January 14th, 2024</dt>
                <dd>We hosted our very first experienced bike ride.</dd>
            </dl>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>
</html>