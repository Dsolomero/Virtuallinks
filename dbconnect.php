<?php
//create a connection btn php and mysql database
// function - mysql connect
/*
mysql -u root -p
4 -
 username -'root' by defalut on xammp
 password
 db name
 server - localhost/127.0.0.1

*/
 //constant - Pi = 3.142
 define('username', 'root');
 define('server', 'localhost');
 define('password', '');
 define('database', 'virtuallinks');

 $conn = mysqli_connect(server,username,password,database);
 if ($conn) {
 	# code...
 	//echo "connection success";
 }else{
 	echo "Failed to establish a connection".mysqli_connect_error();
 }




?>