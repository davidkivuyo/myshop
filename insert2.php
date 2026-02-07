
<?php
require "config.php";
$productsname=$quantity=$sellsprice="";

if($_SERVER["REQUEST_METHOD"] =="POST"){
$productsname=$_POST["productsname"];
$quantity=$_POST["quantity"];
$sellsprice=$_POST["sellsprice"];



$sql=$connect->prepare("INSERT INTO solditems (productsname,quantity,sellsprice)  VALUES (:productsname,:quantity,:sellsprice )");
$sql->execute([
    ':productsname'=>$productsname,
    ':quantity'=>$quantity,
    ':sellsprice'=>$sellsprice,
]);

header('Location: solditems.php');
exit();
}


?>