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
        <div class="w3-container w3-border-left w3-border-right w3-border-blue w3-light-blue">
            <div class="w3-half w3-border w3-border-blue">
                <ul class="w3-ul">
                    <li>
                        <h4 class="w3-wide"><a href="my_business.php">Home</a></h4>
                    </li>
                </ul>
                <ul class="w3-ul w3-border-top w3-border-blue">
                    <li>
                        <h4 class="w3-wide">e-store</h4>
                    </li>
                    <li><a href="pages/estore.php">e-store Options</a></li>
                    <li><a href="pages/catalog.php">Product Catalog</a></li>
                    <li><a href="pages/formRegistration.php">Register</a></li>
                    <li><a href="pages/formLogin.php">Login</a></li>
                    <li><a href="pages/shoppingCart.php">View Shopping Cart</a></li>
                    <li><a href="pages/checkout.php">Checkout</a></li>
                    <li><a href="pages/logout.php">Logout</a></li>
                </ul>    
            </div>
            <div class="w3-half w3-border w3-border-blue">
                <ul class="w3-ul">
                    <li>
                        <h4 class="w3-wide">Bike Rides</h4>
                    </li>
                    <li><a href="pages/rides_recurring.php">Recurring Rides</a></li>
                    <li><a href="pages/rides_special.php">Special Rides</a></li>
                    <li><a href="pages/rides_previous.php">Previous Rides</a></li>
                </ul>
                <ul class="w3-ul w3-border-top w3-border-blue">
                    <li>
                        <h4 class="w3-wide">About us</h4>
                    </li>
                    <li><a href="pages/vision.php">Vision and Mission</a></li>
                    <li><a href="pages/locations.php">Locations</a></li>
                    <li><a href="pages/formFeedback.php">Feedback Form</a></li>
                </ul>
                <ul class="w3-ul w3-border-top w3-border-blue">
                    <li>
                        <h4 class="w3-wide"><a href="pages/sitemap.php">Site Map</a></h4>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>
</html>