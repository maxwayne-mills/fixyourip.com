<?php
set_include_path ('.:../includes:../../includes');
?>

<?php
include 'header_whois.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Library - Whois Lookup</h3>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<br>
<h4>Whois</h4>
<p>
Whois Servers only contain information for top-level domains, not sub-domains or hostnames like www, ftp, pop or imap as these would be servers within the domain.<br>
<br>
The shared registration whois lookup model contains registrars who maintain name contact information for each registered domain, IP address and or a autonomous system number on the internet. If a domain is not found that domain is free to use and can be registered by you.
</p>
<br>
All unix based clients have a whois client, windows based workstations and servers don't have any whos clients. Fixyourip provides a web based interface for users who don't have accesss to a whois client and whoever needs to find out information about domains, IP address or autonomous system numbers quickly and conveniently.<br>

<br>
In the modern internet age whois information can be either public or private, where the information is public the owner information and technical contact information can be obtained. In the case where the information is private only the registrar informaton can be obtained and the owner is a little harder to figure out.

<br><br>
<p>
Use the <b>Whois lookup</b> tool below to find information about your domain.
</p>
<br><br>
</p>

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
