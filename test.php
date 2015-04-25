<?php

 require 'rb-p533.php';

R::setup('mysql:host=abdulrazaqasrcom.ipagemysql.com;dbname=eduprojdb',
        'abdulrazaq','QWERtyui1234@$DB');



 $book = R::dispense( 'book' );

    $book->title = 'Learn to fly';
    $book->rating = 'good';

 $id = R::store( $book );

?>