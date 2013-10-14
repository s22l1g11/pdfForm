<?php
if (!isset($_SESSION))
{
	session_start();
}

class PDF
{
	public $firstname;
	public $lastname;
	public $timeofstay;
	
	public function createPDF()
	{
		
	}
}
?>