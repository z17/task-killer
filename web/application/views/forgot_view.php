<p><?=$data['message']?></p>
<?php
	if (isset($data['errors']))
	{
		echo "<ul>";
	  foreach($data['errors'] as $error)
		{
			echo "<li class=\"redtext\">".$error."</li>";
		}
		echo "</ul>";
	}
?>
<form action="" method="POST">
	<input type="text" name="email">
	<input type="submit" value="Отправить">
	<input type="text" name="fl" value="true" hidden>
</form>