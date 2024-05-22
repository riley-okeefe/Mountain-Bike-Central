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
            <h3>About Mountain Bike Central: Our Vision and Mission</h3>
            <p>
                Mountain Bike Central is a new business and this is how we got started. After reaching out to
                the mountain biking community we got an idea of what was needed for a successful mountain bike
                business and what the community wanted. This feedback reassured us that mountain bikers want 
                access to the best mountain bikes and mountain bike accessories available. So with this knowledge
                we opened Mountain Bike Central.
            </p>
            <p>
                Although our mission is to provide riders with the best choices for mountain bikes and accessories,
                we also wanted to create a sense of community with our customers. So if you have any feedback on how
                we can improve or a product you would like to see available for purchase please send us a message with
                our <a href="pages/formFeedback.php">Feedback Form</a>.
            </p>
        </article>
    </main>
    <?php
    include("../common/footer.html");
    ?>
</body>
</html>