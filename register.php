<?php
session_start();
error_reporting(0);
require_once("connection.php");
?>
<head>
    <title>Register Form</title>
    <script src="jquery-ui.min.js"></script>
</head>



        <form method="post" enctype="multipart/form-data" name="rester_form" />
        <table>
           <tr><td>Username</td><td><input type="text" name="user" id="user" /></td></tr>
                  <tr><td>First Name</td><td><input type="text" name="fname" id="" /></td></tr>
                      <tr><td>Last Name</td><td><input type="text" name="lname" id="" /></td></tr>
                            <tr><td>Email</td><td><input type="text" name="email" id="email"/></td></tr>
                                    <tr><td>Password</td><td><input type="password" name="password" id=""/></td></tr>
                                          <tr><td>Phone</td><td><input type="text" name="phone" id="" /></td></tr> 
                                          <tr><td>Upload Picture:</td><td><input type="file" name="file" id="file"></td></tr>
                                          
                                              <tr><td>Zip</td><td><input type="text" name="zip" id="" /></td></tr>
                                                     <tr><td>Address</td><td><textarea name="address"></textarea></td></tr>
           <tr><td>Register</td><td><input type="submit" name="register" value="Register" id="" /></td></tr> 
                  </table>
        </form>

<?php
if($_POST['register'] == 'Register') {
    extract($_POST);

	
	
$origional=$_FILES['file']['name'];
$new=uniqid();
$d=explode('.',$origional);
$ext=end($d);
$newname=$new.'.'.$ext;
move_uploaded_file($_FILES['file']['tmp_name'],'user_gallery/'.$newname);    
    
    if ($user != '' && $fname != '' && $lname != '' && $email != '' && $password != '' && $phone != '' && $zip != '') {
        
        $sqll         = "INSERT INTO userregister (id ,user ,fname ,lname ,email ,password ,phone ,pics ,zip ,address)
                            VALUES ('','$user','$fname','$lname','$email','$password','$phone','$newname','$zip','$address')";
        $rst          = mysql_query($sqll);
        $mail_message = "<div style=\"line-height:20px;\"><p style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 15px; color: #0066FF;\" >Hello, $_POST[fname] $_POST[lname]! </p>
                        <p align='center' style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000011;\">Thanks for registering with us.</p> 
                        <p style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000011;\">Your Username is- $_POST[user] </p> 
                        <p style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000011;\">Your Password is- $_POST[password] </p> 
                        <p style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000011;\">Kind Regards</p> 
                        <p style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000011;\">Rohit Srivastava</p> 
                        <p style=\"font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12px; color: #000011;\">Click here to visit the site  http://www.rohitsrivastava.host56.com</p> 
                        </div>";
        $to           = $_POST[email];
        $subject      = "Thanks for registering with us";
        $headers      = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $eol         = "\r\n";
        $fromname    = "Registration Confirmation";
        $fromaddress = "avi.chitranshu@gmail.com";
        $headers .= "From: " . $fromname . "<" . $fromaddress . ">" . $eol;
        $headers .= "Reply-To: " . $fromname . "<" . $fromaddress . ">" . $eol;
        mail($to, $subject, $mail_message, $headers);
        echo "Successfully Submitted ! Please check your mail.";
        echo "<a href='index.php'>Login</a>";
        header('index.php');
    }
    
    
    
    
    
    
    else {
        echo "Please Fill all Mendatory Fields";
    }
}
?> 