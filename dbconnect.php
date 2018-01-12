<?php 
putenv("NLS_LANG=AMERICAN_AMERICA.TH8TISASCII");
$dbst = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=10.1.1.23)(PORT=1521)))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME=orclcenter)))"; 
$conn = OCILogon("read_only","SWUTCC_readonly",$dbst);

if(!$conn)
{
 echo("Not Connect");
}
?>
