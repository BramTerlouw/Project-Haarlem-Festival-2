<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/nav-cms.php';
?>

<div class="cms-graph-container">

    <!-- Container containing 2 donut graphs -->
    <div class="cms-container-small border-right">
        <h2>Ticket availability</h2>
        <div class="cms-graph-small">
            <canvas id="graph-tickets1"></canvas>
        </div>
        <div class="cms-graph-small">
            <canvas id="graph-tickets2"></canvas>
        </div>
    </div>

    <!-- Container containing sales graph and input fields -->
    <div class="cms-graph">
        <h2>Ticket sales</h2>

        <select name="sales-event" id="sales-event">
            <option value="" disabled selected>Choose event</option>
            <option value="Dance">Dance</option>
            <option value="Jazz">Jazz</option>
        </select>

        <select name="sales-week" id="sales-week">
            <option value="" disabled selected>Choose day</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
            <option value="Saturday">Saturday</option>
            <option value="Sunday">Sunday</option>
        </select>

        <canvas id="graph-sales"></canvas>
    </div>

    <!-- Container containing occupation graph -->
    <div class="cms-graph border-right">
        <h2>Restaurant occupation</h2>
        <h3>Date: dd-mm-yyyy</h3>
        <canvas id="graph-occupation"></canvas>
    </div>

    <!-- Container contaning system notifications -->
    <div class="cms-graph">
        <h2>Notifications</h2>
    </div>
</div>

<script>
    // Values ticket availability
    var xTickets = ["Available", "Sold"];
    var yTickets = [80, 20];
    var colorTickets = ["#148582", "grey"];

    // chart ticket availability
    var ticketChart1 = new Chart("graph-tickets1", {
        type: "doughnut",
        data: {
            labels: xTickets,
            datasets: [{
                backgroundColor: colorTickets,
                data: yTickets
            }]
        },
        options: {}
    });
    var ticketChart2 = new Chart("graph-tickets2", {
        type: "doughnut",
        data: {
            labels: xTickets,
            datasets: [{
                backgroundColor: colorTickets,
                data: yTickets
            }]
        },
        options: {}
    });

    // Values sales
    var xSales = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    var ySales = [130, 200, 140, 80, 133, 180, 20, 0];
    var colorGreen = "#148582";

    // chart ticket sales
    var salesChart = new Chart("graph-sales", {
        type: "bar",
        data: {
            labels: xSales,
            datasets: [{
                backgroundColor: colorGreen,
                data: ySales
            }]
        },
        options: {
            legend: {
                display: false
            },
        }
    });

    // Values chart restaurant occupation
    var xOccupation = ["Restaurant Mr. & Mrs", "Ratatouille", "Restaurant ML", "Restaurant Fris", "Spektakel", "Grand cafe Brinkman"];
    var yOccupation = [80, 50, 100, 30, 65, 15, 0];

    // chart restaurant occupation
    var myChart = new Chart("graph-occupation", {
        type: "bar",
        data: {
            labels: xOccupation,
            datasets: [{
                backgroundColor: colorGreen,
                data: yOccupation
            }]
        },
        options: {
            legend: {
                display: false
            },
        }
    });
</script>
</main> <!-- close main tag from cms nav -->
</div> <!-- close div of whole container from cms nav -->