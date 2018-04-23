<?php
set_include_path('.:../includes:../../includes');
?>

<?php
include 'header_cisco.inc';
include 'library_header.inc';

echo "<center>";
echo "<table width=50%>";
echo "<tr>";
	echo "<td align=left>";
		echo "<h3>Library - Cisco Commands</h3>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
        echo "<td align=left>";
?>

<br>
<h4>Find interface description</h4>
<p>
 <ul>
	<li>enable
	<li>show interface description
	<br><br>
	<pre>
Interface                      Status         Protocol Description
Vl1                            admin down     down
Vl4020                         up             up
Fa0/1                          up             up       job3-eth1
Fa0/2                          up             up       job4-eth1
Fa0/3                          up             up       log2-eth1
Fa0/4                          up             up       sql2-eth1
Fa0/5                          up             up       policy2-eth1
	</pre>
 </ul>
</p>

or
 <ul>
	<li>enable
	<li>show interface Fa0/26 status
	<br><br>
	<pre>
#show interfaces Fa0/26 status
Port      Name               Status       Vlan       Duplex  Speed Type
Fa0/26    eth1               connected    trunk      a-full  a-100 10/100BaseTX
	</pre>
 </ul>

 <ul>
	<li>show interface Fa0/26 switchport
	<br><br>
	<pre>
Name: Fa0/26
Switchport: Enabled
Administrative Mode: trunk
Operational Mode: trunk
Administrative Trunking Encapsulation: dot1q
Operational Trunking Encapsulation: dot1q
Negotiation of Trunking: On
Access Mode VLAN: 1 (default)
Trunking Native Mode VLAN: 1 (default)
Administrative Native VLAN tagging: enabled
Voice VLAN: none
Administrative private-vlan host-association: none
Administrative private-vlan mapping: none
Administrative private-vlan trunk native VLAN: none
Administrative private-vlan trunk Native VLAN tagging: enabled
Administrative private-vlan trunk encapsulation: dot1q
Administrative private-vlan trunk normal VLANs: none
Administrative private-vlan trunk associations: none
Administrative private-vlan trunk mappings: none
Operational private-vlan: none
Trunking VLANs Enabled: 2,4020-4023
Pruning VLANs Enabled: 2-1001
Capture Mode Disabled
Capture VLANs Allowed: ALL
	<pre>
 </ul>

<h4>Create VLAN</h4>
<p>
<ul>
	<li>en
	<li>conf t
	<li>vlan <i>vlan id</i>
	<li>name <i>vlan-id name</i>
	<li>end
</ul>
<br><br>
</p>

<h4>Assign Interface to a VLAN</h4>
<p>
<ul>
	<li>en
	<li>conf t
	<li>interface Fa0/1
	<li>switchport mode access (port will be connecto to single host)
	<li>switchport access vlan vlan-id
	<li>description description name
	<li>no shut (make the interface active)
</ul>
<br><br>
</p>

<h4>Assign IP address to a switch</h4>
<p>
<ul>
	<li>enable
	<li>conf t
	<li>interface vlan vlan-id
	<li>ip address ip-address subnet-mask
	<li>end
</ul>
<br><br>
</p>

<h4>Assign default gateway to a switch</h4>
<p>
<ul>
        <li>enable
        <li>conf t
        <li>ip defatult-gateway ip-address
        <li>end
</ul>
<br><br>
</p>

<h4>Assign DNS server IP to a switch</h4>
<p>
<ul>
	<li>enable
	<li>conf t
	<li>interface vlan vlan-id
	<li>ip address ip-adress subnet-mask
	<li>end
</ul>
<br><br>
</p>

<h4>Disable DNS resolution</h4>
<p>
<ul>
	<li>enable
	<li>conf t
	<li>no ip domain-lookup
</ul>
<br><br>
</p>

<h4>Configure telnet password</h4>
<p>
<ul>
	<li>enable
	<li>conf t
	<li>line vty 0 (choose any number)
	<li>password password
	<li>login
	<li>end
</ul>
<ul>
<br><br>
</p><br>


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
