<?php
set_include_path ('.:includes:../includes:../../includes');
include 'header_cert_errors.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Library - SSL Errors</h3>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<br>
<h4>SSL Certificate Errors</h4>
<p>
There are several problems that can occur when installing and using certificates, Here are some common ones and how to fix them.
</p>

<br>
<p>

1. unable to verify the first certificate:<br>
This error means that the server certificate issuer certificate cannot be verified. This is done by comparing the issuer of the server certificate with known Root Ca's which is usually contain within a file or a directory. If the issuer that signed the server certificate is not present within these locations or that it can't link the certificate to a trusted root certificate most likely reason is that the server that presented the certificate did not also present their intermediate certificate that would link to the Root CA from within the file or directory.
<br>
Missing the intermediate certificate just means one of the certificates in between the server certificate and the root certificate is not installed on your server. You should contat the vendor that signed your CSR or who issued your server certificate, they will usually have directions or provides assistance in installing the missing certificate.
<p>

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
