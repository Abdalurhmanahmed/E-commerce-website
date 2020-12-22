<html>
<head>
<style>
table, tr,th, td {
	height:70px;
	width:200px;
  border: 2px solid black;
  border-spacing :15px; 
}
a{

}

</style>
</head>
<body>
<?php  
$con=mysqli_connect('localhost','root');
if ($con)
{
	echo "conn";
}
else
{
	echo "Plzzz Try again some technocal problem";
}

mysqli_select_db($con,'tea');
$id1=$_POST['id'];
$name=$_POST['your_name'];
$moblie=$_POST['moblie'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$pincode=$_POST['pincode'];
$rand = $_POST['rand'];

//insert buy 
	$qy="insert into buy(id1,name,moblie,address,city,state,pincode,rand) values ('$id1','$name', '$moblie', '$address','$city','$state','$pincode','$rand')";

	mysqli_query($con,$qy);
	#header('location:login.html');
	mysqli_close($con);
?>
<h1>Select Payment method:</h1>
<center><table>
<tr>
<td>
<center><a href="depit.php">DEBIT CART</a></center>
</td>
</tr>
<tr>
<td>
<center><a href="credit.php">CREDIT CART</a></center>
</td>
</tr>
<tr>
<td>
<center><a href="upi.php">UPI</a></center>
</td>
</tr>
<tr>
<td>
<center><a href="netbanking.php">NET BANKING</a></center>
</td>
</tr>
<tr>
<td>
<center><a href="emi.php">EMI</a></center>
</td>
</tr>
<tr>
<td>
<center><a href="cod.php">CASH ON DELIVERY</a></center>
</td>
</tr>
</table>
</center>
</body>
</html>