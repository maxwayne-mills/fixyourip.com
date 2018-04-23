<?php
set_include_path (".:includes:../includes");
include 'header_ip.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Library - Fix Your IP Address</h3>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<br>
<h4>Check Your IP on Windows XP and Vista</h4>
<p>
To check what IP address is assigned to your windows workstation
</p>
<br>

<p>
WinXP / Vista command:<b>ipconfig</b>
will dispaly all configured interfaces on your workstation.<br>
<br>
output:
</p>
<pre>
Windows IP Configuration

Wireless LAN adapter Wireless Network Connection:

   Connection-specific DNS Suffix  . : Belkin
   Link-local IPv6 Address . . . . . : fe80::d988:a1af:c8e6:559d%12
   IPv4 Address. . . . . . . . . . . : 192.168.2.2
   Subnet Mask . . . . . . . . . . . : 255.255.255.0
   Default Gateway . . . . . . . . . : 192.168.2.1

Ethernet adapter Local Area Connection:

   Media State . . . . . . . . . . . : Media disconnected
   Connection-specific DNS Suffix  . : Belkin
</pre>
<br>
The output above shows two interfaces "Wireless LAN adapter" and "Ethernet adapter Local" attached to wireless connection and LAN connection. <br><br>

<h4>Renew Your IP Address on windows XP/VISTA</h4>
<p>
if you see that neither Interfaces are assigned an IP address, you can use the "ipconfig /renew" command which will try to connect to the local DHCP server and get an IP address from this server.<br><br>

If you have multiple interfaces on your workstation, you can renew an interface by using part of the name example.<br><br>
ipconfig /renew Bel*<br><br>
which would renew the IP address of the interface - Bel.<br>

</p><Br><br>

<h4>Check your IP address on Linux</h4>
<p>
To check your IP address on a linux server/workstation use the command:<br><br>

<b>ifconfig</b><br>

<pre>
eth0      Link encap:Ethernet  HWaddr FE:FD:40:3E:E4:CF
          inet addr:64.62.228.207  Bcast:64.62.228.255  Mask:255.255.255.0
          inet6 addr: fe80::fcfd:40ff:fe3e:e4cf/64 Scope:Link
          UP BROADCAST RUNNING MULTICAST  MTU:1500  Metric:1
          RX packets:7176228 errors:0 dropped:0 overruns:0 frame:0
          TX packets:7412838 errors:0 dropped:0 overruns:0 carrier:0
          collisions:0 txqueuelen:1000
          RX bytes:1052695156 (1003.9 MiB)  TX bytes:1687986180 (1.5 GiB)

lo        Link encap:Local Loopback
          inet addr:127.0.0.1  Mask:255.0.0.0
          inet6 addr: ::1/128 Scope:Host
          UP LOOPBACK RUNNING  MTU:16436  Metric:1
          RX packets:65478 errors:0 dropped:0 overruns:0 frame:0
          TX packets:65478 errors:0 dropped:0 overruns:0 carrier:0
          collisions:0 txqueuelen:0
          RX bytes:12686839 (12.0 MiB)  TX bytes:12686839 (12.0 MiB)
</pre>
<br><br>
The above command will show all interfaces currently installed on the server/ workstation.
<br><br>
There are a number of options that can be used to show the state of the interface or assign, change certain aspects of the interface.
<br><br>
<pre>
OPTIONS
       interface
              The  name of the interface.  This is usually a driver name followed by a unit number, for exam-
              ple eth0 for the first Ethernet interface.

       up     This flag causes the interface to be activated.  It is implicitly specified if  an  address  is
              assigned to the interface.

       down   This flag causes the driver for this interface to be shut down.

       [-]arp Enable or disable the use of the ARP protocol on this interface.

       [-]promisc
              Enable  or disable the promiscuous mode of the interface.  If selected, all packets on the net-
              work will be received by the interface.

       [-]allmulti
              Enable or disable all-multicast mode.  If selected, all multicast packets on the  network  will
              be received by the interface.

       metric N
              This parameter sets the interface metric.

       mtu N  This parameter sets the Maximum Transfer Unit (MTU) of an interface.

       dstaddr addr
              Set  the  remote IP address for a point-to-point link (such as PPP).  This keyword is now obso-
              lete; use the pointopoint keyword instead.

       netmask addr
              Set the IP network mask for this interface.  This value defaults to the usual class A, B  or  C
              network mask (as derived from the interface IP address), but it can be set to any value.

       add addr/prefixlen
              Add an IPv6 address to an interface.

       del addr/prefixlen
              Remove an IPv6 address from an interface.

       tunnel aa.bb.cc.dd
              Create a new SIT (IPv6-in-IPv4) device, tunnelling to the given destination.

       irq addr
              Set  the  interrupt line used by this device.  Not all devices can dynamically change their IRQ
              setting.
</pre>
<br><br>
The above options can be used both on freebsd and Linux servers.<br><br>

<h4>Check your IP address on Freebsd</h4>
To check you IP address on a freebsd server/workstation use the command:<br><br>
<b>ifconfig</b><br>
<pre>
xl0: flags=8843<UP,BROADCAST,RUNNING,SIMPLEX,MULTICAST> mtu 1500
        options=9<RXCSUM,VLAN_MTU>
        inet 172.31.16.5 netmask 0xffffff00 broadcast 172.31.16.255
        ether 00:b0:d0:84:97:e5
        media: Ethernet autoselect (100baseTX <full-duplex>)
        status: active
plip0: flags=108810<POINTOPOINT,SIMPLEX,MULTICAST,NEEDSGIANT> mtu 1500
lo0: flags=8049<UP,LOOPBACK,RUNNING,MULTICAST> mtu 16384
        inet6 fe80::1%lo0 prefixlen 64 scopeid 0x3
        inet6 ::1 prefixlen 128
        inet 127.0.0.1 netmask 0xff000000
</pre>

<br><br>
<h4>Configure Network Card (Interface)</h4>
To configure your network card, requires root privileges. This can be done from the command line with ifconfig but would cause these changes to disappear after each reboot. To make these changes permananent would require editing /etc/rc.conf file.<br><br>

With a editor (vi) add an entry for each network card present on the system, example:<br><br>
ifconfig_<b>xl0</b>="inet 172.31.16.5 netmask 255.255.255.0"<br><br>
repeat the above command for each interface, replacing <b>eth0</b> with the name of the interface returned by issuing the ifconfig command.<br><br>
servers running freebsd or unix servers interfaces can be configured with more that one network IP Address, these are known as aliases or virtual network.<br><br>
The command to use:<br>
ifconfig_xl0_alias0="inet xxx.xxx.xxx.xxx netmask xxx.xxx.xxx.xxx"


<?php
        echo "</td>";
echo "</tr>";
echo "</table>";

include 'lookups.inc';
echo "<br>";
include 'adds/google_add.inc';
echo "</center>";
include 'footer.inc';
?>
