#!/bin/sh

newfile=`echo "$1" | sed 's/[ ]*//g'` 
cert=$1
question=$cert
password=$2

usage(){
        # function to collect which options are chosen
        # stored in text file
        used="$1"
        month=`date | awk '{print $2}'`
        day=`date | awk '{print $3}'`
        file=/var/www/html/tmp/results/webuse_$month$day.txt
        echo "$used $question `date` " >> $file
}

echo "<h3>$(basename $cert) Certificate Digital Thumbprints</h3>"
openssl pkcs12 -nomacver -nokeys -clcerts -in $cert -passin pass:$password | openssl x509 -sha1 -fingerprint -noout
openssl pkcs12 -nomacver -nokeys -clcerts -in $cert -passin pass:$password | openssl x509 -md5 -fingerprint -noout
openssl pkcs12 -nomacver -nokeys -clcerts -in $cert -passin pass:$password | openssl x509 -md4 -fingerprint -noout

echo ""
echo "<h3>$(basename $cert) Certificate Purpose</h3>"
openssl pkcs12 -nomacver -nokeys -clcerts -in $cert -passin pass:$password | openssl x509 -purpose -noout -nameopt multiline,-align

echo ""
echo "<h3>$(basename $cert) Certificate Public Key</h3>"
openssl pkcs12 -nomacver -nokeys -clcerts -in $cert -passin pass:$password| openssl x509 -pubkey -noout


echo ""
echo "<h3>$(basename $cert) Certificate Details</h3>"
openssl pkcs12 -nomacver -nokeys -clcerts -in $cert -passin pass:$password | openssl x509 -text -noout -nameopt multiline


echo ""
echo "<h3>Client Certificate </h3>"
openssl pkcs12 -nomacver -nokeys -clcerts -in $cert -passin pass:$password

echo ""
echo "<h3>Certificate Authority(s)</h3>"
openssl pkcs12 -nomacver -nokeys -cacerts -in $cert -passin pass:$password


# Cleanup
rm $cert

usage display_cert 
