
 <?php 

if(isset($_POST["submit"]))
{
	
if( ! ini_get('date.timezone') )
{
    date_default_timezone_set('GMT');
}
$company = $_POST["company"];
$address = $_POST["address"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$number = $_POST["number"];
$customer = $_POST["customer"];
$item = $_POST["item"];
$amount = $_POST["amount"];
$commission = $_POST["commission"];
$com = $_POST["com"];
$pay = 'Payment information';
$amount = str_replace(",",".",$amount);
$commission = str_replace(",",".",$commission);
$p = explode(" ",$amount);
$v = explode(" ",$commission);
$re = $p[0] + $v[0];
function r($r)
{
$r = str_replace("$","",$r);
$r = str_replace(" ","",$r);
$r = $r." $";
return $r;
}
$amount = r($amount);
$commission = r($commission);
require('fpdf.php');

class PDF extends FPDF
{

function Footer()
{
$this->SetY(-15);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function ChapterTitle($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(249,249,249);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetTextColor(32);
$pdf->Image('img/logo.png',10,10,-75);
$pdf->Cell(0,5,$company,0,1,'R');
$pdf->Cell(0,5,$address,0,1,'R');
$pdf->Cell(0,5,$email,0,1,'R');
$pdf->Cell(0,5,'Tel: '.$telephone,0,1,'R');
$pdf->Cell(0,30,'',0,1,'R');
$pdf->SetFillColor(200,220,255);
$pdf->ChapterTitle('Customer',$customer);
$pdf->ChapterTitle('Invoice Number ',$number);
$pdf->ChapterTitle('Invoice Date ',date('d.m.y'));
$pdf->Cell(0,20,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(170,7,'Item',1,0,'L');
$pdf->Cell(20,7,'Amount',1,1,'C');
$pdf->Cell(170,7,$item,1,0,'L',0);
$pdf->Cell(20,7,$amount,1,1,'C',0);
$pdf->Cell(0,0,'',0,1,'R');
$pdf->Cell(170,7,'Commission',1,0,'R',0);
$pdf->Cell(20,7,$commission,1,1,'C',0);
$pdf->Cell(170,7,'Total',1,0,'R',0);
$pdf->Cell(20,7,$re." $",1,0,'C',0);
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(0,20,'',0,1,'R');
$pdf->Cell(190,40,$com,0,0,'C');
$filename="invoice.pdf";
$pdf->Output('D',$filename);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create invoice - Instant Express Transfers</title>
<style>
body{background-image:url(img/bg.jpg);
}
a{
color:#4c4c4c;
text-decoration:none;
}
a:hover{
color:#4c4c4c;
text-decoration:underline;
}
#content{
width:800px;
height:600px;
background-color:#FEFEFE;
border: 10px solid rgb(255, 255, 255);
border: 10px solid rgba(255, 255, 255, .5);
-webkit-background-clip: padding-box;
background-clip: padding-box;
border-radius: 10px;
opacity:0.90;
filter:alpha(opacity=90);
margin:auto;
}
#footer{
width:800px;
height:30px;
padding-top:15px;
color:#4c4c4c;
margin:auto;
}
#title{
width:770px;
margin:15px;
color:#4c4c4c;
font-size:18px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body{
width:770px;
height:360px;
margin:15px;
color:#4c4c4c;
font-size:16px;
font-family:Verdana, Arial, Helvetica, sans-serif;
}
#body_l{
width:385px;
height:360px;
float:left;
}
#body_r{
width:385px;
height:360px;
float:right;
}
#name{
width:width:385px;
height:40px;
margin-top:15px;
}
input{
margin-top:10px;
width:345px;
height:32px;
-moz-border-radius: 5px;
border-radius: 5px;
border:1px solid #4c4c4c;
background-image:url(img/paper_fibers.png);
color:#4c4c4c;
margin-left:15px;
padding:5px;
}
#up{
width:770px;
height:40px;
margin:auto;
margin-top:10px;
}
</style>
</head>

<body>
<div id="content">
<div id="title" align="center">Create an invoice</div>
<div id="body">
<form action="" method="post" enctype="multipart/form-data">
<div id="body_l">
<div id="name"><input name="company" value="Instant Express Transfers" type="text" /></div>
<div id="name"><input name="address" list="address" placeholder="Choose Address" type="text" />

<datalist id="address">
  <option value="Francis House 1 Flr, Cnr Jason Moyo & 1st Str (next to Edgars along J.Moyo) HRE">
   <option value="88 Simmonds Str, Cnr Simmonds & Wolmarams Braamfontein (POWERHOUSE BUS TERMINAL) JHB">
  <option value="No 1 hellet street(Opposite Passport Offices) (Pa Z.A.V.H) Masvingo">
  <option value="Shop no 171, D.B Electronics, Schedding Street,  next to Osbro (Bosam Station ) PTA">
</datalist>

</div>
<div id="name"><input name="email" list="email" placeholder="Insert here your Email" type="text" />

<datalist id="email">
  <option value="help@instantexpress.co.za">
  <option value="simba.p@instantexpress.co.za">
  <option value="takura.t@instantexpress.co.za">
</datalist>

</div>
<div id="name"><input name="telephone" placeholder="Insert here your telephone number" type="text" /></div>
<div id="name"><input name="number" placeholder="Invoice number" type="text" /></div>
<div id="name"><input name="customer" placeholder="Customer" type="text" /></div>
<div id="name"><input name="item" placeholder="Item" type="text" /></div>
</div>
<div id="body_r">
<div id="name"><input name="amount" placeholder="Insert amount" type="text" /></div>
<div id="name"><input name="commission" placeholder="Insert commission" type="text" /></div>
<div id="name"><input name="com" placeholder="Add a comment" type="text" /></div>
</div>

<div id="up" align="center"><input name="submit" style="margin-top:60px;" value="Create your Invoice" type="submit" /><br /><br />


</div>
</form>
</div>
</div>

</body>
</html>
