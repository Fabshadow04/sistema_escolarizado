<?php
//aqui se realiza el pdf de la boleta del alumno donde se extraen sus datos
require('fpdf/fpdf.php');
session_start();
class PDF extends FPDF
{

function Header()
{
	

 $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Datos del alumno ',0,0,'C');
    // Salto de línea
    $this->Ln(20);


     $this->SetFont('Arial','B',10);
         $this->cell(20,10,'Matricula',1,0,'C');
         $this->cell(20,10,'nombre',1,0,'C');
         $this->cell(20,10,'Edad',1,0,'C');
         $this->cell(20,10,'Sexo',1,0,'C');
         $this->cell(26,10,'Grupo',1,0,'C'); 
         $this->cell(20,10,'Grado',1,0,'C');
         $this->cell(25,10,'Nivel',1,0,'C');
         $this->cell(20,10,'Activo',1,0,'C');
       
  $this->Ln(10);

        
       
  
}


function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-10);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    
$this->cell(0,10,'page'.$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("cn.php");
//$folio = trim($_POST['folio']);
$consulta = "SELECT * FROM usuarios WHERE id='$_SESSION[id]' ";
$resultado = mysqli_query($conexion, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);

while ($row=$resultado->fetch_assoc()) {
        $pdf->SetFont('Times','B',12);
	$pdf->Cell(20,10,$row['id'],1,0,'C');
	$pdf->Cell(20,10,$row['username'],1,0,'C');
	$pdf->Cell(20,10,$row['edad'],1,0,'C');
        $pdf->Cell(20,10,$row['sexo'],1,0,'C');
	$pdf->Cell(26,10,$row['grupo'],1,0,'C');
	$pdf->Cell(20,10,$row['grado'],1,0,'C');
      
        $pdf->Cell(25,10,$row['nivel'],1,0,'C');
        $pdf->Cell(20,10,$row['estatus'],1,0,'C');
        $pdf->Ln();
      

} 


	$pdf->Output();
?>