<?php
set_include_path ('.:../includes:../../includes');
include 'display_cert.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Display Certificate - Decode Certificate</h3>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<table>
<tr>
<td align=left>
                <form action=convert_openssl.php method=post>
		<p>
		<pre>
Enter Your Encrypted Certificate

The PEM format uses the header and footer lines:

-----BEGIN CERTIFICATE----
-----END CERTIFICATE----

it will also handle files containing:
-----BEGIN X509 CERTIFICATE----
-----END X509 CERTIFICATE----

Trusted certificates have the lines
-----BEGIN TRUSTED CERTIFICATE----
-----END TRUSTED CERTIFICATE----

Copy your certicate contents, including one of the matching set of lines above.
		</pre>
		</p>
                <br>
                <textarea rows=20 cols=65 name=cert>
		</textarea>
		<br>
		<input type=reset value=reset>
                <input type=submit value=check>
                <br><br>
                </form>
		<p>
		Decode and view the contents of your SSL/TLS certificates using this tool.
		<ul>
		<li>View certificate Digital Thumbprint
		<li>View The issuer of the certificate
		<li>View the Subject of the Certificate
		<li>View certificate expiry date
		<li>View the purpose of the certifcate
		<li>View certifcate public key
		</ul>
		</p>
	</td>
</tr>
</table>

<?php
       echo "</td>";
echo "</tr>";
echo "</table>";

include 'cert_lookup.inc';
include 'lookups.inc';
include 'adds/google_add.inc';
echo "</center>";
include 'footer.inc';
?>
