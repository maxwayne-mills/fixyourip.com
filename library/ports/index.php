<?php
set_include_path ('.:../includes:../../includes');
include 'header_ports.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
        echo "<td align=left>";
                echo "<h1>Internet Ports</h1>";
                echo "<br>";
        echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<?php
include 'portnumbers.html';
?>

<?php
        echo "</td>";
echo "</tr>";
echo "</table>";

include 'lookups.inc';
echo "<br>";
include 'adds/google_add.inc';
echo "</center>";
include 'footer.inc';
?>
