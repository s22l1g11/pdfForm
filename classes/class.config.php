<?php
if (!isset($_SESSION))
{
	session_start();
}

class Config
{
	public $content;
	public function replace()
	{
		$brand = "pdfForm";
		$file = implode("",file('tmp/main.html'));
		$file = str_replace('<@content@>',$this->content,$file);
		$file = str_replace('<@brand@>',$brand,$file);
		return $file;
	}
}
?>