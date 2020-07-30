<?php

    print_r("ID:".$_GET['id']);

    include_once('connection.php');
    $query = $pdo->prepare("SELECT * FROM products WHERE prod_id=".$_GET['id']);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    $productStatus = $result['prod_status'];
    $productQuantity = $result['prod_quantity'];

    if($productStatus==0 || $productQuantity==0)
    {
        print_r("Sold Out");
    }
    else if($productStatus==1 )
    {
        print_r("Availaible");
        $query = $pdo->prepare("UPDATE products SET prod_quantity=prod_quantity-1 WHERE prod_id=".$_GET['id']);
        $query->execute();
        header("location:receipt.php?id=".$_GET['id']);
    }

    


?>