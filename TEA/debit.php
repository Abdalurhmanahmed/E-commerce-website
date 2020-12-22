<?php
<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "tea"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

// Insert query 
//$query = "insert into users(username,fname,lname) values('sonarika','Sonarika','Bhadoria')"; 

mysqli_query($con,$query); 

// Get last insert id 
$lastid = mysqli_insert_id($con); 

echo "last id : ".$lastid; 
?>



?>