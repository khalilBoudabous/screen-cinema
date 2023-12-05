<?php
include '..\Controller\ticketsC.php';
$ticketsC = new TicketsC();
$tab = $ticketsC->listtickets();
?>

<center><h1>Liste des tickets</h1></center>
<center><a href="addtickets.php"> Ajouter un ticket</a></center>
<center><input type="text" id="Tickets-ID-filter" placeholder="Filter by ID" oninput="filterByUsername()"></center>
<table id='tickets' border="1" align="center" width="70%">
<tr>
<th>Ticket ID</th>
<th>Price</th>
<th>Film ID</th>
<th>Delete</th>
</tr>
<tr>

<?php foreach ($tab as $tickets) {
?>
<td> <?php echo $tickets['id_t'];?>
</td><td> <?= $tickets['prix'];?>
</td><td> <?= $tickets['id_film'];?>
</td>
<td><a href="deletetickets.php?id_t=<?php echo $tickets['id_t']?>">Delete</a></td>

</tr>
<?php
}?></table>
<script>
    function filterByUsername() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filter");
    filter = input.value.toUpperCase();
    table = document.getElementById("tickets");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; 
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
