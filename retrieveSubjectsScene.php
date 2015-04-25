<?php


// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 

mysql_select_db('eduprojdb')or die("cannot select DB");



mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 

$classValue=$_POST['classValue']; 



$classValue = stripslashes($classValue);
$classValue = mysql_real_escape_string($classValue);


$sql="SELECT name FROM subject WHERE idSubject IN (SELECT DISTINCT subject_idSubject FROM level WHERE class='$classValue' )";
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