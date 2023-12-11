<?php
require_once __DIR__. '\vendor\autoload.php';



require_once __DIR__ . '\controller\inscriptionC.php';

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
        
        foreach ($header as $col) $this->Cell(32, 7, $col, 1);
        $this->Ln();
    
        foreach ($data as $row) {
            foreach ($row as $col) $this->Cell(32, 6, $col, 1);
            $this->Ln();
        }
    }
}
$pdf = new PDF();
$file = "admins.pdf";
$users = new sign_upC();
$header = array('id', 'email','Birthdate' ,'Username',  'Password');
$dat = $users->showuser();
$data = $pdf->LoadData($dat);
$pdf->SetFont('Arial', '', 5);
$pdf->AddPage();
$pdf->BasicTable($header, $data);
$pdf->Output($file, 'D', true);