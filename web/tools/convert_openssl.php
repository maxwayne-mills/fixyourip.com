<?php
set_include_path ("/var/www/html/fixyourip.com/");
$cert = $_POST["cert"];

	set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

		echo "<pre>";
		$tempfile = tempnam("/tmp","");
		$handle = fopen($tempfile,"w");
		fwrite($handle, $cert);
		echo shell_exec('/usr/bin/display_cert.sh '.$tempfile.'');
		fclose($handle);
		echo "<br><br>";
		echo "</pre>";
		
	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
