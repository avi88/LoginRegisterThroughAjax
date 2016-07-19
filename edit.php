<?php
session_start();
require_once("connection.php");
?>
<head>
    <title>main page</title>
</head> 
<?php
$idd = $_REQUEST['delid'];
$sql_sel = "select * from userregister where id = '$idd'";
$sel_result = mysql_query($sql_sel);
$row_fet = mysql_fetch_array($sel_result);
?>
<?php
	if($_POST['update']=='UPDATE'){
	extract($_POST);
				$sql_test = "select * from userregister where id= '$idd'";
				$res = mysql_query($sql_test);
				$affect = mysql_num_rows($res);				
				if ($affect){
				$up = "update userregister set fname='$fname',lname='$lname',address='$address' where id = '$idd'";
				mysql_query($up);
				echo "Submitted Successfully! ";
				}
			else{
				
			$sqll = "insert into userregister(fname,lname,address) values('$fname','$lname','$address')";
				mysql_query($sqll);
			}
				
		}
        ?>
<body>
<form method="post" >
	<table  width="1011"  align="center"  border="1">
		<tr>
			<td>
				First Name:<input type="text" name="fname" id="fname" value= "<?php echo $row_fet['fname'];?>"/>
				First Name:<input type="text" name="lname" id="lname" value= "<?php echo $row_fet['lname'];?>"/>                                
            Address:<textarea name="address" id="address" value= "<?php echo $row_fet['address'];?>"><?php echo $row_fet['address'];?></textarea>
				
				
				<input type="submit" name="update" id="update" value="UPDATE" />
				<input type="button" value="back" onclick="window.location='userpage.php'" />
			</td>
		</tr>
	</table>
</form>