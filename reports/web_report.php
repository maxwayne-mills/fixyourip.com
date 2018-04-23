<?php
set_include_path ('.:../includes:../../includes');
$choice = $_POST["tool_option"];

if ($choice == "webreport") {
	set_include_path ('.:../includes:../../includes');
        include 'reports.inc';
        include 'page_header.inc';
	$name = $_POST["web"];

                echo "<pre>";
		echo shell_exec('apps/webreport.sh '.$name.'');
		echo "</pre>";

	include 'page_footer.inc';
        include 'lookups.inc';
        include 'add1.inc';
        include 'footer.inc';
        echo "</center>";
}

?>
