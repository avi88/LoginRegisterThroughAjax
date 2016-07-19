<?php
session_start();
if($_SESSION['UserName']){    
  session_unset($_SESSION['UserName']);
?>
<script>
window.location = 'index.php';
</script>
<?php
}
?>


<head>
    <title>Logout</title>
</head>
