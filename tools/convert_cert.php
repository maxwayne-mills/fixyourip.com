<?php
set_include_path ('.:../includes:../../includes');

$target = "/tmp/";
$target = "$target" . basename( $_FILES['file']['name']) ;
$ok=1;
if(move_uploaded_file($_FILES['file']['tmp_name'], "$target"))
 {
 	set_include_path ('.:../includes:../../includes');
        include 'header.inc';
        include 'page_header.inc';

 	//echo "The file ". basename( $_FILES['file']['name']). " has been uploaded";
	echo "<pre>";
	echo shell_exec('apps/convert_certs.sh '.$target.'');
	echo "</pre>";

	include 'page_footer.inc';
        include 'lookups.inc';
        include 'add1.inc';
        include 'footer.inc';
        echo "</center>";
 }
 else {
	set_include_path ('.:../includes:../../includes');
        include 'header.inc';
        include 'page_header.inc';

	echo "Sorry, there was a problem uploading your file.";
	echo "<br>";
	echo "This tool is only compatible with the <b><a href=http://www.google.com/chrome/ target=new_window>Chrome</a> Browser</b>, for now";
	echo "<br>";
	echo "<br>";

	include 'page_footer.inc';
        include 'lookups.inc';
        include 'add1.inc';
        include 'footer.inc';
        echo "</center>";
 }

?>
