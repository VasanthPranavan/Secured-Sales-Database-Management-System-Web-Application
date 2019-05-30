<?php
include('Config.php');
$u_username = $_GET['id'];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
/*$dbname = "sales";
$conn = mysqli_connect("localhost", "root", "", $dbname);*/
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM system_users WHERE u_username = '$u_username'"; 

if (mysqli_query($db, $sql)) {
   mysqli_close($db);
   echo "User deleted Successfully";
    exit;	
} else {
    echo "Error deleting record";
}
?>
<html">

<head>
</head>

<body>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>
