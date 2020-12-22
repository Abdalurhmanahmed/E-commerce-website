<?php
session_start();
$database_name = "tea";
$con = mysqli_connect("localhost","root","",$database_name);
            $id=$_GET['id'];
            $query = "SELECT * FROM product where id='$id'";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) 
                {
                    
                     ?>
                    <form action="conformpayment.php" method = "POST"> 
                    <input type= "text"value="<?php echo $row["id"];?>"  name = "id" hidden><br /><br />
                    <input type= "text"value="<?php echo $_POST['your_name'];?>" name = "your_name" readonly><br /><br />
                    <input type= "number"value="<?php echo $_POST['moblie'];?>" name = "moblie" readonly><br /><br />
                    <input type= "text"value="<?php echo $_POST['address'];?>" name = "address" readonly><br /><br />
                    <input type= "text"value="<?php echo $_POST['city'];?>" name = "city" readonly><br /><br />
                    <input type= "text"value="<?php echo $_POST['state'];?>" name = "state" readonly><br /><br />
                    <input type= "number"value="<?php echo $_POST['pincode'];?>" name = "pincode" readonly><br /><br />
                    <input type= "number"value="<?php echo(rand(10,100));?>" name = "rand" hidden><br /><br />
                    <input type="submit" value="submit" name="submit"><br />
                    </form>

                    <?php
                }
            }
  






?>