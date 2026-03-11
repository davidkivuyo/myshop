<?php require "config.php"; ?>
<?php
require "insert3.php";

    if(isset($_GET['text']) && $_GET['text'] != '') {
    $name=$_GET['text'];
$rows= $connect->query("SELECT * FROM debts WHERE names='$name'");
$rows->execute();
$allrows= $rows->fetchAll(PDO::FETCH_OBJ);}
else{
$rows= $connect->query("SELECT * FROM debts WHERE status = 1");
$rows->execute();
$allrows= $rows->fetchAll(PDO::FETCH_OBJ);
}

if(isset($_GET['id'])) {
    $deleteid=$_GET['id'];
    $delete="DELETE FROM debts WHERE id='$deleteid'";
    $connect->exec($delete);

    if($connect){
        header("location:debts.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALIDA SHOP-MADENI</title>
    <link rel="shortcut icon" href="carticon.png" type="image/x-icon">
   <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<?php require "header.php"; ?>

<div class="container mt-3">
    <h2 class="text-center">💸💸💸💸</h2>
    <h2 class="text-center"><strong>MADENI DUKANI</strong></h2>
</div>
<div class="container mt-4 d-flex justify-content-center">
        <button class="btn btn-primary border border-4" type="button" data-bs-toggle="modal" data-bs-target="#debts">MADENI ➕</button>
</div>

<div class="modal" id="debts">
    <div class="modal-dialog">
        <div class="modal-content">
            

            
            <div class="modal-body">
                <h3 class="modal-title">debts / MADENI</h3>
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                   <div class="m-3">
                        <label for="name">jina</label>
                    <input required type="text" name="name" class="form-control my-3">
                 </div>

                 <div class="m-3">
                        <label for="name">bidhaa</label>
                    <input required type="text" name="products" class="form-control my-3">
                 </div>

                <div class="m-3">
                    <label for="bought-price">idadi</label>
                <input required type="number" name="quantity" class="form-control my-3">
                </div>

               <div class="m-3">
                 <label for="selling-price">price/BEI YA BIDHAA</label>
                <input required type="number" name="price" class="form-control my-3">
               </div>
                
                <div class="container">
                    <input class="btn btn-outline-primary" type="submit" value="ONGEZA ➕">
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
            <label for="">Search by Names</label>
            <div class="col">
                <input type="text" name="text" value="<?php isset($_GET['text']) == true ? $_GET['text']:'' ?>" class="form-control">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">filter</button>
                <a href="debts.php" class="btn btn-danger text-light">reset</a>
            </div>
        </div>
    </form>
</div>

<div class="container my-2">
<table class="table table-striped">
    <thead>
        <tr>
            <th>JINA</th>
            <th>BIDHAA</th>
            <th>IDADI</th>
            <th>BEI YA BIDHAA</th>
            <th>TAREHE</th>
        </tr>
    </thead>
    
    
    <tbody>
        <?php foreach($allrows as $debts) : ?>
        <tr>
        <td><?php echo $debts->names; ?></td>
        <td><?php echo $debts->products; ?></td>
        <td><?php echo $debts->quantity; ?></td>
        <td><?php echo $debts->price; ?></td>
        <td><?php echo $debts->date; ?></td>
        <td><a href="debts.php?id=<?php echo $debts->id; ?>"><input class="btn btn-outline-danger" type="submit" value="DELETE❌" onclick="return checkdelete()"></a></td>
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