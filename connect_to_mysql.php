<?php 
/* Created By Adam Khoury @ www.developphp.com 
-----------------------June 19, 2008-----------------------*/
//***  "die()" will exit the script and show an error if something goes wrong with the "connect" or "select" functions. 
//***  A "mysql_connect()" error usually means your connection specific details are wrong 
//***  A "mysql_select_db()" error usually means the database does not exist.
// Place db host name. Usually is "localhost" but sometimes a more direct string is needed
$db_host = "ftp.swe3613.com";
// Place the username for the MySQL database here
$db_username = "wapp02p2swe3613"; 
// Place the password for the MySQL database here
$db_pass = "345dfg567dss";
// Place the name for the MySQL database here
$db_name = "swe3613_db02p2";

mysql_connect("$db_host","$db_username","$db_pass") or die(mysql_error());
mysql_select_db("$db_name") or die("no database by that name");
echo "<br>";
echo "Connected to the Database";
?>