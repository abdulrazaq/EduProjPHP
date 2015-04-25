<?php
 
// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 
 
mysql_select_db('eduprojdb')or die("cannot select DB");
 
 
 
mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 
 
 
$class=$_POST['class'];  
$class = stripslashes($class);
$class = mysql_real_escape_string($class);



$increment=$_POST['increment']; 
$increment = stripslashes($increment);
$increment = mysql_real_escape_string($increment);
 

 

 
 

    $sql="SELECT * FROM question,subject where class ='$class' AND idSubject =  subject_idSubject  LIMIT $increment , 30 ";

 
$result=mysql_query($sql);
 
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
 
$json = array(); 
 
 
 
while($row=mysql_fetch_row($result))
 
{ 
    $json[]=$row;
 
 
}
 
 
 
 
 
json_encode($json);
 
 
echo json_encode($json);
 
 
?>