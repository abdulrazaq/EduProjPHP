<?php


// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 

mysql_select_db('eduprojdb')or die("cannot select DB");



mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 


$userName=$_POST['userName']; 



$userName = stripslashes($userName);
$userName = mysql_real_escape_string($userName);









$sql="SELECT * FROM teacher,school,subject  WHERE userName ='$userName' and idSchool = school_idSchool and idSubject = subject_idSubject";

$result=mysql_query($sql);


$json = array(); 



while($row=mysql_fetch_row($result))

{ 
	$json[]=$row;


}





json_encode($json);


echo json_encode($json);




?>