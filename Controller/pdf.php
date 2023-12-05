<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__ .'/reservationC.php';
use Fpdf\Fpdf;

class PDF extends FPDF
{
    function LoadData($data)
    {
        $result = array();
        for ($i = 0; $i < count($data); $i++) {
            $result[$i] = $data[$i];
        }
        return $result;
    } 
    function BasicTable($header, $data)
    {
        foreach ($header as $col) $this->Cell(28, 7, $col, 1);
        $this->Ln();
        foreach ($data as $row) {
            foreach ($row as $col) $this->Cell(28, 6, $col, 1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$file = "reservation.pdf";
$reservation = new reservationC(); 
$header = array('Reservation ID', 'Time', 'Date', 'Qunatity', 'Ticket ID', 'Payment Method');
$data = $reservation->listreservation(); 
$pdf->SetFont('Arial', '', 7); 
$pdf->AddPage();
$pdf->BasicTable($header, $data);
$pdf->Output($file, 'D', true);

?>