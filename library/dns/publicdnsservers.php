<?php
set_include_path (".:includes:../includes:../../includes");
include 'header_publicdnsservers.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Free Public DNS servers</h3>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<h4>Comodo Secure public dns servers</h4>
8.26.56.26<br>
8.20.247.20<br><br>

<h4>DNS advantage public dns servers</h4>
156.154.70.1<br>
156.154.71.1<br><br>

<h4>DNS Reactor public dns servers</h4>
204.45.18.18<br>
204.45.18.26<br><br>

<h4>OPenDNS public dns servers</h4>
208.67.222.222<br>
208.67.220.220<br><br>

<h4>Google public dns servers</h4>
8.8.8.8<br>
8.8.4.4<br><br>

<h4>Scrubit public dns servers</h4>
67.138.54.100<br>
207.225.209.66<br><br>

<h4>Servermatrix public dns servers</h4>
216.185.111.10<br>
69.56.222.10<br>
67.19.0.10<br>
67.19.1.10<br>
70.84.160.11<br><br>

<h4>vnsc-pri.sys.gtei.net public dns servers</h4>
4.2.2.1<br>
4.2.2.2<br>
4.2.2.3<br>
4.2.2.4<br>
4.2.2.5<br>
4.2.2.6<br><br>

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
