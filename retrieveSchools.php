<?php


// Connect to server and select databse.
mysql_connect('abdulrazaqasrcom.ipagemysql.com', 'abdulrazaq', 'QWERtyui1234@$DB')or die("cannot connect"); 

mysql_select_db('eduprojdb')or die("cannot select DB");



mysql_query("SET NAMES 'UTF8'"); 
mysql_query('SET CHARACTER SET UTF8'); 


$area=$_POST['area']; 
$stage=$_POST['stage']; 


$area = stripslashes($area);
$area = mysql_real_escape_string($area);

$stage = stripslashes($stage);
$stage = mysql_real_escape_string($stage);


if ($area !== "0" and $stage !== "0" )

{
$sql="SELECT name, area,stage FROM school WHERE area = '$area' and stage = '$stage'";
}

else if ($area !== "0" and $stage === "0" )
{
	$sql="SELECT  name, area,stage FROM school WHERE area = '$area'";
}

else if ($area === "0" and $stage !== "0" )
{
	$sql="SELECT name, area,stage FROM school WHERE stage = '$stage'";
}
else
{
	$sql="SELECT name, area,stage FROM school";
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