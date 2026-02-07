<?php require "config.php"; ?>
<?php
require "insert.php";


    if(isset($_GET['date']) && $_GET['date'] != '') {
    $date=$_GET['date'];
$rows= $connect->query("SELECT * FROM newproducts WHERE date='$date'");
$rows->execute();
$allrows= $rows->fetchAll(PDO::FETCH_OBJ);}
else{
$rows= $connect->query("SELECT * FROM newproducts WHERE status = 1");
$rows->execute();
$allrows= $rows->fetchAll(PDO::FETCH_OBJ);
}


if(isset($_GET['id'])) {
    $deleteid=$_GET['id'];
    $delete="DELETE FROM newproducts WHERE id='$deleteid'";
    $connect->exec($delete);

    if($connect){
        header("location:newproducts.php");
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALIDA SHOP-MPYA</title>
    <link rel="shortcut icon" href="carticon.png" type="image/x-icon">
   <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<?php require "header.php"; ?>

<div class="container mt-4 d-flex justify-content-end">
        <button class="btn btn-primary border border-4" type="button" data-bs-toggle="modal" data-bs-target="#newproducts">ADD STOCK/ MPYA ➕</button>
</div>

<div class="container mt-3">
    <h3 class="text-center">WELCOME to ALIDA SHOP seller portal</h3>
     <h2 class="text-center">🆕🆕🆕</h2>
    <h2 class="text-center"><strong>ONGEZA <u class="text-dark">BIDHAA MPYA</u> KWENYE DUKA</strong></h2>
</div>


<div class="modal" id="newproducts">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-body">
                <h3 class="modal-title">New products / BIDHAA MPYA</h3>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                   <div class="m-3">
                        <label for="name">product-name</label>
                    <input required type="text" name="productname" class="form-control my-3">
                 </div>

                 <div class="m-3">
                        <label for="name">quantity</label>
                    <input required type="text" name="quantity" class="form-control my-3">
                 </div>

                <div class="m-3">
                    <label for="bought-price">bought-price</label>
                <input required type="text" name="boughtprice" class="form-control my-3">
                </div>

               <div class="m-3">
                 <label for="selling-price">selling-price</label>
                <input required type="text" name="soldprice" class="form-control my-3">
               </div>
                
                <div class="container">
                    <input class="btn btn-outline-primary" type="submit" value="ADD STOCK ➕">
                </div>
                </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">close</button>
                    </div>
        </div>
    </div>
</div>

<div class="container">
    <form action="" method="get">
        <div class="row">
            <label for="">Search by Date</label>
            <div class="col">
                <input type="date" name="date" value="<?php isset($_GET['date']) == true ? $_GET['date']:'' ?>" class="form-control">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">filter</button>
                <a href="newproducts.php" class="btn btn-danger text-light">reset</a>
            </div>
        </div>
    </form>
</div>

<div class="container my-2">
<table class="table table-striped">
    <thead>
        <tr>
            <th>PRODUCT-NAME</th>
            <th>QUANTITY</th>
            <th>BOUGHT BY TSH /=</th>
            <th>SOLD BY TSH /=</th>
            <th>DATE</th>
        </tr>
    </thead>
   

    <tbody>
        <?php foreach($allrows as $newproducts) : ?>
        <tr>
        <td><?php echo $newproducts->productname; ?></td>
        <td><?php echo $newproducts->quantity; ?></td>
        <td><?php echo $newproducts->boughtprice; ?></td>
        <td><?php echo $newproducts->soldprice; ?></td>
        <td><?php echo $newproducts->date; ?></td>
        <td><a href="newproducts.php?id=<?php echo $newproducts->id; ?>"><input class="btn btn-outline-danger" type="submit" value="DELETE❌" onclick="return checkdelete()"></a></td>
       </tr>
        <?php endforeach; ?>
    </tbody>

    

</table>
</div>

<?php require 'footer.php'?>
<script src="bootstrap.bundle.min.js"></script>    
<script>
    function checkdelete(){
        return confirm('ARE YOU sure you want to delete this record');
    }
</script>
</body>
</html>