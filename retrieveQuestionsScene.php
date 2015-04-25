<?php


// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 

mysql_select_db('eduprojdb')or die("cannot select DB");



mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 

$class=$_POST['class']; 
$subject=$_POST['subject']; 



$class = stripslashes($class);
$class = mysql_real_escape_string($class);


$subject = stripslashes($subject);
$subject = mysql_real_escape_string($subject);



$sql="SELECT idQuestion,name,question,answer1,answer2,answer3,firstName,familyName,type 
FROM Question,teacher 
WHERE Question.teacher_userName=teacher.userName AND class='$class' AND level.subject_idSubject  IN (SELECT  idSubject FROM subject WHERE name='$subject' )";

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