<?php


// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 

mysql_select_db('eduprojdb')or die("cannot select DB");



mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 


//get the data
$json = file_get_contents("php://input");

//convert the JSON string of data to an array
$data = json_decode($json, true);

$userName = $data['userName'];
$class = $data['class'];
$question = $data['question'];
$ans1 = $data['ans1'];
$ans2 = $data['ans2'];
$ans3 = $data['ans3'];
$type = $data['type'];





if ( $data['idQuestion'] === null)

{


$sql="SELECT subject_idSubject FROM teacher WHERE userName='$userName'";
$result=mysql_query($sql);


$subjectID = mysql_result($result, 0);

$sql = "INSERT INTO question (  `idQuestion`  ,  `class` ,  `question` ,  `answer1` ,  `answer2` ,  `answer3` ,  `subject_idSubject` , `teacher_userName` , `type` ) VALUES  (NULL,'$class','$question','$ans1','$ans2','$ans3','$subjectID','$userName','$type')";

}

else

{
	 $idQuestion = $data['idQuestion'];
$sql = "UPDATE question SET   `class`='$class' ,  `question`='$question' ,  `answer1`='$ans1' ,  `answer2`='$ans2' ,  `answer3`='$ans3'  WHERE `idQuestion`=  '$idQuestion' LIMIT 1";
}
$result=mysql_query($sql);


if ($result) {
    echo "insert success";
}
else
{
	echo "insert failz";
}



?>