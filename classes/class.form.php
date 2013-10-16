<?php
if (!isset($_SESSION))
{
	session_start();
}
require_once('class.config.php');
class Form extends Config
{
	public function displayForm()
	{
		$content = "";
		$content .= '<title>Form | <@brand@></title>';
		$content .= '
		<form class="form-signin" method="POST" action="<@seite@>/mpdf/examples/create.php">
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
}
?>