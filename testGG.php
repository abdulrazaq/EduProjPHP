<?php


// Connect to server and select databse.

$conn = mysql_connect(':/cloudsql/arcane-attic-91706:eduproj',
  'razaq', // username
  'abadsa91'      // password
  );

mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 

// username and password sent from form 
$userName=$_POST['userName']; 
$userPassword=$_POST['userPassword']; 

// To protect MySQL injection
$userName = stripslashes($userName);
$userName = mysql_real_escape_string($userName);

$userPassword = stripslashes($userPassword);
$userPassword = mysql_real_escape_string($userPassword);










	$sql="SELECT * FROM teacher,school,subject  WHERE userName ='$userName' and password='$userPassword' and idSchool = school_idSchool and idSubject = subject_idSubject";

	$result=mysql_query($sql);
	
	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

if($count==1){

	$json = array(); 



	while($row=mysql_fetch_row($result))

	{ 
		$json[]=$row;


	}


	$json[] = "T";


	json_encode($json);
	
	



	echo json_encode($json);

	echo "right Username or Password";
}
else {





	$sql="SELECT * FROM student,school  WHERE userName ='$userName' and password='$userPassword' and idSchool = school_idSchool";

	
	
	$result=mysql_query($sql);
	
	$count=mysql_num_rows($result);

	if($count==1){
	


	$json = array(); 



	while($row=mysql_fetch_row($result))

	{ 
		$json[]=$row;


	}


	$json[] = "S";


	json_encode($json);


	echo json_encode($json);

	echo "right Username or Password";


	}



	else


		{echo "Wrong Username or Password";}

}
?>