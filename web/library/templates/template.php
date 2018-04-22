<?php
set_include_path ("/var/www/html/fixyourip/");
include 'includes/header.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Library </h3>";
	echo "</td>";	
echo "</tr>";

echo "<tr>";
	echo "<td align=left>";
		echo "<ul>";
		echo "<li><a href=/library/openssl/>OPENSSL Faqs</a>";
		echo "</ul>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
        echo "</td>";
echo "</tr>";

echo "</table>";

echo "<br>";
include 'includes/adds/google_add.inc';
echo "</center>";
include 'includes/footer.inc';
?>
