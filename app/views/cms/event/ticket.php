<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1><?php echo ucfirst($_GET['event']) ?> tickets:</h1>
<table class="table-tickets">
            <tr>
                <th></th>
                <th>Program item</th>
                <th>Ticket Price</th>
                <th>Total</th>
                <th>Sold</th>
                <th>Edit</th>
            </tr>
        </table>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->