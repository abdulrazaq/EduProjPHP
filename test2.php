<?php

 require 'rb-p533.php';


R::setup('mysql:host=abdulrazaqasrcom.ipagemysql.com;dbname=eduprojdb','abdulrazaq','QWERtyui1234@$DB');



 $book = R::load( 'book', '4' );
$book->title = 'Learn to fly!ss';
R::store( $book );
?>