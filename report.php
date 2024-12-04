<?php
include "Codes.php";
// error_reporting(E_ALL ^ E_NOTICE);
$co=new Codes();
$co->setConnect();
require("tcpdf/tcpdf.php");
$pdf=new TCPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
$pdf->SetFont("helvetica",'B',24);
$pdf->Cell(0,14,'Invoice-Report',0,1,'C',0,'',false,'M','M');
$pdf->Line(10,17,200,17);
$pdf->SetFont("helvetica",'B',12);
$pdf->ln(15);
$pdf->SetFont("times",'B1',12);
$pdf->Cell(180,15,' Date : '.date("j / n / y"),0,1,'R',0,'',false,'M','M');
// $pdf->ln(3);
// $pdf->Cell(80,70,'Invoice_No',0,1,'l',0,'',false,'M','M');
$pdf->SetFont("times",'',11);
$tbl = <<<EOD
    <table style="margin-left:100px;" border="1" cellpadding="2" cellspacing='2'>
    <tr>
    <td width="12%" style="text-align:center; vertical-align:middle; font-weight:bold;">Item_Name</td>
    <td width="12%" style="text-align:center; vertical-align:middle; font-weight:bold;">Price</td>
    <td width="12%" style="text-align:center; vertical-align:middle; font-weight:bold;">Qty</td>
    </tr>
    </table>
EOD;
$sql="SELECT item_name,Price,qty,total from totals t ,shopping_item s WHERE t.total_id=s.total_id and t.total_id=2";
$result=$co->db->query($sql);
while($row=mysqli_fetch_assoc($result)){
  if(isset($row['item_name'])){
    $item=$row['item_name'];
  }
  if(isset($row['Price'])){
    $price=$row['Price'];
  }
  if(isset($row['qty'])){
    $qty=$row['qty'];
  }
  if(isset($row['total'])){
    $total=$row['total'];
  }
  echo"<tr><td>".$item."</td>"."<td>".$price."</td>"."<td>".$qty."</td>"."<td>".$total."</td>"."</tr><br>";
  $tbl.= <<<EOD
    <tr>
    <td width="12%" style="text-align:center; vertical-align:middle; font-weight:bold;">$item</td>
    <td width="12%" style="text-align:center; vertical-align:middle; font-weight:bold;">$price</td>
    <td width="12%" style="text-align:center; vertical-align:middle; font-weight:bold;">$qty</td>
    </tr>
  EOD;
   
}


$pdf->writeHTML($tbl,true,false,false,false,'');
$pdf->Output('invoice','I');

?>