<?php

session_start();
if (!preg_match('/shoppingCart.php/', $_SERVER['HTTP_REFERER']))
{
    header("Location: ../pages/shoppingCart.php?productID=view");
    exit;
}
$customerID = $_SESSION['customer_id'];
include("../common/header.html");
?>

  <body class="body w3-auto">
    <header class="w3-container">
        <?php
        echo '<div class="w3-border w3-border-blue w3-light-blue">';
        include ("../common/banner.php");
        include ("../common/menus.html");
        include ("../scripts/connectToDatabase.php");
        echo '</div>';
        ?>
    </header>
    <main class="w3-container">
        <article class="w3-container w3-border-left w3-border-right w3-border-blue w3-light-blue">
            <?php
            include ("../scripts/checkoutProcess.php");
            ?>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
  </body>
</html>