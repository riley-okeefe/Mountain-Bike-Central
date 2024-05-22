<?php
session_start();
$_SESSION['SECURE'] = '!@#$^%FDSSFDWQR@';
$_SESSION['ORIGIN'] = $_SERVER['PHP_SELF'];
include("common/header.html");
?>
<body class="body w3-auto" onload="carousel()">
    <header class="w3-container">
        <?php
        echo '<div class="w3-border w3-border-blue w3-light-blue">';
        include("common/banner.php");
        include("common/menus.html");
        echo '</div>';
        ?>
    </header>
    <main class="w3-container">
        <div class="w3-container w3-border-left w3-border-right w3-border-blue w3-light-blue" style="padding-right:0">
            <article class="w3-half">
                <h3>
                    You've come to Mountain Bike Central
                </h3>
                <p>
                    Founded in 2024, Mountain Bike Central was created to provide the best
                    selection of mountain bikes and mountain bike accessories. Browse our
                    website today to find the mountain bike you've always wanted or the mountain
                    bike part/accessory you haven't been able to find anywhere else.
                </p>
                <p>
                    If you have an interest in mountain bikes, mountain bike accessories or would
                    like to join us on one of our community bike rides you've come to the right place.
                </p>
            </article>
            <?php
            include("resources/images_and_labels.html");
            ?>
        </div>
    </main>
    <?php
    include("common/footer.html");
    ?>
</body>
</html>
