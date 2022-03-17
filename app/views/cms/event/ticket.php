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
                <th>Edit</th>
            </tr>
                <? foreach ($tickets as $ticket) { ?>
                    <tr>
                        <td></td>
                        <td><? echo $ticket['Name'] ?></th>
                        <td>€ <? echo $ticket['Ticket_Price'] ?></td>
                        <td><? echo $ticket['Tickets'] ?></td>
                        <td><a href="/cms/eventItem/ticketDetail?id=<? echo $ticket['EventItem_ID'] ?>">Edit</a></td>
                    </tr>
                <? } ?>
        </table>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->