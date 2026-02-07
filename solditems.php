

<?php

require "insert2.php";

    if(isset($_GET['date']) && $_GET['date'] != '') {
    $date=$_GET['date'];
$rows= $connect->query("SELECT * FROM solditems WHERE date='$date'");
$rows->execute();
$allrows= $rows->fetchAll(PDO::FETCH_OBJ);}
else{
$rows= $connect->query("SELECT * FROM solditems WHERE status = 1");
$rows->execute();
$allrows= $rows->fetchAll(PDO::FETCH_OBJ);
}

if(isset($_GET['id'])) {
    $deleteid=$_GET['id'];
    $delete="DELETE FROM solditems WHERE id='$deleteid'";
    $connect->exec($delete);

    if($connect){
        header("location:solditems.php");
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALIDA SHOP-MAUZO</title>
    <link rel="shortcut icon" href="carticon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<?php require "header.php"; ?>
 <h2 class="text-center">💹💹</h2>
<h1 class="text-center mt-5">MAUZO YA KILA SIKU</h1>

<div class="container mt-4 text-center">
        <button type="button" data-bs-toggle="modal" data-bs-target="#newsells" class="btn btn-primary border border-4">MAUZO /ADD NEW SALES ➕</button>
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
                <a href="solditems.php" class="btn btn-danger text-light">reset</a>
            </div>
        </div>
    </form>
</div>

<div class="modal" id="newsells">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
<h3 class="modal-title">New sells/ MAUZO</h3>
            </div>
            <div class="modal-body">
                    <form action="" method="post">

                   <div class="m-3">
                        <label for="name">PRODUCT NAME</label>
                    <input required type="text" name="productsname" id="" class="form-control my-3">
                 </div>

                 <div class="m-3">
                    <label for="bought-price">QUANTITY</label>
                <input required type="text" name="quantity" id="" class="form-control my-3">
                </div>

                <div class="m-3">
                    <label for="bought-price">SOLDPRICE</label>
                <input required type="text" name="sellsprice" id="" class="form-control my-3">
                </div>

                <button type="submit" class="btn btn-outline-primary">ADD SELLS</button>
                </form>

            </div>
             <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">close</button>
                    </div>
        </div>
    </div>
</div>

<div class="container my-2">
<table class="table table-striped">
    <thead>
        <tr>
            <th>PRODUCT NAME</th>
            <th>QUANTITY</th>
            <th>SOLD PRICE</th>
            <th>DATE</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($allrows as $solditems) : ?>
        <tr>
            <td><?php echo $solditems->productsname; ?></td>
            <td><?php echo $solditems->quantity; ?></td>
            <td><?php echo $solditems->sellsprice; ?></td>
            <td><?php echo $solditems->date; ?></td>
          <td><a href="solditems.php?id=<?php echo $solditems->id; ?>"><input class="btn btn-outline-danger" type="submit" value="DELETE❌" onclick="return checkdelete()"></a></td>
        </tr>
        <?php endforeach;?>
    </tbody>

</table>
</div>

<?php require 'footer.php'?>
<script>
    function checkdelete(){
        return confirm('ARE YOU sure you want to delete this record');
    }
</script>
<script src="bootstrap.bundle.min.js"></script>    
</body>
</html>