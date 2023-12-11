<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include '..\Controller\reservationC.php';
$reservationC = new ReservationC();
$tab = $reservationC->listreservation();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List |</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="\ff\Css\index.css">
</head>
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="\ff\views\showcategorie.php">list categorie</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="showevents.php">list evenement</a></li>
            
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>
</section>
<body  style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center;   ">
    


<h1 class="display-1">Liste des Reservations</h1>
<a class="btn btn-warning" href="addreservation.php"> Ajouter une reservation</a>
<input class="form-control" type="text" id="filter" placeholder="Filter by ID" oninput="filterByUsername()">
<table class="table table-hover" id='reservation' border="1" align="center" width="70%">

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
<td><a class="btn btn-outline-danger" href="deletereservation.php?id_r=<?php echo $reservation['id_r']?>">Delete</a></td>
<td><a class="btn btn-outline-success" href="updatereservation.php?id_r=<?php echo $reservation['id_r']; ?>">Update</a></td>
</tr>
<?php
}?></table>
<center><input class="btn btn-primary" type="Button" value="Download PDF" onclick="pdf();"></center>
</body>

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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>