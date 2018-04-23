<html>
<head>
<title>Query string</title>
</head>
<body>

<?php

	$port=$_GET["port"];
	$host=$_GET["host"];
	$connection = @fsockopen($host, $port);

	if (is_resource($connection))
	{
		#echo '<h2>' . $host . ':' . $port . ' ' . '(' . getservbyport($port, 'tcp') . ') is open.</h2>' . "\n";
		echo 'open';
	fclose($connection);
	}

	else
	{
		#echo '<h2>' . $host . ':' . $port . ' is not responding.</h2>' . "\n";
		echo 'closed';
	}
	
?>

</body>
</html>
