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
            <h3>Special Rides</h3>
            <p>
                Here is a list of our upcoming special bike rides for this year:
            </p>
            <dl>
                <dt>Saturday, February 3rd, 2024</dt>
                <dd>A beginners ride where we will go over basic skills all new riders should have.</dd>
                <dt>Saturday, March 9th, 2024</dt>
                <dd>A experienced ride with a group lunch afterwards</dd>
            </dl>
            <p>
                All rides will begin at our location at 8:00 AM of the designated day. If an alternate time
                is decided, we will notify via this page at least 24 hours beforehand.
            </p>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>
</html>