<?php
if (!isset($_SESSION))
{
	session_start();
}
error_reporting(E_ALL ^ E_NOTICE);
require_once('class.config.php');
class Form extends Config
{
	public function displayForm()
	{
		$content = "";
		$content .= '<title>Form | <@brand@></title>';
		$content .= '
		<form class="form-signin" method="POST" action="?id=final">
			<label>Firstname:</label>
			<input type="text" name="firstname" required="required" autofocus="autofocus" class="input-block-level" />
			<label>Lastname:</label>
			<input type="text" name="lastname" required="required" class="input-block-level" />
			<label>How long would you like to stay? (days)</label>
			<input type="numbers" name="timeofstay" required="required" class="input-block-level" /><br>
			<input type="submit" value="Book" class="btn btn-large btn-primary"/>
		</form>';
		return $content;
	}
	
	public function evaluateForm()
	{
		$content = "";
		$content .= '<title>Save customer | <@brand@></title>';
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$timeofstay = $_POST['timeofstay'];
		
		$content .= '<div class="alert alert-success">
					<a class="close" href="#" data-dismiss="alert">x</a>
						<strong>Success:</strong><br>
						Creating a pdf file...
					</div>';		
		/*
		 * create the custom pdf file in a html format
		 * then create the final pdf file
		 */
		
		$brand = 'pdfForm';
		$file = implode("",file('tmp/pdf.html'));
		$file = str_replace('<@firstname@>',$_POST['firstname'],$file);
		$file = str_replace('<@lastname@>',$_POST['lastname'],$file);
		$file = str_replace('<@timeofstay@>',$_POST['timeofstay'],$file);
		$file = str_replace('<@brand@>',$brand,$file);	
		echo $file;
		return $content;
		//create pdf file
		include('../mpdf/mpdf.php');
		$mpdf = new mPDF();
		$mpdf->WriteHTML($file);
		$mpdf->Output();
		exit;
	}
}
?>