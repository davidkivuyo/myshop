<?php


$db_hostname="localhost";
$db_username="root";
$db_password="david";
$db_name="myshop";

try{
$connect=new PDO("mysql:host=$db_hostname;dbname=$db_name",$db_username,$db_password);
$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);




}catch(PDOExeption $e){
echo "connected failed: " .$e->getMessage();

}


?>
