<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1>Orders:</h1>
<div class="orders-table-container">
<table class="orders-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>PhoneNumber</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
       <tr>
       <?php
        foreach($orderList as $order){?>
           <td><?php echo $order->Order_ID ?></td>
           <td><?php echo $order->FullName ?></td>
           <td><?php echo $order->PhoneNumber ?></td>
           <td><?php echo $order->Email ?></td>
           <td><a href="/cms/order/view?order_id=<? echo $order->Order_ID ?>">View</a></td>
       </tr>
       <?php
        }?> 
    </tbody>
</table>
</div>
</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->