<?php


// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 

mysql_select_db('eduprojdb')or die("cannot select DB");



mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 


$area=$_POST['area']; 
$stage=$_POST['stage']; 
$school=$_POST['school']; 



$area = stripslashes($area);
$area = mysql_real_escape_string($area);

$stage = stripslashes($stage);
$stage = mysql_real_escape_string($stage);

$school = stripslashes($school);
$school = mysql_real_escape_string($school);




$cond ="";

if ($area !== "0")

{
	$cond = $cond."AND school.area ='$area'";
}

if ($stage !== "0")

{
	$cond = $cond."AND school.stage ='$stage'";
}


if ($school !== "0")

{
	$cond = $cond."AND school.name ='$school'";
}	







$sql="SELECT teacher.firstName ,teacher.familyName,school.name, count(idQuestion) 
FROM teacher
left outer join question on teacher.userName= question.teacher_userName , school
WHERE teacher.school_idSchool=school.idSchool ".$cond." 
GROUP BY teacher.firstName
ORDER BY COUNT(idQuestion) DESC";



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