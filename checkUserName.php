<?php


// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 

mysql_select_db('eduprojdb')or die("cannot select DB");



mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 

// username and password sent from form 
$userName=$_POST['userName']; 
$userPassword=$_POST['userPassword']; 

// To protect MySQL injection
$userName = stripslashes($userName);
$userName = mysql_real_escape_string($userName);



$sql="SELECT userName FROM teacher WHERE userName='$userName' ";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

$json = array(); 

if($count==1){


	if(mysql_num_rows($result)){while($row=mysql_fetch_row($result)){ 
		$json[]=$row;


	}


}


json_encode($json);


echo json_encode($json);

echo "Username used";
}
else {

	$sql="SELECT userName FROM student WHERE userName='$userName' ";
	$result=mysql_query($sql);

	$count=mysql_num_rows($result);
	$json = array(); 

	if($count==1){


		if(mysql_num_rows($result)){while($row=mysql_fetch_row($result)){ 
			$json[]=$row;


		}
	}


	json_encode($json);


	echo json_encode($json);

	echo "username used";


}

else


	{echo "username available";}

}
?>