<?php
set_include_path (':.:../includes:../../includes');
include 'header.inc';
include_once 'tools_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
echo "<td align=left>";
include 'adds/google_add.inc';
echo "<table class=table>";
	echo "<tr valign=bottom>";
	echo "<td>";
		echo "<h2>FixYourIP</h2>";
	echo "</td>";
	echo "<td>";
		echo "<font size=3><b><a href=/index.php>Home</a></b></font>";
	echo "</td>";
	echo "<td>";
		echo "<font size=3><b><a href=/tools>Tools</a></b></font>";
	echo "</td>";
	echo "<td>";
		echo "<font size=3><b><a href=/aboutus.php>About Us</a></b></font>";
	echo "</td>";
	echo "<td>";
		echo "<font size=3><b><a href=/library/>Library</a></b></font>";
	echo "</td>";
	echo "<td>";
		echo "<font size=3><b><a href=/reports/>Reports</a></b></font>";
	echo "</td>";
	echo "</tr>";
echo "</table>";
echo "<br>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</center";


echo "<center>";
echo "<table width=50%>";
echo "<tr>";
echo "<td align=left>";
print ('<b>IP:</b> '.$_SERVER['REMOTE_ADDR'].'');
echo "<br>";
echo "<b>Reverse DNS: </b>";
echo  shell_exec('dig -4 +short -x '.$_SERVER['REMOTE_ADDR'].'');
echo "</A>";
echo "<h4>&nbsp;</h4>";
echo "</td>";
echo "<td>";
echo "</tr>";
echo "</table>";
echo "</center";


echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h1>Tools </h1>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
	echo "<td align=left>";
                echo "<ul>";
		echo "<li><a href=/tools/dns_tools.php>DNS Tools</a><br>";
		echo "<li><a href=/tools/iptools.php>IP Tools</a><br>";
		echo "<li><a href=/tools/ssltools.php>SSL Tools</a><br>";
		echo "<li><a href=/index.php>General Tools</a><br>";
		echo "</ul>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
        echo "</td>";
echo "</tr>";

echo "</table>";

include 'lookups.inc';
echo "<br>";
include 'adds/google_add.inc';
echo "</center>";
include 'footer.inc';
?>
