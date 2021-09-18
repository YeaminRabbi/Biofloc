<?Php
require "db_config.php";//connection to database
//SQL to get 20 records
$sql="select * from water_quality_monitoring_system order by id DESC limit 20;";
require('fdpf/fpdf.php');
//$pdf = new FPDF(); 

$pdf = new FPDF('P','mm',array(500,500));
$pdf->AddPage();

$width_cell=array(20,50,40,40,40,60);
$pdf->SetFont('Arial','B',10);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'SL',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'PH',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'TDS',1,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],10,'TSS',1,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[4],10,'TEMP',1,1,'C',true); 

$pdf->Cell($width_cell[5],10,'Realtime',1,1,'C',true); 

//// header ends ///////

$pdf->SetFont('Arial','',10);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=true;

/// each record is one row  ///
foreach ($pdo->query($sql) as $key => $row) {
$pdf->Cell($width_cell[0],10,($key+1),1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['pH'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['TDS'],1,0,'C',$fill);
$pdf->Cell($width_cell[3],10,$row['TSS'],1,0,'C',$fill);
$pdf->Cell($width_cell[4],10,$row['Temp'],1,1,'C',$fill);
$pdf->Cell($width_cell[5],10,$row['Realtime'],1,1,'C',$fill);

//to give alternate background fill  color to rows//
$fill = !$fill;
}
/// end of records /// 

$pdf->Output();
?>