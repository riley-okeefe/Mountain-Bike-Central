<?php
//categoryProcess.php

$categoryCode = $_GET['categoryCode'];
$query = "SELECT *
          FROM my_Product
          WHERE catCode = '$categoryCode'
          ORDER BY product_name ASC";
$category = mysqli_query($db, $query);
$numRecords = mysqli_num_rows($category);
echo "<div style='overflow-x:auto;'>
        <table class='w3-table w3-border w3-bordered'>
          <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Price</th>
            <th># in stock</th>
            <th>Purchase?</th>
          </tr>";
for ($i=1; $i<=$numRecords; $i++)
{
    $row = mysqli_fetch_array($category, MYSQLI_ASSOC);
    $productImageFile = $row['image_file'];
    $productName = $row['product_name'];
    $productPrice = $row['price'];
    $productPriceAsString = sprintf("$%.2f", $productPrice);
    $productQuantity = $row['quantity'];
    $productID = $row['product_id'];
    echo 
    "<tr>
      <td class='w3-center'>
        <img width='70'
             src='images/products/$productImageFile'
             alt='Product Image'>
      </td><td>
        $productName
      </td><td class='w3-right-align'>
        $productPriceAsString
      </td><td class='w3-center'>
        $productQuantity
      </td><td>
          <a class='w3-button w3-blue w3-round w3-small'
           href='pages/shoppingCart.php?productID=$productID'>
           Buy this item
          </a>
        </td></tr>";
}
echo "</table></div>";
mysqli_close($db);
?>