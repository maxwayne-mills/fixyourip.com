<?php
set_include_path ('.:../includes:../../includes');
include 'header_cert.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Library - Types of Certificates</h3>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<br>
<h3>Intermediate Certificate</h3>
<p>
Any certificate between your certificate and the root certificate is called a chained or intermediate certificate. If you examine an intermediate certificate the "issuer:" and "subject" section of the certificate are not the same, the issuer section contains the certificate that signed the intermediate certificate. This intermediate certificate links your server certificate to the Root Certificate.
<br><br>
Check your Certificate using the Certificate Check tool at the bottom of the page
</p>

<br>
<h3>Unified Communications Certificate</h3>
<p>
A Unified Communications certificate, also known as  UC Certificate, or UCC Certificates is a new type of certificate developed primarily for use with Microsoft Exchange 2007 and Microsoft Office Communications Server 2007 products. The defining feature, and really the only thing that makes a UC Certificate different from a normal certificate, is the use of the Subject Alternative Name field in the certificate.
</p>
<br>

<p>
 In the Subject Alternative Name field, or SAN for short, any number of different domain names or common names can be entered enabling the certificate to work on any of the included domain names. This allows one certificate to secure both internal network names as well as external domain names.
<br><br>
Check your Certificate using the Certificate Check tool at the bottom of the page
</p>

<br>
<p>
For example, you could get one UC SSL Certificate to cover all of the following:
</p>

<br>
<p>
<ul>
<li>fixyourip.com
<li>www.fixyourip.com
<li>fixyourip.local
<li>autodiscover.fixyourip.com
<li>subdomain.fixyourip.com
</ul>
</p>

<br>
<h3>Wildcard Certificate</h3>

<p>
A wildcard certificate can be used for an unlimited number of first level sub domains on a single domain name. For example, you could get a wildcard certificate for use for *.fixyourip.com as the common name. This certificate would secure

<ul>
<li>www.abc.com
<li>mail.abc.com
<li>test.abc.com
<li>anything.abc.com.
</ul>
<br>
 Generally you can replace the asterisk (*) with any hostname.
</p>
<br>

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
