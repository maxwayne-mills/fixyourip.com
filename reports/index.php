<?php
set_include_path ('.:../includes:../../includes');
include 'reports.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
        echo "<td align=left>";
                include 'adds/google_add.inc';
                echo "<table class=table>";
                echo "<tr valign=bottom>";
			echo "<td>";
                                echo "<h1>FixYourIP</h1>";
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
                echo "<form action=domain_report.php method=post>";
                echo "<h4>Free Domain Report</h4>";
                echo "Enter your Domain Name <input type=text name=domain>";
                echo "<input type=hidden name=tool_option value=domainreport>";
                echo "<input type=submit value=check>";
                echo "<br><br>";
                echo "</form>";
        echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
                echo "<form action=ip_report.php method=post>";
                echo "<h4>Free IP Report</h4>";
                echo "Enter your IP Address <input type=text name=ip>";
                echo "<input type=hidden name=tool_option value=ipreport>";
                echo "<input type=submit value=check>";
                echo "<br><br>";
                echo "</form>";
        echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
                echo "<form action=zonecheck_report.php method=post>";
                echo "<h4>DNS Zone Check Report</h4>";
                echo "Enter your FQDN (google.com)<input type=text name=zonecheckreport>";
                echo "<input type=hidden name=tool_option value=zonecheckreport>";
                echo "<input type=submit value=check>";
                echo "<br><br>";
                echo "</form>";
        echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
                echo "<form action=web_report.php method=post>";
                echo "<h4>Free Web Report</h4>";
                echo "Enter your Web Site Address <input type=text name=web>";
                echo "<input type=hidden name=tool_option value=webreport>";
                echo "<input type=submit value=check>";
                echo "<br><br>";
                echo "</form>";
        echo "</td>";
echo "</tr>";

echo "<tr>";
	echo "<td align=left>";
	echo "<br>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
	echo "<td colspan=2>";
	echo "</td>";
echo "</tr>";
echo "</table>";

include 'lookups.inc';
include 'adds/google_add.inc';
echo "</center>";
include 'footer.inc';
?>
