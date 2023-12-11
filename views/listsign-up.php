
<?php
session_start();
$Username = isset($_SESSION['Username']) ? $_SESSION['Username'] : '';
?>
<?php
include 'C:\xampp\htdocs\ff\controller\inscriptionC.php';

$c = new  sign_upC();
$tab = $c->listsign_ups();

?>
<section id="navbar-box">
        <div class="navbar">
            <div class="logo"><a href="#">DREAM SCREEN</a></div>
            <ul class="links">
            <li><a href="listsign-up.php">list sign-up</a></li>
            <li><a href="showfilm.php">list film</a></li><li>
            <li><a href="listOffres.php">list Ofeeres</a></li>
            <li><a href="showevents.php">list evenement</a></li>
            <li><a href="listreservation.php">list reservation</a></li>
            </ul>
            <p>Welcome: <?php echo $Username; ?><style>p { color: white; }</style>
            <button id="colorToggleBtn" class="action_btn"><ion-icon name="contrast-outline"></ion-icon></button>
            <a href="login.php" class="action_btn" class=>login <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span></a>
            </div>



</section>
<head>
<section id="index">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link rel="stylesheet" href="\ff\Css\index.css">
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="\ff\js\app.js"></script>
 </head>
 <audio autoplay loop>
    <source src="\ff\image_music\music.mp3" type="audio/mp3">
    
</audio>
 <center>
    <h1 class="color-change">List of customers</h1>
    <a href="adsign-up.php" class="btn btn-dark mb-3">Add player</a>
    <a href="\ff\pdf.php" class="btn btn-dark mb-3">Generate PDF</a>
    <h2>
        <center><input type="text" id="username-filter" placeholder="Filter by username" oninput="filterByUsername()"></center>
         <style>#username-filter{color: white;background: transparent; border: none;  font-size: 1em;} </style>

    </h2>
    </h2>
</center>

<table  class="table text-center  " id="players-table" coler="wihte">
    <tr>
          <th scope="col">ID</th>
          <th scope="col">email</th>
          <th scope="col">Birthdate</th>
          <th scope="col">Username</th>
          <th scope="col">password</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
          
    
    </tr>


    <?php
    foreach ($tab as $signup) {
    ?>
        <tr>
            <td><?= $signup['id']; ?></td>
            <td><?= $signup['email']; ?></td>
            <td><?= $signup['Birthdate']; ?></td>
            <td><?= $signup['Username']; ?></td>
            <td><?= $signup['Password']; ?></td>
            <td align="center">
                <form method="POST" action="updateJoueur.php">
                    
                    <input type="submit"  name="update" id="kk" value="Update">
                    <input type="hidden" value=<?PHP echo $signup['id']; ?> name="id">
                  
                </form>
            </td>
            <td>
              <a href="deletesign-up.php?id=<?php echo $signup["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
        </tr>
    <?php
    }
    ?>
    </section >
    <tbody id="player-data"></tbody>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</table>
<script>
    function filterByUsername() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("username-filter");
    filter = input.value.toUpperCase();
    table = document.getElementById("players-table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[3]; 
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


<script src="\ff\js\colorchange.js"></script>
