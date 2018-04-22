#!/bin/sh -xv

# Dependency: expect - installed using from yum

server=$1

mailcert(){
REMHOST=$server
REMPORT=25
certfile=/etc/pki/tls/cert.pem
options="-starttls smtp -crlf -connect"
options2="-starttls smtp -crlf -showcerts -connect"

	echo ""
        echo "<h3>Certificate Report:</h3>"
        echo | openssl s_client $options2 ${REMHOST}:$REMPORT | sed -ne '/-----BEGIN CERTIFICATE-----/,/-----END CERTIFICATE-----/p' | openssl x509 -text -noout -nameopt multiline
        echo ""
        echo "<h3>Connection details:</h3>"
        echo | openssl s_client $options2 ${REMHOST}:$REMPORT -CAfile $certfile
        echo ""
        echo "<b>Verify return code of 0 is good</b>" 
	echo "Read more about SSL/TLS <a href=/library/openssl/ssl_errors.php>errors</a>"
        echo "View certificate Bundle <a href=/library/openssl/rootcas.php>Root Certificates</a>."
        echo "Learn more about <a href=/library/openssl/certificates.php>Certificates</a>."
}

mailsrv(){
port=25
/usr/bin/expect -c "
	set timeout 6
	eval spawn telnet -E $server $port
	expect {
		default {exit 2}
		\"connection refused\" {exit 2} 
		\"220 *\" {
				send \"ehlo www.fixyourip.com\n\"
				set status $expect_out(buffer)
				expect {
					\"250-STARTTLS\" {
								send quit
								exit
								}
					}
			}
		}
	return $status
	close
"
}


if [ "$1" = "" ];then
	echo "No IP or Server Name entered"
else
	echo $status
	mailsrv
	status=$($?)
	echo $status
	if [ "$status" == "0" ];then
		mailcert $server
	else
		echo ""
		echo "Could not connect to $server"
		echo ""
		echo "<h3>Problem Report</h3>"
		echo "1. Either there's a firewall (ACL Rule) that is blocking port 25 access to www.fixyourip.com"
		echo "2. $server does not support TLS over smtp"
		echo "3. $server is not listening on port 25"
		echo ""
		echo "<h3>Solution</h3>"
		echo "Allow port 25 access to IP address $(dig +short www.fixyourip.com)"
		echo "Enable $server to support tls on port 25, contact you mail server vendor."
	fi
fi	
