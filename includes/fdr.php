<?php
require(__DIR__ . "/config.php");
require(__DIR__ . "/../vendor/fpdf/fpdf/src/Fpdf/Fpdf.php");

use Fpdf\Fpdf;

$eventName = $_POST['event'];
$fdrQuery = "SELECT * FROM events WHERE nom='$eventName' LIMIT 1";
$fdrRes = mysqli_query($conn, $fdrQuery);
$fdrRow = mysqli_fetch_row($fdrRes);


/**
 * fdrRes[0] = id
 * fdrRes[1] = name
 * fdrRes[2] = location
 * fdrRes[3] = starting time
 * fdrRes[4] = total number of participants
 */
class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Logo
        $this->Image('C:\wamp64\www\Appli_client_v.1\img\logoAG2R_2.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(60,20,'Feuille de route AG2R',1,0,'C');
        // Line break
        $this->Ln(40);
    }


// Simple table
    function BasicTable($header)
    {
        // Header
        foreach($header as $col)
            $this->Cell(37,7,$col,1);
        $this->Ln();
        // Data


        $test = 0;
        $test2 = 0;
        while ($test < 8){
            while($test2 < 5){
                $this->Cell(37,7,"utilisateur " . $test, 1);
                $test2++;
            }
            $this->Ln();
            $test2 = 0;
            $test++;
        }
    }




}

// Instanciation of inherited class
$pdf = new PDF();
$header = array('Table 1', 'Table 2', 'Table 3', 'Table 4', 'Table 5');
$pdf->AddPage();
$pdf->SetFont('Times','',13);
$pdf->Cell(0,10,'Tour 1',0,1);

$pdf->BasicTable($header);
$pdf->Cell(0,10,'Tour 2',0,1);

$pdf->BasicTable($header);
$pdf->Cell(0,10,'Tour 3',0,1);

$pdf->BasicTable($header);
$pdf->AddPage();
$pdf->Cell(0,10,'Tour 4',0,1);

$pdf->BasicTable($header);
$pdf->Cell(0,10,'Tour 5',0,1);

$pdf->BasicTable($header);
$pdf->Ln(25);
$pdf->Cell(0,0,'Informations evenement :',0,1);
$pdf->Ln(10);
$pdf->Cell(0,0,'Nom : ' . $fdrRow[1] ,0,1);
$pdf->Ln(10);
$pdf->Cell(0,0,'Location : ' . $fdrRow[2] ,0,1);
$pdf->Ln(10);
$pdf->Cell(0,0,'Date de depart : ' . $fdrRow[3] ,0,1);
$pdf->Ln(10);
$pdf->Cell(0,0,'Nombre total participants : ' . $fdrRow[4] ,0,1);




$pdf->Output();
?>

