<table border=0>
<tr>
	<td align=right>
		<a href=/tools/iptools.php><font size=4><b>IP Tools</b></font></a>
		<br>
	</td>
	<td align=right>
		<a href=/tools/ssltools.php><font size=4><b>SSL Tools</b></font></a>
		<br>
	</td>
	<td align=right>
		<a href=/><font size=4><b>General Tools</b></font></a>
		<br>
	</td>
</tr>
<tr>
        <td>
		<div style=background-color:silver>
                	<form action=/net_resolve.php method=post>
                	<b>IP Owner<b><br>
                	<input type=text name=ip value=>
			<input type=hidden name=tool_option value=ipcheck>
                	<input type=submit value=Check>
                	</form>
		</div>
        </td>
        <td>
		<div style=background-color:silver>
                	<form method=post action=/net_resolve.php>
                	<b>Whois Lookup (IP or Domain)</b><br>
                	<input name=whois value=>
			<input type=hidden name=tool_option value=whois>
                	<input type=submit value=Whois></input>
                	</form>
		</div>
       </td>
	<td>
		<div style=background-color:silver>
               	<b>DNS Lookup - Lookup A, MX, SOA, txt, cname</b><br>
                <form action=/resolve_dns.php method=post>
                <input type=text name=ip>
                <select name=dns_options>
                        <option value=a>A </option>
                        <option value=mx>MX </option>
                        <option value=cname>CNAME</option>
                        <option value=ns>NS </option>
                        <option value=soa>SOA </option>
                        <option value=ptr>PTR </option>
                        <option value=txt>TXT </option>
                        <option value=aaaa>AAAA </option>
                        <option value=hinfo>Hinfo </option>
                        <option value=srv>SRV </option>
                        <option value=all>All </option>
			<option value=any>Any </option>
                </select>
                <input type=submit value=check>
                </form>
		</div>
       </td>
</tr>
<tr>
        <td rowspan=2>
       </td>
</tr>
</table>
