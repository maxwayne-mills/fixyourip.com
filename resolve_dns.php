<?php
set_include_path ("/var/www/fixyourip.com/");
$choice = $_POST["dns_options"];
$webforminput = $_POST["ip"];
$selected = escapeshellcmd($webforminput);


$mxtext = "An <b>MX</b> or <b>Mail exchange record</b> is a DNS resource record that specifies how e-mail is routed for domains using the SMTP protocol. Each MX record priority with the hostname indicates which servers will receive email first for that particular domain. <br><br>The server with the highest priority record will receive mail first with the next server below receiving second and so on. Equally weighted servers will receive email using DNS round robin.<br><br> Domains that don't have an MX record will not receive mail for that domain.";

$cnametxt = "Short for canonical name, also referred to as a CNAME record, a record in a DNS database that indicates the true, or canonical, host name of a computer that its aliases are associated with. A computer hosting a Web site must have an IP address in order to be connected to the World Wide Web. The DNS resolves the computer.s domain name to its IP address, but sometimes more than one domain name resolves to the same IP address, and this is where the CNAME is useful. A machine can have an unlimited number of CNAME aliases, but a separate CNAME record must be in the database for each alias.";

$txttext = "A TXT (text) record is used to hold some text information. You can put virtually any free text you want within a TXT record.
A TXT record has a hostname so that you can assign the free text to a particular hostname/zone. The most common use for TXT records is to store SPF (sender policy framework) records and to prevent emails being faked to appear to have been sent from you.";

$nstxt = "<p>NS-records identify DNS servers responsible for a zone. A zone should contain one NS-record for each of its own DNS servers primary and secondaries. This mostly is used for zone transfer purposes. These NS-records have the same name as the zone in which they are located. But the most important function of the NS-record is delegation. Delegation means that part of a domain is delegated to other DNS servers. For example all .com sub-names (such as fixyourip.com) are delegated from the com zone hosted by the InterNic. The com zone contains NS-records for all .com sub-names.";

$atxt = "The A-record is the most basic and the most important DNS record type. They are used to translate human friendly domain names such as www.fixyourip.com into IP-addresses such as 64.34.227.100 machine friendly number. A-records are the DNS server equivalent of the hosts file - a simple domain name to IP-address mapping. A-records are not required for all computers, but is needed for any computer that shares resources on a network."; 

$hinfotxt = "A HINFO-record specifies the host - server's type of CPU and operating system. This information can be used by application protocols such as FTP, which use special procedures when communicating with computers of a known CPU and operating system type. Standard CPU and operating system types are defined in RFC1700 Page 206 - 214. The standard for a Windows PC is INTEL-386 - WIN32.";

$iptips = "
<br><br>
<h4>Tips</h4>
1. Use the IP information tool below to find out contact, owner informatioan about the IP.<br>
2. Use the Whois Lookup tool below to find the Owner of the IP address or domain.<br>
3. Use the <a href=index.php>Traceroute Tool</a> to find the ASN (Autononmours System Numbers)<br> of the routers enroute to the  IP address or Domain.<br>
";

$option = array (
	"a" => "A record",
	"all" => "All record",
	"mx" => "MX record",
	"soa" => "Start Of Authority",
	"ns" => "Name Servers",
	"cname" => "Cname",
	"aaaa" => "AAAA Records",
	"txt" => "txt",
	"hinfo" => "Hinfo",
	"ptr" => "PTR",
	"any" => "any",
	);

if ($choice == "a") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

		echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
                echo "<br>";
                echo "</pre>";

		echo "<pre>";
		echo shell_exec('apps/nettools.sh arecord '.$selected.'');
		echo "<br><br>";
		echo "<g:plusone></g:plusone>";
		echo "</pre>";
		
		echo "<h4>&nbsp;</h4>";
                echo "<font size=3><b>INFO</b></font><br>";
		echo "<h4>&nbsp;</h4>";
		echo $atxt;
		echo "<br><br>";
                echo "<font size=3>RFC <a href=http://www.ietf.org/rfc/rfc1035.txt target=_window>1035</a></font>";
		echo $iptips;
		
	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
	}

