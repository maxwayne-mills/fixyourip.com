<?php
set_include_path ('.:../includes:../../includes');
include 'header_cert_howto.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Library - Openssl Howto</h3>";
		echo "<br>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>
<a name="top"></a>
<ol>
<li><a href="openssl_howto.php#displaycert">Display Certificate Subject Name in a readable format</a>
<li><a href="openssl_howto.php#verify">Verify Certificate Chain</a>
<li><a href="openssl_howto.php#viewpkcs12">View PKCS#12 file</a>
<li><a href="openssl_howto.php#convertpkcs12">Convert PKCS#12 to PEM format</a>
<li><a href="openssl_howto.php#viewpkcs7">View PKCS#7 certificates</a>
<li><a href="openssl_howto.php#convertpkcs7toder">Convert PKCS#7 to DER format</a>
<li><a href="openssl_howto.php#convertdertopem">Convert Certificate from DER to PEM format</a>
<li><a href="openssl_howto.php#thumbprint">Display Certificate's thumbprint</a>
</ul>
<br><br>

<a name="displaycert"><h4>Display Certificate Subject name in readable format</h4></a>
<p>
<b>openssl x509 -in CERTIFICATE_FILE -noout -subject -nameopt multiline,-lname,-align</b>
</p>
<br><br>
<a href="openssl_howto.php#top">Top</a>
<br><br>

<br>
<a name="verify"><h4>To verify a certificate chain</h4></a>
<p>
<b>openssl verify CERTIFICATE_FILE</b>
</p>
<br>
<p>
The file CERTIFICATE_FILE contain the intermediate certificate first and the servers certificate.
<br><br>
Check your Certificate using the Certificate Check tool at the bottom of the page
</p>
<br><br>
<a href="openssl_howto.php#top">Top</a>
<br><br>

</p>

<br>
<a name="viewpkcs12"><h4>To view a PKCS#12 file using openssl command</h4></a>
<b>openssl pkcs12 -in CertName.p12</b>
<br><br>
<p>
A PKCS#14 file contains the certificate, private key and all the intermediate certificate's in a certificate chain and is encrypted with a password.<br><br>
Alternatively use PKCS12 view <a href=/tools/ssltools.php>Tool</a><br>
</p>
<br><br>
<a href="openssl_howto.php#top">Top</a>
<br><br>

<a name="convertpkcs12"><h4>Convert PKCS#12 file to pem format using openssl command</h4></a>
<b>openssl x509 -inform der -in certname.p12 -out convertedfile</b>
<br><br>
<a href="openssl_howto.php#top">Top</a>
<br><br>

<br>
<a name="viewpkcs7"><h4>To view PKCS#7 files using openssl command</h4></a>
<p>
The PKCS #7 format enables the transfer of a certificate and all the certificates in its certification path from one computer to another, or from a computer to removable media. PKCS #7 files typically use the .p7b extension, and are compatible with the ITU-T X.509 standard
</p>
<br>
<br>
<b>openssl pkcs7 -in filename_containing_cert -print_certs -out cert.pem</b><br>
<br><br>
<a href="openssl_howto.php#top">Top</a>
<br><br>
<a name="convertpkcs7toder"><h4>Convert a PKCS#7 file from PEM to DER using openssl command</h4></a>
command: openssl pkcs7 -in filename_containing_cert -outform DER -out file.der
<br><br>
<a href="openssl_howto.php#top">Top</a>
<br><br>

<a name="convertdertopem"><h4>Convert a DER formatted certificate to PEM using openssl command</h4></a>
<br>
<b>openssl x509 -inform der -in certificate_file -outform pem -out newfilename.pem </b>
<br><br>
<b>To view the Der formatted file (*.crt, *.cer, *.der)</b><br>
<b>openssl x509 -inform der -in certificate_file -text</b>
<a href="openssl_howto.php#top">Top</a>
<br><br><br>

<a name="thumbprint"><h4>Display Certificate Thumbprint</h4></a>
To display certificate thumbprint using open source software namely openssl <br><br>

1. <b>openssl x509 -in CERTIFICATE_FILE -noout -sha1 -fingerprint</b><br>
2. <b>openssl x509 -in CERTIFICATE_FILE -noout -fingerprint</b><br><br>
<br><br>
Note:replace <b>CERTIFICATE_FILE</b> with the actual file which contains the certificate<br><br>

<b>If you don't have access to openssl use the thumbprint viewer <a href="/tools/openssl_display.php">tool</a>.</b>

<br>
<a href="openssl_howto.php#top">Top</a>
<br><br>

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
