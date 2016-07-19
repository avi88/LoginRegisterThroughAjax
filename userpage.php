<?php
session_start();
require_once("connection.php");
//Print_r ($_SESSION);

?>
<head> <title>Welcome Page</title> </head>
 <script type="text/JavaScript">
 
function confirmDelete(){
        var agree=confirm("Are you sure you want to delete?");
        if(agree){
             return true;
        }else{
             return false; 
        }
}
</script>
<?php
if($_SESSION['UserName']!=''){
	?>
 
	<div align="center">
	<?php
	echo "<br/>Welcome ".$_SESSION['UserName']."!";
	echo "<p>";
	?>
	<a href="logout.php">Logout</a>
	</div>
<div>
    <?php
         $qry="select * from userregister where user='".$_SESSION['UserName']."'";
             $res=mysql_query($qry);             
             if(isset($_REQUEST['delid'])){
                $delid=$_REQUEST['delid'];
                     $qry1="delete from userregister where id=$delid";
                          mysql_query($qry1);
                          header("location:userpage.php");
             }
    ?>
<form>
         <table width="1011" height="118" border="2" align="center">
            <tr>
                <td colspan="12" align="center" bgcolor="#FFFFFF"><h3><blockquote>Listing Data is Here</blockquote></h3></td>
            </tr>
            <tr>
                <td width="22" align="center" bgcolor="#FFFFFF">Id</td>
                     <td width="73" align="center" bgcolor="#FFFFFF">User Name</td>
                         <td width="73" align="center" bgcolor="#FFFFFF">First Name</td>
                             <td width="73" align="center" bgcolor="#FFFFFF">Last Name</td>
                                 <td width="120" align="center" bgcolor="#FFFFFF">Email</td>
                                     <td width="113" align="center" bgcolor="#FFFFFF">Password</td>        
                                         <td width="137" align="center" bgcolor="#FFFFFF">Address</td>
                                             <td width="81" align="center" bgcolor="#FFFFFF">Action</td>
            </tr>
         <?php
         while($row=mysql_fetch_array($res)) {
         ?>
         <tr>
                <td height="59" align="center"><?php echo $row['id'];?></td>
                     <td height="59" align="center"><?php echo $row['user'];?></td>
                         <td height="59" align="center"><?php echo $row['fname'];?></td>
                             <td height="59" align="center"><?php echo $row['lname'];?></td>
                                 <td height="59" align="center"><?php echo $row['email'];?></td>
                                     <td height="59" align="center"><?php echo $row['password'];?></td>        
                                         <td height="59" align="center"><textarea name="" ><?php echo $row['address'];?></textarea></td>  
                <td align="center">
                    <a href="userpage.php?delid='<?php echo $row['id'];?>'" onClick="return confirmDelete();">Delete</a>
                         <a href="edit.php?delid=<?php echo $row['id'];?>">Edit Detail</a>
                </td>
                <?php
                      }
                ?>
         </tr>
         </table>

</form>
</div>
<?php
}
else{
	echo "<script>window.location.href='index.php';</script>";

}
?>