if ($choice == "ptr") {
        set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
                echo "<br>";
		echo "<g:plusone></g:plusone>";
                echo "</pre>";

                echo "<pre>";
                echo shell_exec('apps/nettools.sh arecordreverse '.$selected.'');
                echo "<br><br>";
                echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
        }



if ($choice == "srv") {
        set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
                echo "<br>";
                echo "</pre>";

                echo "</pre>";
                echo "<h4><b>SRV Records for $selected </b></h4>" ;
                echo "<pre>";
                echo shell_exec('apps/nettools.sh srvrecord '.$selected.'');
                echo "<br><br>";
                echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
        }

if ($choice == "any") {
        set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
                echo "<br>";
		echo "<g:plusone></g:plusone>";
                echo "</pre>";

                echo "</pre>";
                echo "<h4><b>Any Records for $selected </b></h4>" ;
                echo "<pre>";
                echo shell_exec('apps/nettools.sh any_record '.$selected.'');
                echo "<br><br>";
                echo "</pre>";

        include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
        }


if ($choice == "all") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
                echo "<br>";
		echo "<g:plusone></g:plusone>";
                echo "</pre>";

                echo "<pre>";
                echo shell_exec('apps/nettools.sh arecord '.$selected.'');
		echo "<br>";
                echo "</pre>";

                echo "<h4>TXT Records for $selected</h4>" ;
		echo "<pre>";
                echo shell_exec(escapeshellcmd('apps/nettools.sh txtrecord '.$selected.''));
		echo "<br>";
                echo "</pre>";

		echo "<pre>";
                echo "<h4>MX records for $selected</h4>";
                echo shell_exec('apps/nettools.sh mxrecord '.$selected.'');
                echo "<br>";
                echo "</pre>";

                echo "<pre>";
                echo "<h4><b>A Records for MX</b></h4>" ;
                echo shell_exec('apps/nettools.sh convertmx '.$selected.'');
                echo "<br>";
                echo "</pre>";

		echo "<pre>";
                echo "<h4><b>Reverse DNS records for IP address('s)</b></h4>" ;
                echo shell_exec('apps/nettools.sh reversemxip '.$selected.'');
                echo "<br>";
		echo "<g:plusone></g:plusone>";
                echo "</pre>";

		echo $iptips;

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
        }

if ($choice == "mx") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

		echo "<pre>";
		echo "<h3>DNS Resolution Path</h3>";
		echo shell_exec('apps/nettools.sh search '.$selected.'');
		echo "<g:plusone></g:plusone>";
		echo "<br>";
		echo "</pre>";

		echo "<pre>";
		echo "<h3>MX records for $selected</h3>";
		echo shell_exec('apps/nettools.sh mxrecord '.$selected.'');
		echo "<br>";
		echo "</pre>";

		echo "<pre>";
		echo "<h4><b>A Records for $choice</b></h4>" ;
		echo shell_exec('apps/nettools.sh convertmx '.$selected.'');
		echo "<g:plusone></g:plusone>";
		echo "<br>";
                echo "</pre>";

		echo "<pre>";
                echo "<h4><b>Reverse DNS records for IP address('s)</b></h4>" ;
                echo shell_exec('apps/nettools.sh reversemxip '.$selected.'');
                echo "<br>";
                echo "</pre>";
		
		echo "<h4>&nbsp;</h4>";
		echo "<font size=3><b>INFO</b></font><br>";
		echo "<h4>&nbsp;</h4>";
		echo $mxtext;
		echo "<br><br>";
                echo "<font size=3>RFC <a href=http://www.ietf.org/rfc/rfc1035.txt target=_window>1035</a></font>";
		echo $iptips;

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
	include 'includes/add1.inc';
	include 'includes/footer.inc';
	echo "</center>";
	}

if ($choice == "soa") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

		echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
		echo "<g:plusone></g:plusone>";
                echo "<br>";
                echo "</pre>";

                echo "<h4><b>$choice Records for $selected </b></h4>" ;
		echo "<pre>";
		echo shell_exec('apps/nettools.sh soa '.$selected.'');
		echo "<g:plusone></g:plusone>";
		echo "</pre>";

		echo "<h4>&nbsp;</h4>";
                echo "<font size=3><b>INFO</b></font>";
		echo $iptips;

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
	}

