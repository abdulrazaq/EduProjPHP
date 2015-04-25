<?php


// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 

mysql_select_db('eduprojdb')or die("cannot select DB");



mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 


$area=$_POST['area']; 
$class=$_POST['class']; 


$area = stripslashes($area);
$area = mysql_real_escape_string($area);

$class = stripslashes($class);
$class = mysql_real_escape_string($class);


if ($area !== "0" and $class !== "0" )

{
$sql="SELECT firstName , secondName,familyName,school.name,SUM( student_score.score)
FROM student, student_score,subject,school
WHERE student_score.student_userName =student.userName
and subject.idSubject = student_score.subject_idSubject
and school.idSchool = school_idSchool
and school.area = '$area'
and student.class = '$class'
GROUP BY firstName
ORDER BY score DESC
LIMIT 10";
}




else if ($area !== "0" and $class === "0" )
{

$sql="SELECT firstName , secondName,familyName,school.name,SUM( student_score.score)
FROM student, student_score,subject,school
WHERE student_score.student_userName =student.userName
and subject.idSubject = student_score.subject_idSubject
and school.idSchool = school_idSchool
and school.area = '$area'
GROUP BY firstName
ORDER BY score DESC
LIMIT 10";

}

else if ($area === "0" and $class !== "0" )
{

$sql="SELECT firstName , secondName,familyName,school.name,SUM( student_score.score)
FROM student, student_score,subject,school
WHERE student_score.student_userName =student.userName
and subject.idSubject = student_score.subject_idSubject
and school.idSchool = school_idSchool
and student.class = '$class'
GROUP BY firstName
ORDER BY score DESC
LIMIT 10";

}
else
{

$sql="SELECT firstName , secondName,familyName,school.name,SUM( student_score.score)
FROM student, student_score,subject,school
WHERE student_score.student_userName =student.userName
and subject.idSubject = student_score.subject_idSubject
and school.idSchool = school_idSchool
GROUP BY firstName
ORDER BY score DESC
LIMIT 10";

}

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