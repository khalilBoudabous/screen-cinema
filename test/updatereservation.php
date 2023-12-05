<?php
include '..\Controller\reservationC.php';

$reservationC = new ReservationC();

if (isset($_GET['id_r'])) {
    $reservation = $reservationC->getReservationById($_GET['id_r']);

    if (isset($_POST['update'])) {
        $id_r = $_POST['id_r'];
        $horraires = $_POST['horraires'];
        $date = $_POST['date'];
        $quantite = $_POST['quantite'];
        $id_t = $_POST['id_t'];
        $methode_p = $_POST['methode_p'];

        $reservationC->updatereservation($_GET['id_r'], $horraires, $date, $quantite, $id_t, $methode_p);

        header('location:listreservation.php');
    }
} else {
    header('location:listreservation.php');
}
?>

<html>
    <body>
        <form action="" method="POST">
            Id_r: <input type="text" name="id_r" value="<?php echo $reservation['id_r']; ?>">
            Horraires: <input type="time" name="horraires" value="<?php echo $reservation['horraires']; ?>">
            Date: <input type="date" name="date" value="<?php echo $reservation['date']; ?>">
            Quantite: <input type="int" name="qnautite" value="<?php echo $reservation['quantite']; ?>">
            Id_t: <input type="text" name="id_t" value="<?php echo $reservation['id_t']; ?>">
            Methode_p: <input type="text" name="methode_p" value="<?php echo $reservation['methode_p']; ?>">
            <input type="submit" name="update" value="Update">
            <a href="listreservation.php">Cancel</a>
        </form>
    </body>
</html>
