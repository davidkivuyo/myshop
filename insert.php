
<?php
$productname=$boughtprice=$quantity=$soldprice="";

if($_SERVER["REQUEST_METHOD"] =="POST"){
$productname =$_POST["productname"];
$quantity=$_POST['quantity'];
$boughtprice=$_POST["boughtprice"];
$soldprice=$_POST["soldprice"];



$sql=$connect->prepare("INSERT INTO newproducts (productname,quantity,boughtprice,soldprice)  VALUES (:productname,:quantity,:boughtprice,:soldprice )");
$sql->execute([
    ':productname'=>$productname,
    ':quantity'=>$quantity,
    ':boughtprice'=>$boughtprice,
    ':soldprice'=>$soldprice,
]);

header('Location: newproducts.php');
exit();

}

?>