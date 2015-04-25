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
// delete the element which handle the userName
unset($data['userName']);



foreach ($data as $key => $value) {

	echo $key."  ".$userName."  ".$value;

        
		 $sql ="INSERT INTO student_score SET
		subject_idSubject='$key',  
		student_userName='$userName', 
		score ='$value'
		ON DUPLICATE
		KEY UPDATE
		score =  if ( score<'$value','$value',score)";

    $result=mysql_query($sql);

	if ($result) {
		echo "insert success";
	}
	else
	{
		echo "insert fail";
	}

       
}







?>