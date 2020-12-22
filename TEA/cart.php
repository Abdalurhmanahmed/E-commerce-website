<?php
    session_start();
    $database_name = "tea";
    $con = mysqli_connect("localhost","root","",$database_name);

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'id' => $_GET["id"],
                    'productname' => $_POST["hidden_name"],
                    'productprice' => $_POST["hidden_price"],
                    'productquantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="Cart.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="Cart.php"</script>';
            }
        }else{
            $item_array = array(
                'id' => $_GET["id"],
                'productname' => $_POST["hidden_name"],
                'productprice' => $_POST["hidden_price"],
                'productquantity' => $_POST["quantity"],
            
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete")
        {
            foreach ($_SESSION["cart"] as $keys => $value)
            {
                if ($value["id"] == $_GET["id"])
                {
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="Cart.php"</script>';
                }
           }
        }
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>
<form action="buy1.php" method="get">
    <div class="container" style="width: 65%">
        
        <div style="clear: both"></div>
        <h2 class="title2">Shopping Cart Details</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
                                
            </tr>
            <?php
                if(!empty($_SESSION["cart"]))
                {
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                    
                            <td><input type="text"value="<?php echo $value["productname"]; ?>" name="productname"readonly></td>
                            <td><input type="text"value="<?php echo $value["productquantity"]; ?>" name="productquantity"readonly></td>
                            <td>&#8377;<input type="text"value="<?php echo $value["productprice"]; ?>" name="productprice"readonly></td>
                            <td>
                                &#8377;<input type="text"value="<?php echo number_format($value["productquantity"] * $value["productprice"], 2); ?>"name="productprice"></td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["id"]; ?>"><span class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["productquantity"] * $value["productprice"]);
                        ?><input type="hidden"value="<?php echo $total;?>" name="total"><?php
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">&#8377; <?php echo number_format($total, 2); ?></th>
                        </tr>
                        <?php
                    }
                ?>
            </table>
            
        </div>
    </div>
<input type= "submit" value="submit" name="buy">
</form>
</body>
</html>