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
$firstName = $data['firstName'];
$secondName = $data['secondName'];
$familyName = $data['familyName'];
$civilID =  $data['civilID'];
$password = $data['password'];
$email = $data['email'];
$area = $data['area'];
$stage = $data['stage'];
$schoolName = $data['schoolName'];
$subjectName = $data['subject'];
if ($data['currentUserName'] !== null)
{
$currentUserName =$data['currentUserName'];
}


$sql="SELECT idSchool FROM school WHERE area='$area' AND name = '$schoolName'  AND stage ='$stage'";
$result=mysql_query($sql);


$idSchool = mysql_result($result, 0);


$sql="SELECT idSubject FROM subject WHERE name = '$subjectName'";

$result=mysql_query($sql);

$idSubject = mysql_result($result, 0);


$sql="SELECT userName FROM teacher WHERE userName = '$currentUserName'";

$result=mysql_query($sql);
$num_rows = mysql_num_rows($result);


if ($num_rows === 0)
{
	$sql = "INSERT INTO teacher VALUES  ('$userName','$civilID','$firstName','$secondName','$familyName','$password','$email','$idSchool','$idSubject')";


	$result=mysql_query($sql);

	if ($result) {
		echo "insert success";
	}
	else
	{
		echo "insert fail";
	}


}

else
{
	$sql = "UPDATE  teacher SET  
	userName = '$userName',
	civilID =  '$civilID',
	firstName =  '$firstName',
	secondName =  '$secondName',
	familyName =  '$familyName',
	password =  '$password',
	email =  '$email',
        school_idSchool ='$idSchool',
	subject_idSubject ='$idSubject'
 
	WHERE CONVERT(  userName USING utf8 ) =  '$currentUserName'";


	$result=mysql_query($sql);

	if ($result) {
		echo "update success";
	}
	else
	{
		echo "update fail";
	}
}


?>