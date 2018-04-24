<?php
$choice = $_POST["tool_option"];

$ptrtxt = "PTR-records map IP addresses to domain names (reverse of A-records). A PTR-record's name is the IP address written in backward order with in-addr.arpa. appended to the end. As an example, looking up the domain name for IP address 1.2.3.4 is done through a query for the PTR-record for 4.3.2.1.in-addr.arpa."; 

$quote = "<p>Quote from Google</p><p>Google assigns a numeric weighting from 0-10 for each webpage on the Internet; this PageRank denotes a site.s importance in the eyes of Google. The PageRank is derived from a theoretical probability value on a logarithmic scale like the Richter Scale. The PageRank of a particular page is roughly based upon the quantity of inbound links as well as the PageRank of the pages providing the links. </p><br>
<p>
It is known that other factors, e.g. relevance of search words on the page and actual visits to the page reported by the Google toolbar also influence the PageRank. In order to prevent manipulation, spoofing and Spamdexing, Google provides no specific details about how other factors influence PageRank.</p>";

$iptips = "
<br>
<h4>Tips</h4>
1. Use the IP information tool below to find out contact, owner informatioan about the IP.<br>
2. Use the Whois Lookup tool below to find the Owner of the IP address or domain.<br>
3. Use the <a href=index.php>Traceroute Tool</a> to find the ASN (Autononmours System Numbers)<br> of the routers enroute to the  IP address or Domain.<br>
";

if ( $choice == "trace" ) {
	set_include_path ("/var/www/html/fixyourip.com/");
	include 'includes/header.inc';
	include 'includes/page_header.inc';
		$name = $_POST["ip"];

		echo "<h4>Traceroute results for $name</h4>";
		echo "Traceroute Path also shows AS of each router";
		echo "<br><br>";
		echo "<pre>";
		print_r (system('apps/nettools.sh tracenet '.$name.''));
		echo "</pre>";
		echo $iptips;

	include 'includes/page_footer.inc';
	include 'includes/lookups.inc';
	include 'includes/adds/google_add.inc';
	include 'includes/footer.inc';
}

