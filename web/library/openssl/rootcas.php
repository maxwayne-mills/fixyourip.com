<?php
set_include_path ('.:../includes:../../includes');
include 'header_rootcas.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Trusted Root Certificates</h3>";
		echo "<br>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<?php
include 'root.html';
?>

<?php
        echo "</td>";
echo "</tr>";
echo "</table>";

include 'cert_lookup.inc';
echo "<br>";
include 'adds/google_add.inc';
echo "</center>";
include 'footer.inc';
?>
