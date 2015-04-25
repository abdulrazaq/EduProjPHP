<?php
 
 
// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 
 
mysql_select_db('eduprojdb')or die("cannot select DB");
 
 
 
mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 
 
 
$id=$_POST['id']; 

 
$id = stripslashes($id);
$id = mysql_real_escape_string($id);
 

 
 

    $sql="DELETE FROM question where idQuestion ='$id'";

 
$result=mysql_query($sql);
 

 
if ($result) {
    echo "delete success";
}
else
{
    echo "delete fail";
}
 
 
 

 
 
?>