<?php

include 'orders_list_setup.php';

$ordersListTable = new Orders_List_Table();
$ordersListTable->prepare_items();
?>
    <div class="wrap">
        <h2>فهرست سفارشات </h2>
        <?php $ordersListTable->display(); ?>
    </div>
<?php
