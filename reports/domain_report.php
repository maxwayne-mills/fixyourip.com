<?php
set_include_path ('.:../includes:../../includes');
$choice = $_POST["tool_option"];

if ($choice == "domainreport") {
	set_include_path ('.:../includes:../../includes');
        include 'reports.inc';
        include 'page_header.inc';
	$name = $_POST["domain"];

                echo "<pre>";
		echo shell_exec('apps/domain_reports.sh '.$name.'');
		echo "</pre>";

	include 'page_footer.inc';
        include 'lookups.inc';
        include 'add1.inc';
        include 'footer.inc';
        echo "</center>";
}

?>
