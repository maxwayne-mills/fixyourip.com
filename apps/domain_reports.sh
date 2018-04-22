#!/bin/sh -x
# DNS Report of a given domain

domain="$1"
backcolor="#CCFFCC"
backcolor2="#CCCCFF"
domain="$1"
ip_address=$(dig +short -ta $domain)

usage(){
        # function to collect which options are chosen
        # stored in text file
        used="$1"
        month=`date | awk '{print $2}'`
        day=`date | awk '{print $3}'`
        file=/var/www/html/tmp/results/webuse_$month$day.txt
        echo "$0 $domain" >> $file
}

echo "<h3>Domain Report</h3>"

echo "<table border=0 cellpadding=4 cellspacing=4>"
echo "<tr bgcolor=$backcolor2>"
	echo "<td>Domain</td>"
	echo "<td>$domain</td>"
	echo "<td>Information</td>"
echo "</tr>"

echo "<tr bgcolor=$backcolor>"
	echo "<td>Registrar</td>"
	echo "<td>$(whois $domain| egrep -i "\<whois server\>|\<registrar name\>|\<registered\>|\<Registered through\>|\<registrar of record\>|\<Registration Service Provided By\>|\<registrar\>" | awk 'BEGIN { FS = ":|" };{print $2}')</td>"
	echo "<td>Information</td>"
echo "</tr>"

echo "<tr bgcolor=$backcolor2>"
	echo "<td>Creation Date</td>"
	echo "<td>$(whois $domain | egrep -i "\<creation date\>|\<created on\>|\<Record created on\>|\<created on\>" | awk 'BEGIN { FS = ":|" };{print $1,$2}') </td>"
	echo "<td>Information</td>"
echo "</tr>"

echo "<tr bgcolor=$backcolor>"
	echo "<td>Expiration Date</td>"
	echo "<td>$(whois $domain | egrep -i "\<expiration date\>|\<expire\>|\<expires on\>|\<Record expires on\>|\<expiry date\>|\<record expires" | awk 'BEGIN { FS = ":|" };{print $1,$2}') </td>"
	echo "<td>Information</td>"
echo "</tr>"

echo "<tr bgcolor=$backcolor2>"
        echo "<td>IP Address</td>"
        echo "<td>$ip_address</td>"
	echo "<td>Information</td>"
echo "</tr>"
echo "<tr bgcolor=$backcolor>"
        echo "<td>Reverse IP Address - PTR record</td>"
        echo "<td>$(dig +short -x $ip_address)</td>"
	echo "<td>Information</td>"
echo "</tr>"

#echo "<tr bgcolor=$backcolor2>"
#        echo "<td>IP Owner Information</td>"
#        echo "<td>$(whois -h whois.cyberabuse.org -p 43 $domain| sed '/\[/d' | sed '/\%/d'| sed '/^$/d')</td>"
#	echo "<td>Information</td>"
#echo "</tr>"

echo "<tr bgcolor=$backcolor>"
	echo "<td>MX Records</td>"
	echo "<td>$(dig +short +answer -tmx $domain | sort)</td>"
	# check for 3 records
	nummx=`dig +short -tmx $domain | wc -l`
	if [ "$nummx" -lt 3 ];then
        	mxstatus="Fail"	
	else
       		mxstatus="Pass"
	fi
	echo "<td>$mxstatus</td>"
echo "</tr>"

echo "<tr bgcolor=$backcolor2>"
	echo "<td>Name Servers</td>"
	echo "<td>$(dig +short +answer -tns $domain | sort)</td>"
	# Check  for more than 3
	numns=`dig +short -tns $domain | wc -l`
	if [ "$numns" -lt 3 ];then
       		nsstatus="Fail" 
	else
        	nsstatus="Pass"
	fi
	echo "<td>$nsstatus</td>"
echo -n "</tr>"

echo "<tr bgcolor=$backcolor>"
	echo "<td>Website Address</td>"

	webcheck=$(dig +short -ta wwww.$domain)
	if [ $webcheck = "" ];then
		webstatus="Website not found"
	else
		webstatus="<a href=http://www.$domain target=new_window>www.$domain</a>"
	fi

	echo "<td>$webstatus </td>"
	echo "<td>Information</td>"
echo -n "</tr>"


#echo "<tr bgcolor=$backcolor>"
#	echo "<td>Name Server Serial Number Match</td>"
#	options=`dig +noall +answer -tns $domain | awk '{print $5}'`
#	if [ "$options" = "" ];then
#        	echo "No name servers found"
#	else
#        	names=`dig +short +answer -tns $domain | awk '{print $5}'`
#		echo "<td>"
#        	for n in `echo $names`
#        	do
#                	#Checking $n for SOA
#                	echo "$(dig @$n $domain soa +short)"
#        	done
#		echo "</td>"
#	fi
#	echo "<td>Status</td>"
#echo "<tr>"
	
echo -n "</table>"

echo "<table>"
echo -n "<tr>"
        echo "<td align=left>"
                echo "<form action=domain_report.php method=post>"
                echo "Domain Report <input type=text name=domain><input type=submit value=check>"
                echo "<input type=hidden name=tool_option value=domainreport>"
                echo "</form>"
        echo -n "</td>"
echo -n "</tr>"
echo -n "</table>"

usage
