<?php
include '..\Controller\ticketsC.php';
include '..\Model\tickets.php';
$tickets = NULL;
$ticketsC = new ticketsC();

  if (isset($_POST['prix']) && isset($_POST['id_film'])) {
    if (!empty($_POST['prix']) && !empty($_POST['id_film'])) {
      $tickets = new Tickets(null, $_POST['prix'], $_POST['id_film']);
      $ticketsC->addtickets($tickets);
      header('location:listtickets.php');
    } else {
      $error = "Missing information";
    }
  } else {
    $error = "Missing information";
  }
?>

<html>
    <body>
      <center>
        <form action="" method="POST">
            <br>Prix: <input type="number" name="prix"></br>
            <br>Id_film: <input type="text" name="id_film"></br>
            <br><input type="submit" value="Save">
            <input type="reset" value="Annuler"></br>
        </form>
        </center>
    </body>
</html>
