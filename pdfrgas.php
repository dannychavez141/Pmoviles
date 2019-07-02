<?php
	include 'plantilla.php';
	require 'conexion.php';
$cbosensor=$_GET['cbosensor'];
$btnfecha=$_GET['btnfecha'];
$btnHora1=$_GET['btnHora1'];
$btnHora2=$_GET['btnHora2'];
date_default_timezone_set('America/Lima'); 

	if ($btnfecha=='' && $btnHora1=='' && $btnHora2=='') {
          $sql = "Select * from $cbosensor  order by tiempo desc limit 100";
           } else if ($btnHora1=='' && $btnHora2=='') {
          $sql ="Select * from $cbosensor where tiempo like '%$btnfecha%' order by tiempo desc limit 100";
           } else{
           	$sql ="Select * from $cbosensor where tiempo >='".$btnfecha." ".$btnHora1."'  and tiempo <='".$btnfecha." ".$btnHora2."' order by tiempo desc limit 100";
       }
   

if ($cbosensor=='valores') {
	$gas='Monoxido de carbono';
}
if ($cbosensor=='valores1') {
	$gas='Dioxido de carbono';
}
if ($cbosensor=='valores2') {
	$gas='Amoniaco';
}

	$resultado = $mysqli->query($sql);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Ln(10);
	$pdf->SetX(53);
	$pdf->Cell(50,6, 'GAS REPORTADO:'.$gas,0,1,'C');
	$pdf->Ln(6);
	$pdf->SetX(55);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25,6,'CODIGO',1,0,'C');
	$pdf->Cell(25,6,'FECHA',1,0,'C');
	$pdf->Cell(40,6,'VALOR',1,0,'C');
	$pdf->SetFont('Arial','',10);
	while($row = $resultado->fetch_array())
	{$pdf->Ln(6);
		$pdf->SetX(55);
		$pdf->Cell(25,6,$row['id'],1,0,'C');
		$pdf->Cell(25,6,utf8_decode($row['valor']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['tiempo']),1,0,'C');
		 
	}
	$pdf->Output();
?>