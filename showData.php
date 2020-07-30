<?php
                    
    include_once('connection.php');
    $result = $pdo->prepare("SELECT * FROM products ORDER BY prod_id ASC");
    $result->execute();

    for($i=0; $row = $result->fetch(); $i++)
    {  
        $rows[] = $row;
    }

    echo json_encode($rows);
?>