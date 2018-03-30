<?php 
$name=$_POST["name"];
$email=$_POST["email"];
$slot=$_POST["selection"];

// Create connection
 $conn = mysqli_connect('localhost','root',"","ranchimall");
 
// Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

if(isset($_POST['submit'])){
$sql = "SELECT mail,name,slot FROM details";
$s=mysqli_query($conn,$sql);
if(mysqli_num_rows($s)>= 200)
{
	echo "Sorry Registrations are over";
}else{
$sql = "SELECT mail,name,slot FROM details where mail='$email'";
$result = mysqli_query($conn, $sql);

if ( mysqli_num_rows($result) > 0) {
    echo"You have already registered through this email ";
	}
else
{
$sql = "INSERT INTO details(mail, name, slot)
 VALUES ('$email', '$name', '$slot')";
 if (mysqli_query($conn, $sql)) {
    echo "You have inserted Sucssesfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
	
}
}
}
?>