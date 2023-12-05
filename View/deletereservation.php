<?php
include '..\Controller\reservationC.php';
$reservation = new reservationC();

try {
    $reservation->deletereservation($_GET['id_r']);
    header('location:listreservation.php');
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>