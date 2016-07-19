<?php
require_once("connection.php");
if($_REQUEST['check']=="user")
{
    $user=$_REQUEST['usercheckd'];
    $chk="select * from userregister where user='$user'";
    $rslt=mysql_query($chk);
    $count=mysql_num_rows($rslt);
    if($count>0)
    {
	echo "Username already registerd. Please try another one.";
    }
    else
    {
	echo "Available";
    }
}

if($_REQUEST['check']=="email")
{
    $email=$_REQUEST['emailcheckd'];
    $chk="select * from userregister where email='$email'";
    $rslt=mysql_query($chk);
    $count=mysql_num_rows($rslt);
    if($count>0)
    {
	echo "Username already registerd. Please try another one.";
    }
    else
    {
	echo "Available";
    }
}

?>
