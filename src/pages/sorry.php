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
        <article class="w3-container w3-border-left w3-border-right w3-border-blue w3-light-blue" style="text-align: center">
            <h1>Sorry!</h1>
            <h2>This page has not yet been activated,<br>or has been temporarily deactivated</h2>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>
</html>