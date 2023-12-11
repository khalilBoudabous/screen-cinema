<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include '..\Controller\ticketsC.php';
$ticketsC = new TicketsC();
$tab = $ticketsC->listtickets();
?>
<link rel="stylesheet" href="\ff\Css\index.css">
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
    
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="showevents.php">list evenement</a></li>
            <li><a href="listreservation.php">list reservation</a></li>
            <li><a href="listtickets.php">list tickets</a></li>
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>
</section>
<body style=" width: 100%;
    height: 120vh;
    background:url('../image_music/image4.jpg') no-repeat ;
    background-size: cover;
    background-position: center; 
    color: white;  ">
    

<center><h1>Liste des tickets</h1></center>
<center><a href="addtickets.php"> Ajouter un ticket</a></center>
<center><input type="text" id="Tickets-ID-filter" placeholder="Filter by ID" oninput="filterByUsername()"></center>
<table id='tickets' border="1" align="center" width="70%" >
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
</body>
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
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="\ff\js\colorchange.js"></script>