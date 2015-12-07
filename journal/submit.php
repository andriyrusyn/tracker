<html>
<body>
<?php
    $input = trim($_POST['entry']);
    $input = mysql_escape_string($input);

	require_once('orm/Entry.php');

	function renderEntry($e) {
	  if (is_null($e)) {
	    print("No such entry.");
	  } else {
?>
	<ul>
	    <li>id = <?php print($e->getID())?></li>
	    <li>author = <?php print($e->getAuthor())?></li>
	    <li>body = <?php print($e->getBody())?></li>
	</ul>
<?php
	      }
	}
?>
	<h1>Entry Test</h1>

	<h2>Creating</h2>
<?php 
	$e = Entry::create(1, $input);
?>
	<blockquote>
<?php 
	renderEntry($e);
?>
	</blockquote>
	
</body>
</html>

