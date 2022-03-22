<?php
require __DIR__ . '/../../components/head.php';
require __DIR__ . '/../../components/navigation/nav-cms.php';
?>

<h1> Ticket details:</h1>
<div class="ticket-detail-container">
    <form class="ticket-detail-form" action="/cms/eventItem/updateTickets" method="post">
        <!-- hidden values -->
        <input type="hidden" name="eventItemID" value="<? echo $tickets[0]['EventItem_ID'] ?>">
        <input type="hidden" name="ticketSold" value="<? if (isset($tickets[0]['Sold'])) echo $tickets[0]['Sold']; else echo 0 ?>">

        <!-- form items -->
        <div class="form-item">
            <label for="ticketPrice">Ticket price:</label>
            <input type="number" name="ticketPrice" value="<? echo $tickets[0]['Ticket_Price'] ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="ticketAmount">Amount of tickets available:</label>
            <input type="number" min="1" name="ticketAmount" value="<? echo $tickets[0]['Tickets'] ?>">
            <img src="/icons/cms-edit-form.png" alt="edit button">
        </div>
        <div class="form-item">
            <label for="ticketSold">Total sold:</label>
            <input type="number" name="ticketSold" value="<? if (isset($tickets[0]['Sold'])) echo $tickets[0]['Sold']; else echo 0 ?>" disabled>
        </div>

        <button class="cms-saveOverview-xl" name="submit" type="submit">Save changes
                <img src="/icons/cms-save.png" alt="cancel icon">
        </button>
    </form>
</div>

</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->