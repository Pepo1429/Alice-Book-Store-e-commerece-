<?php
$servername='localhost';
$username='root';
$password='';
$databaseName = "alice_book_store";
$conn=mysqli_connect($servername,$username,$password,"$databaseName");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
?>