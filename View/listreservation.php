<?php
include '..\Controller\reservationC.php';
$reservationC = new ReservationC();
$tab = $reservationC->listreservation();
?>

<center><h1>Liste des Reservations</h1></center>
<center><a href="addreservation.php"> Ajouter une reservation</a></center>
<center><input type="text" id="filter" placeholder="Filter by ID" oninput="filterByUsername()"></center>
<table id='reservation' border="1" align="center" width="70%">
<tr>
<th>Reservation ID</th>
<th>Time</th>
<th>Date</th>
<th>Quantity</th>
<th>Ticket ID</th>
<th>Payment Method</th>
<th>Delete</th>
<th>Update</th>
</tr>
<tr>

<?php foreach ($tab as $reservation) {
?>
<td> <?php echo $reservation['id_r'];?></td>
<td> <?= $reservation['horraires'];?></td>
<td> <?= $reservation['date'];?></td>
<td> <?= $reservation['quantite'];?></td>
<td> <?= $reservation['id_t'];?></td>
<td> <?= $reservation['methode_p'];?></td>
<td><a href="deletereservation.php?id_r=<?php echo $reservation['id_r']?>">Delete</a></td>
<td><a href="updatereservation.php?id_r=<?php echo $reservation['id_r']; ?>">Update</a></td>
</tr>
<?php
}?></table>
<center><input type="Button" value="Download PDF" onclick="pdf();"></center>

<script>
    function filterByUsername() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("filter");
    filter = input.value.toUpperCase();
    table = document.getElementById("reservation");
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
</script>
<script>
    function pdf(){
        window.location.href="../Controller/pdf.php";
    }
</script>