<?php
include '..\Controller\reservationC.php';
include '..\Model\reservation.php';
$error = "";
$reservation = NULL;
$reservationC = new reservationC();
if (isset($_POST['horraires']) && isset($_POST['date']) && isset($_POST['quantite']) && isset($_POST['id_t']) && isset($_POST['methode_p'])) 
{
    if (!empty($_POST['horraires']) && !empty($_POST['date']) && !empty($_POST['quantite']) && !empty($_POST['id_t']) && !empty($_POST['methode_p'])) {
        $id_r = isset($_POST['id_r']) ? $_POST['id_r'] : null;
        $reservation = new reservation($id_r, $_POST['horraires'], $_POST['date'], $_POST['quantite'], $_POST['id_t'], $_POST['methode_p']);
        $reservationC->addreservation($reservation);
        header('location:listreservation.php');
    } else {
        $error = "Missing information";
    }
} else {
    $error = "Missing information";
}

?>

<html>
<body>
<center><form action="" method="POST">
    <br>Horraires: <input type="time" name="horraires"></br>
    <br>Date: <input type="date" name="date"></br>
    <br>Quantite: <input type="number" name="quantite"></br>
    <br>Id_t: <input type="text" name="id_t"></br>
    <br>Methode_p: <input type="text" name="methode_p"></br>
    <br><input type="submit" value="Save">
    <input type="reset" value="Annuler"></br>
</form>
</body></center>
</html>
