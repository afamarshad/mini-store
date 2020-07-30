<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
<?php
    include_once('connection.php');
    $query = $pdo->prepare("SELECT * FROM products WHERE prod_id=".$_GET['id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
?>

    <form action="#!" style="text-align:center;">
    <h1>Receipt</h1>
    <h4 style="text-align:right;">Date Printed:<?php echo date("d F Y, h:i:s A");?></h2>
    <div class="form-group">
        <label>Product Name:<?php echo $result['prod_name']?></label><br/><br/>
        <label>Product Manufacturer:<?php echo $result['prod_manufacturer']?></label><br/><br/>
        <label>Product price:<?php echo $result['unit_price']?></label><br/><br/>
        <label>Date Purchased:<?php echo date("d-m-Y");?></label><br/><br/>
        
    </div>
    <!-- <button type="submit" class="btn btn-primary">Print Receipt</button> -->
    </form>


</body>

</html>