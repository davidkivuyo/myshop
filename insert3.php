
<?php
$name=$products=$quantity=$price="";

if($_SERVER["REQUEST_METHOD"] =="POST"){
$name =$_POST["name"];
$products=$_POST["products"];
$quantity=$_POST['quantity'];
$price=$_POST["price"];



$sql=$connect->prepare("INSERT INTO debts (names,products,quantity,price)  VALUES (:names,:products,:quantity,:price )");
$sql->execute([
    ':names'=>$name,
    ':products'=>$products,
    ':quantity'=>$quantity,
    ':price'=>$price,
]);

header('Location: debts.php');
exit();

}

?>