if ( $choice == "ssl" ) {
        set_include_path ("/var/www/html/fixyourip.com/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];

                echo "<h4>Certificate Validity for $name</h4>";
                echo "<br><br>";
                echo "<pre>";
                echo shell_exec('apps/nettools.sh valid_cert '.$name.'');
                echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}


if ( $choice == "rbllookup" ) {
	set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];

		echo "<h4>Real Time BlackList (RBL) Database Check</h4>";
                echo "<pre>";
                print_r (system ('apps/checkrbl.sh rbl '.$name.''));
                echo "</pre>";

                echo "<br>";
        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "ping" ) {
	set_include_path ("/var/www/html/fixyourip.com/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];

                echo "<h4>Pinging $name</h4>";
		echo "<pre>";
		print_r (system('ping -c 5 '.$name.''));
		echo "</pre>";
		echo "<h4>&nbsp;</h4>";
		echo "<p>If there's no response the IP address is either down or is behind a Firewall that is";
		echo "blocking ICMP ECHO_REQUEST packets.</p>";
		echo $iptips;

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "route" ) {
        set_include_path ("/var/www/html/fixyourip.com/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];

                echo "<h4>Route Information for $name</h4>";
		echo "<pre>";
		// experimtantal try Uwhois.com.
		echo shell_exec('apps/nettools.sh routeinfo '.$name.'');
		echo "</pre>";
                echo "<br>";

		echo "<h4>ASN Information for $name</h4>";
                echo "<pre>";
                echo shell_exec('apps/nettools.sh getasn '.$name.'');
                echo "</pre>";
                echo "<br>";

		echo "<h4>ASN Peer Information for $name</h4>";
                echo "<pre>";
                echo shell_exec('apps/nettools.sh getasnpeer '.$name.'');
                echo "</pre>";
                echo "<br>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "asn" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];

		echo "<h4>ASN Information for</b> - $name</h4>" ;
		echo "<pre>";
		echo shell_exec('apps/nettools.sh getasn '.$name.'');
		echo "<br><br>";
		echo "</pre>";

		echo "<h4>ASN Peer Information for $name</h4>" ;
		echo "<pre>";
		echo shell_exec('apps/nettools.sh getasnpeer '.$name.'');
		echo "<br><br>";
		echo "</pre>";

		echo "<p>";
		echo "<font size=3><b>INFO</b></font><br><br>";
		echo " ASN - Autonomous Systems Number is a unique identifier issued by Internet Assigned Numbers Authority to each network (Domain). An ASN number is assigned to a single or a group of routing hardware, ASN numbers are key in BGP routing.";
		echo "</p>";
		echo "<br><br>";
		
        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "whois" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["whois"];

                echo "<h4>Whois Information for $name</h4>" ;
		echo "<pre>";
		echo shell_exec('apps/nettools.sh whois '.$name.'');
		echo "</pre>";
                echo "<br>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "scan" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];

                echo "<h4>Scanning Ports (21,23,25,80,443,8080) on $name</h4>" ;
		echo "<pre>";
		echo shell_exec('apps/nettools.sh scan '.$name.'');
		echo "</pre>";
		echo "<br><br>";

		echo $iptips;

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "abuse" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                $name = $_POST["abuse"];
		echo "<pre>";
		echo shell_exec('apps/ipreport.sh '.$name.'');
		echo "</pre>";
                echo "<br>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "reverseip" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                $name = $_POST["ip"];
                echo "<h4>$name resolves to</h4>";
		echo "<pre>";
		echo shell_exec('apps/nettools.sh reverseip '.$name.'');
		echo "</pre>";
                echo "<br>";

		echo "<h4>&nbsp;</h4>";
                echo "<font size=3><b>INFO</b></font><br>";
                echo "<h4>&nbsp;</h4>";
		echo $ptrtxt;

		echo $iptips;

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "ipcheck" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                $name = $_POST["ip"];
                echo "<pre>";
                echo shell_exec('apps/ipreport.sh '.$name.'');
                echo "</pre>";

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "malware" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                $name = $_POST["hash"];
		echo "<h4>Malware Information for</b> - $name</h4>";
		echo "<pre>";
		echo shell_exec('whois -h hash.cymru.com " -v '.$name.'" ');
		echo "<br><br>";
		echo "</pre>";
		
		echo "<p>";
		echo "<font size=3><b>INFO</b></font><br><br>";
		echo "If NO_DATA appears after you md5 hash ($name) then your file is not listed in the Malware database.<br>";
		echo " If you would like an alternate site to check upload your file to this link <a href=http://www.virustotal.com target=_window>www.virustotal.com</a>.";
		echo "</p>";

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "spf" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];

		echo "<h4>SPF Records for</b> - $name</h4>" ;
		echo "<pre>";
		echo shell_exec('apps/nettools.sh spf '.$name.'');
		echo "<br><br>";
		echo "</pre>";

		echo "<font size=3><b>INFO</b></font><br><br>";
		echo "<p>The Sender Policy Framework (SPF) is an open standard specifgying a technical method to prevent sender address forgery.<br>";
		echo "To find out more visit <a href=http://www.openspf.org target=_window>www.openspf.org</a>.";
		echo "</p>";
		echo $iptips;
		echo "<br>";

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "pagerank" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];

		echo "<h4>Page Rank Information for</b> - $name</h4>";
		echo "<pre>";
                echo shell_exec(system('apps/nettools.sh pagerank '.$name.''));
                echo "</pre>";

		echo "<h4>&nbsp;</h4>";
                echo "<font size=3><b>INFO</b></font><br>";
                echo "<h4>&nbsp;</h4>";
		echo $quote;

		echo $iptips;

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "webhost" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];
		
		echo "<h3>Hosting Provider Information</h3>";
		echo "<pre>";
		echo shell_exec('apps/webreport.sh '.$name.'');
		echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "mailcert" ) {
        set_include_path ("/var/www/html/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["mailcert"];

		echo "<h4><b>Mail Certificate Information for $name </b></h4>";
                echo "<pre>";
               //echo shell_exec('apps/mailcert_check.sh '.$name.'');
                echo shell_exec('apps/nettools.sh cert '.$name.'');
                echo "</pre>";

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "webcert" ) {
        set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["webcert"];

                echo "<h4><b>Web Certificate for $name </b></h4>";
                echo "<pre>";
                echo shell_exec('apps/nettools.sh webcert '.$name.'');
                echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "resolveip" ) {
        set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
                $name = $_POST["ip"];
		
                echo "<h4><b>Information for $selected </b></h4>";
		echo "<pre>";
		echo shell_exec('apps/nettools.sh ipcheck '.$name.'');
		echo "<br><br>";
		echo "</pre>";

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "cert" ) {
        set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';
	$cert = $_POST["cert"];	
		echo "<pre>";
                $tempfile = tempnam("/tmp","");
                $handle = fopen($tempfile,"w");
                fwrite($handle, $cert);
                echo shell_exec('/var/www/html/fixyourip/library/openssl/convert_openssl.sh '.$tempfile.'');
		echo "<br><br>";
                echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "dnspropogate" ) {
	 set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

	$name = $_POST["ip"];
		echo "<pre>";
		echo shell_exec('apps/dnspropogationcheck.sh '.$name.'');
		echo "<br><br>";
		echo "</pre>";

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "zone" ) {
         set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

        $name = $_POST["zone"];
                echo "<pre>";
                echo shell_exec('/usr/bin/zonecheck --verbose=i,x,d '.$name.'');
                echo "<br><br>";
                echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

if ( $choice == "dnstracer" ) {
         set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

        $name = $_POST["dnstracer"];
                echo "<pre>";
                echo shell_exec('/usr/bin/dnstracer -r 1 -o '.$name.'');
                echo "<br><br>";
                echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/adds/google_add.inc';
        include 'includes/footer.inc';
}

?>
