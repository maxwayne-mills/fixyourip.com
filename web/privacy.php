<?php
set_include_path ('.:../includes:../../includes');
include 'header_aboutus.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
        echo "<td align=left>";
                include 'includes/adds/google_add.inc';
                echo "<table cellspacing=10>";
                echo "<tr valign=bottom>";
			echo "<td>";
                                echo "<font size=6><b>FixYourIP</font>";
                        echo "</td>";
			echo "<td>";
                                echo "<font size=3><b><a href=/index.php>Home</a></b></font>";
                        echo "</td>";
			echo "<td>";
                                echo "<font size=3><b><a href=/tools>Tools</a></b></font>";
                        echo "</td>";
                        echo "<td>";
                                echo "<font size=3><b><a href=/aboutus.php>About</a></b></font>";
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
echo "<tr>
	<td align=left>";


		<iframe frameborder="no" width="300px" height="200px" src="http://fusion.opensitesolutions.com/server_services/piwik/index.php?module=CoreAdminHome&action=optOut&language=en">
		</iframe>

	echo "</td>";
echo "</tr>";
echo "</table>";

include 'lookups.inc';
include 'adds/google_add.inc';
echo "</center>";
include 'footer.inc';
?>
