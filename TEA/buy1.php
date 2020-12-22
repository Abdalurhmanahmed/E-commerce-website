<?php
session_start();
$database_name = "tea";
$con = mysqli_connect("localhost","root","",$database_name);
            $productname=$_GET['productname'];
            $query = "SELECT * FROM product where productname='$productname'";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) 
                {
             
        ?>            <table>
                    
             <tr><?php echo $_GET['productname'];?></tr>
             <tr><?php echo $_GET['productprice'];?></tr>
             <tr><?php echo $_GET['productquantity'];?></tr>
             <tr><?php echo $_GET['total'];?></tr>

            

</table>
<?php
        
    }
            }
            

?>