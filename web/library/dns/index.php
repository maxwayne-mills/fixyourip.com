<?php
set_include_path('.:../includes:../../includes');
?>

<?php
include 'header_dns.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Library - DNS Records</h3>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<br>
<h4>NS Record</h4>
<p>
NS-records identify DNS servers responsible for a zone. A zone should contain one NS-record for each of its own DNS servers primary and secondaries. This mostly is used for zone transfer purposes. These NS-records have the same name as the zone in which they are located. The most important function of the NS-record is delegation. Delegation means that part of a domain is delegated to other DNS servers. For example all .com sub-names (such as fixyourip.com) are delegated from the com zone hosted by the InterNic. The com zone contains NS-records for all .com sub-names.
<br><br>
Check your NS record using the DNS tool at the bottom of the page
</p>


<br>
<h4>A Record</h4>
<p>
The A-record is the most basic and the most important DNS record type. They are used to translate human friendly domain names such as www.fixyourip.com into IP-addresses such as 66.34.227.100 machine friendly number. A-records are the DNS server equivalent of the hosts file - a simple domain name to IP-address mapping. A-records are not required for all computers, but is needed for any computer that shares resources on a network.
<br><br>
Check your A record using the DNS tool at the bottom of the page
<br>
<font size=3>RFC <a href=http://www.ietf.org/rfc/rfc1035.txt target=_window>1035</a></font>
</p>

<br>
<h4>MX Record</h4>
<p>
An <b>MX</b> or <b>Mail exchange record</b> is a DNS resource record that specifies how e-mail is routed for domains using the SMTP protocol. Each MX record priority with the hostname indicates which servers will receive email first for that particular domain. <br><br>The server with the highest priority record will receive mail first with the next server below receiving second and so on. Equally weighted servers will receive email using DNS round robin.<br><br> Domains that don't have an MX record will not receive mail for that domain.
<br><br>
Check your MX record using the DNS tool at the bottom of the page
</p>

<br>
<h4>Canonical Name - Cname</h4>
<p>
Canonical name, also referred to as a CNAME record, a record in a DNS database that indicates the true, or canonical, host name of a computer that its aliases are associated with. A computer hosting a Web site must have an IP address in order to be connected to the World Wide Web. The DNS resolves the computer.s domain name to its IP address, but sometimes more than one domain name resolves to the same IP address, and this is where the CNAME is useful. A machine can have an unlimited number of CNAME aliases, but a separate CNAME record must be in the database for each alias.
<br><br>
Need to verify if you set up your cname record correctly for using google apps or to just check your CNAME record use the DNS tool at the bottom of the page.
<br><br>
</p>

<br>
<h4>TXT Record</h4>
<p>
A TXT (text) record is used to hold some text information. You can put virtually any free text you want within a TXT record. A TXT record has a hostname so that you can assign the free text to a particular hostname/zone. The most common use for TXT records is to store SPF (sender policy framework) records and to prevent emails being faked to appear to have been sent from you.
<br><br>
Check your TXT record using the DNS tool at the bottom of the page
</p>

<br>
<h4>HINFO Record</h4>
<p>
A HINFO-record specifies the host - server's type of CPU and operating system. This information can be used by application protocols such as FTP, which use special procedures when communicating with computers of a known CPU and operating system type. Standard CPU and operating system types are defined in RFC1700 Page 206 - 214. The standard for a Windows PC is INTEL-386 - WIN32
<br><br>
Check your Hinfo record using the DNS tool at the bottom of the page
</p>

<br>
<h4>PTR Record</h4>
<p>
PTR-records map IP addresses to domain names (reverse of A-records). A PTR-record's name is the IP address written in backward order with in-addr.arpa. appended to the end. As an example, looking up the domain name for IP address 2.2.3.4 is done through a query for the PTR-record for 4.3.2.1.in-addr.arpa.
<br><br>
Check your PTR record using the DNS tool at the bottom of the page
</p><br>


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
