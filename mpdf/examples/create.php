<?php
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$timeofstay = $_POST['timeofstay'];	
	/*
	 * create the custom pdf file in a html format
	 * then create the final pdf file
	 */
	
	/*$html ='
	Dear '.$lastname.', '.$firstname.'<br>
   	We\'re proud to welcome you in our hotel!<br>
   	You just booked a stay about '.$timeofstay.' days.<br>
   	<br>
   	<br>
   	Yours sincerly,<br>
   	'.$brand.'.';*/
   	
   		$brand = 'pdfForm';
		$file = implode("",file('http://dev.zimmerpforte.de/pdfForm/tmp/pdf.html'));
		$file = str_replace('<@firstname@>',$_POST['firstname'],$file);
		$file = str_replace('<@lastname@>',$_POST['lastname'],$file);
		$file = str_replace('<@timeofstay@>',$_POST['timeofstay'],$file);
		$file = str_replace('<@brand@>',$brand,$file);	
   	
	//create pdf file
	include('../mpdf.php');
	$mpdf = new mPDF();
	$mpdf->WriteHTML($file);
	$mpdf->Output();
	exit;
	
?>