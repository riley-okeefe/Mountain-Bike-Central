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
            <h3>Our Locations</h3>
            <p>
                As our company grows, we hope to expand outside Atlantic Canada, so eventually we will provide
                on this page a list of all of our locations. Each location will be accompanied by contact information
                for that location and a link to a map showing you how to find us at that location.
            </p>
            <p>
                In the meantime, here are a few details (just address and telephone number) for our current (and only)
                location, if you would like to stop by:
            </p>
            <p>
                Mountain Bike Central, Inc.<br>
                Address Placeholder<br>
                Halifax, NS<br>
                Canada postal code placeholder<br>
                Tel: 902.1234.5678
            </p>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>
</html>