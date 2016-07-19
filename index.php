<?php
session_start();
require_once("connection.php");
?>
<head>
    <title>Login Form</title>
</head>
    <form method="post" enctype="multipart/form-data" name="login_form" />
        <table>
           <tr><td>User</td><td><input type="text" name="user" id="user" /></td></tr>
               <tr><td>Password</td><td><input type="password" name="password" id="password"/></td></tr>   
                    <tr><td>Login</td><td><input type="submit" name="login" value="Login" id="login" /></td></tr>     
        </table>
    </form>
<?php
if($_POST['login']=='Login'){
    extract($_POST);
    $login="select * from userregister where user='$user' and password='$password'";
    $log = mysql_query($login);
    $logged = mysql_num_rows($log);    
    if($logged>0){
        $_SESSION['UserName'] = $user;
header("location:userpage.php");
    }
else{
echo "Login Failed";
echo "<br/><a href='register.php'>Please Register first</a>";
}
     
}
?>