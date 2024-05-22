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
            <h3>Recurring Rides</h3>
            <p>
                Here are some community bike rides that we organize on a
                recurring (weekly/monthly) basis:
            </p>
            <ul>
                <li>
                    Start of the month bike ride (typically on the first calendar day of each month).
                </li>
                <li>
                    End of the month bike ride (typically on the last calendar day of each month).
                </li>
                <li>
                    Beginners bike ride (typically once every week).
                </li>
                <li>
                    Experienced bike ride (typically once every week).
                </li>
            </ul>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>
</html>