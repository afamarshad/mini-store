<?php

include_once("connection.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Online Shop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/jquery.dataTables.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


    
</head>

<body>  
        <span><h3 style="text-align:center;font-size:50px;">Products <a href="#" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-shopping-cart"></span>
        </a></h3></span>
        <br />  
        <div class="table-responsive">  
            <table id="products_data" class="table table-striped table-bordered">  
                <thead>  
                    <tr>  
                            <td>prod_image</td>
                            <td>prod_name</td>  
                            <td>prod_desc</td>  
                            <td>unit_price</td> 
                            <td>prod_status</td>  
                            <td>prod_manufacturer</td> 
                            <td>Action</td>

                    </tr>  
                </thead>
                     
            </table>  
        </div>  
        </div>
    

</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: 'showData.php',
            type: 'POST',
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function (data) {
              var table = $('#products_data').dataTable({
                    data: data,
                    columns: [
                        {
                            "name": "prod_image",
                            "data": "prod_image",
                            "render": function (data, type, full, meta) {
                                return "<img src=\"" + data + "\" height=\"50\"/>";
                            },
                            "title": "prod_image",
                            "orderable": true,
                            "searchable": true
                        },
                        {"data":"prod_name"},
                        {"data":"prod_desc"},
                        {"data":"unit_price"},
                        {"data":"prod_status"},
                        {"data":"prod_manufacturer"},
                        {
                            'data': null,
                            'render': function (data, type, row) {
                                return '<a href="purchaseProduct.php?id='+data.prod_id+'" class="btn btn-sm btn-success buy" id="' + row.id +'">Add To cart</a>';
                            }
                        }
                    ]
                });
                
            }
        });

    } );
</script>