if ($choice == "ns") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

		echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
		echo "<g:plusone></g:plusone>";
                echo "<br>";
                echo "</pre>";

		echo "<pre>";
                echo "<h4><b>$selected NS records</b></h4>" ;
                echo shell_exec('apps/nettools.sh getns '.$selected.'');
		echo "<g:plusone></g:plusone>";
		echo "<br>";
                echo "</pre>";

		echo "<pre>";
                echo "<h4><b>$selected NS records Locations</b></h4>" ;
                echo shell_exec('apps/nettools.sh nsiplocation '.$selected.'');
		echo "<g:plusone></g:plusone>";
                echo "</pre>";

                echo "<h4>&nbsp;</h4>";
		echo "<font size=3><b>INFO</b></font>";
                echo "<h4>&nbsp;</h4>";
                echo $nstxt;
                echo "<br><br>";
                echo "<font size=3>RFC <a href=http://www.ietf.org/rfc/rfc1035.txt target=_window>1035</a></font>";
		echo $iptips;

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
	}

if ($choice == "cname") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

		echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
                echo "<br>";
                echo "</pre>";

                echo "<h4><b>$choice Records for $selected </b></h4>" ;
		echo "<pre>";
		echo shell_exec('apps/nettools.sh crecord '.$selected.'');
		echo "</pre>";
		echo "<h4>&nbsp;</h4>";
                echo "<font size=3><b>INFO</b></font>";
                echo "<h4>&nbsp;</h4>";
		echo $cnametxt;
		echo "<br><br>";
		echo "<font size=3>RFC <a href=http://www.ietf.org/rfc/rfc1035.txt target=_window>1035</a></font>";
		echo $iptips;

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
	}

if ($choice == "txt") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

		echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
                echo "<br>";
                echo "</pre>";
		
                echo "<h4><b>$choice Records for $selected </b></h4>" ;
                echo "<pre>";
                echo shell_exec(escapeshellcmd('apps/nettools.sh txtrecord '.$selected.''));
                echo "</pre>";
                echo "<h4>&nbsp;</h4>";
                echo "<font size=3><b>INFO</b></font>";
                echo "<h4>&nbsp;</h4>";
		echo $txttext;
		echo "<br><br>";
		echo "<font size=3>RFC <a href=http://www.ietf.org/rfc/rfc1035.txt target=_window>1035</a></font>";
		echo "<br>";
		echo "<font size=3>Additional Information <a href=http://www.ietf.org/rfc/rfc1918.txt target=_window>RFC 1918</a></font>";
		echo $iptips;

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
        }

if ($choice == "aaaa") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

                echo "<h4><b>$choice Records for $selected </b></h4>" ;
                echo "<pre>";
                echo shell_exec('host -t aaaa '.$selected.'');
                echo "</pre>";
                echo "<h4>&nbsp;</h4>";
                echo "<font size=3><b>INFO</b></font>";
                echo "<h4>&nbsp;</h4>";

	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
        }

if ($choice == "hinfo") {
	set_include_path ("/var/www/fixyourip/");
        include 'includes/header.inc';
        include 'includes/page_header.inc';

		echo "<pre>";
                echo "<h3>DNS Resolution Path</h3>";
                echo shell_exec('apps/nettools.sh search '.$selected.'');
                echo "<br>";
                echo "</pre>";

                echo "<h4><b>$choice Records for $selected </b></h4>" ;
                echo "<pre>";
                echo shell_exec('host -t hinfo '.$selected.'');
                echo "</pre>";

		echo "<h4>&nbsp;</h4>";
		echo "<font size=3><b>INFO</b></font><br>";
		echo "<h4>&nbsp;</h4>";
                echo $hinfotxt;
		echo "<br><br>";
		echo "<font size=3>Additional Information <a href=http://www.ietf.org/rfc/rfc1918.txt target=_window>RFC 1918</a></font>";
		echo $iptips;	
	include 'includes/page_footer.inc';
        include 'includes/lookups.inc';
        include 'includes/add1.inc';
        include 'includes/footer.inc';
        echo "</center>";
        }
?>
