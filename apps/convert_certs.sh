#!/bin/sh -vx
# Created Febuary 15 2011
## Clarence Mills

file=$1
cert=$file

usage(){
        # function to collect which options are chosen
        # stored in text file
        used="$1"
        month=`date | awk '{print $2}'`
        day=`date | awk '{print $3}'`
        file=/var/www/html/tmp/results/webuse_$month$day.txt
        echo "$used $file `date` " >> $file
	}

cert_summary(){

	echo "<h3>Certificate Digital Thumbprints</h3>"
	cat "$cert" | openssl x509 -sha1 -fingerprint -noout
	cat $cert | openssl x509 -md5 -fingerprint -noout
	cat $cert | openssl x509 -md4 -fingerprint -noout

	echo ""
	echo "<h3>Certifcate Validity</h3>"
	cat $cert | openssl x509 -noout -startdate -enddate

	# Show if the certificate is expiring
	/usr/bin/ssl-cert-check -c $cert

	echo ""
	echo "<h3>Certificate Authority who signed certificate</h3>"
	cat $cert | openssl x509 -noout -issuer -nameopt multiline

	echo ""
	echo "<h3>Certificate Owner</h3>"

	cat $cert | openssl x509 -noout -subject -nameopt multiline
	cat $cert | openssl x509 -text -noout |grep -i dns

	echo ""
	echo "<h3>Certificate Purpose</h3>"
	cat $cert | openssl x509 -purpose -noout -nameopt multiline,-align

	cat $cert | openssl x509 -days 30 -noout
	cat $cert | openssl x509 -alias -noout

	echo ""
	echo "<h3>Certificate Public Key</h3>"
	cat $cert | openssl x509 -pubkey -noout
	echo ""
	}


if [ "$1" = "" ];then
	echo "Need to enter a certificate filename"
else
	file=$1

	pkcs7(){
	echo "<h3>Certificate Digital Thumbprints</h3>"
	openssl pkcs7 -in $file -print_certs | openssl x509 -sha1 -fingerprint -noout
	openssl pkcs7 -in $file -print_certs | openssl x509 -md5 -fingerprint -noout
	openssl pkcs7 -in $file -print_certs | openssl x509 -md4 -fingerprint -noout

	echo ""
	echo "<h3>Certifcate Validity</h3>"
	openssl pkcs7 -in $file -print_certs | openssl x509 -noout -startdate -enddate

	# Show if the certificate is expiring
	/usr/bin/ssl-cert-check -c $cert

	echo ""
	echo "<h3>Certificate Authority who signed certificate</h3>"
	openssl pkcs7 -in $file -print_certs | openssl x509 -noout -issuer -nameopt multiline

	echo ""
	echo "<h3>Certificate Owner</h3>"

	openssl pkcs7 -in $file -print_certs | openssl x509 -noout -subject -nameopt multiline
	openssl pkcs7 -in $file -print_certs | openssl x509 -text -noout |grep -i dns

	echo ""
	echo "<h3>Certificate Purpose</h3>"
	openssl pkcs7 -in $file -print_certs | openssl x509 -purpose -noout -nameopt multiline,-align

	echo ""
	echo "<h3>Certificate Public Key</h3>"
	openssl pkcs7 -in $file -print_certs | openssl x509 -pubkey -noout

	echo ""
	echo "<h3>Detailed Certificate output</h3>"
	openssl pkcs7 -in $file -print_certs | openssl x509 -text -nameopt multiline
	}

	convert(){
	echo "<h3>Certificate Digital Thumbprints</h3>"
       	openssl x509 -inform der -in $file -outform pem | openssl x509 -sha1 -fingerprint -noout
        openssl x509 -inform der -in $file -outform pem | openssl x509 -md5 -fingerprint -noout
        openssl x509 -inform der -in $file -outform pem | openssl x509 -md4 -fingerprint -noout

        echo ""
        echo "<h3>Certifcate Validity</h3>"
        openssl x509 -inform der -in $file -outform pem | openssl x509 -noout -startdate -enddate

        # Show if the certificate is expiring
        /usr/bin/ssl-cert-check -c $cert

        echo ""
        echo "<h3>Certificate Authority who signed certificate</h3>"
        openssl x509 -inform der -in $file -outform pem | openssl x509 -noout -issuer -nameopt multiline

        echo ""
        echo "<h3>Certificate Owner</h3>"

        openssl x509 -inform der -in $file -outform pem | openssl x509 -noout -subject -nameopt multiline
        openssl x509 -inform der -in $file -outform pem | openssl x509 -text -noout |grep -i dns

        echo ""
        echo "<h3>Certificate Purpose</h3>"
        openssl x509 -inform der -in $file -outform pem| openssl x509 -purpose -noout -nameopt multiline,-align

        echo ""
        echo "<h3>Certificate Public Key</h3>"
        openssl x509 -inform der -in $file -outform pem | openssl x509 -pubkey -noout

        echo ""
        echo "<h3>Detailed Certificate output</h3>"
	openssl x509 -inform der -in $file -outform pem | openssl x509 -text -nameopt multiline
	}

	extension=$(echo $file | awk -F . '{print $NF}')
	if [ "$extension" = "p7b" -o "$extension" = "p7c" -o "$extension" = "pkcs7" -o "$extension" = "pk7" ];then
		echo "<h3>Converted: $(basename $1) from $extension to PEM</h3>"
		pkcs7
	elif [ "$extension" = "pem" -o "$extension" = "crt" -o "$extension" = "cer" ];then
		check=$(cat $file | grep -i "-begin certificate-")
		if [ "$check" == "" ];then
			echo "<h3>Converted: $(basename $1) from $extension format to PEM</h3>"
			convert
		else
			echo "<h3>Displaying: $(basename $1) Format = PEM </h3>"
			cert_summary
			cat $file | openssl x509 -text  -nameopt multiline
		fi
	else
		echo "<h3>Converted: $(basename $1) from $extension format to PEM</h3>"
		convert
	fi
fi

#Cleanup
rm $1

usage convert_cert
