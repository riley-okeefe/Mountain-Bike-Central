<?php
/*logoutProcess.php
Handle cleanup by deleting any "orphan" orders, which
are orders in progress that have no associated order_items
*/

//see if there is an order in progress
$query = "SELECT 
                my_Order.order_id,
                my_Order.customer_id,
                my_Order.order_status,
                my_OrderItem.*
              FROM
                my_OrderItem, my_Order
              WHERE
                my_Order.order_id = my_OrderItem.order_id AND
                my_Order.order_status = 'IP' AND
                my_Order.customer_id = $customerID";
$numRecords = mysqli_num_rows(mysqli_query($db, $query));

//if $numRecords is 0 there are no orders in progress 
//(order with corresponding order items that have not 
//yet been purchased).
//There may be any number of orders that were created 
//by a logged in user choosing "Add to cart" but not 
//actually adding any items in the order (possibly many
//times) and when the customer eventually makes a purchase
//we would like to find and delete any such orphan orders
//in our "clean up" process during logout.
if ($numRecords == 0)
{
    $query = "SELECT order_id,
                     customer_id,
                     order_status
              FROM my_Order
              WHERE order_status = 'IP' AND customer_id = $customerID";
    $orphanedOrders = mysqli_query($db, $query);
    if ($orphanedOrders != NULL)
    {
        $numRecords = mysqli_num_rows($orphanedOrders);
        if ($numRecords != 0)
        {
            for ($i=1; $i<=$numRecords; $i++)
            {
                $orphanedOrdersArray = mysqli_fetch_array($orphanedOrders, MYSQLI_ASSOC);
                $orphanedOrderID = $orphanedOrdersArray['order_id'];
                $query = "DELETE FROM my_Order
                          WHERE order_id = '$orphanedOrderID' AND
                                order_status = 'IP'           AND
                                customer_id = $customerID";
                $success = mysqli_query($db, $query);
                if (!$success)
                {
                    echo "Error: DELETE failure of orphaned orders in logoutProcess.";
                    exit(0);
                }
            }
        }
    }
    mysqli_close($db);
}