<?php
if (!isset($_SESSION))
{
	session_start();
}

require_once('classes/class.config.php');
$config_class = new Config;
$config_class->content = "";

require_once('classes/class.form.php');
$form_class = new Form;


$id = $_GET['id'];
if ($id == "form" || $id == "")
{
	$config_class->content = $form_class->displayForm();
}
else if ($id == "create")
{
	require_once($this->getUrl().'/mpdf/examples/create.php');
}
//calling the replace function to display the website
echo $config_class->replace();
?>