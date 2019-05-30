<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/22/2019
 * Time: 11:19 PM
 */



include('Config.php');
session_start();
date_default_timezone_set("America/Chicago");
echo "You have logged in at " . date("M,d,Y h:i:s A")." !!!";
$login_session = $_SESSION['user'];
$sqlLastLogin= "select LoginTime from system_users where u_username='$login_session'";

$resultLastLogin = mysqli_query($db,	$sqlLastLogin);
while ($row = $resultLastLogin->fetch_assoc()) {
            $LastLogin = $row['LoginTime'];
        }


$sqlLogin= "UPDATE system_users SET LoginTime=NOW() where u_username='$login_session'";
$resultLogin = mysqli_query($db,$sqlLogin);

$sql= "select orders.OrderID,products.ProductName,orders.OrderDate,orders.ShippedDate,orders.ShipCity,orders.ShipCountry,
products.UnitsInStock,products.UnitsOnOrder,products.Discontinued
from orders join order_details on orders.OrderID=order_details.OrderID
join products on order_details.ProductID=products.ProductID";
$result = mysqli_query($db,$sql);

echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>AM</title>';
echo '<link rel="stylesheet" type="text/css" href="Style.css">';
echo '</head>';
echo '<style> 
p.dashed {border: 1px solid black;
  margin-top: 30px;
  margin-bottom: 50px;
  margin-right: 400px;
  margin-left: 5px;
  padding: 25px;
  background-color: lightblue;}
</style>';
echo '<body>';
echo '<div id ="head: style="text-align: center;"><h2>Welcome<u> '.$login_session.'! </u></h2></div>';
echo '<p> The last time you logged in is <span style="color: red">'.$LastLogin.'</span>. If this was not by you then please contact Admin.</p>';
echo '<p class="dashed">******** This system is for the use of authorized Account Managers only.
Individuals using this computer system without
authority, or in excess of their authority, are subject
to having all of their activities on this system
monitored and recorded by system personnel.
In the course of monitoring individuals improperly using this
system, or in the course of system maintenance, the
activities of authorized users may also be monitored. 
Anyone using this system expressly consents to such
monitoring and is advised that if such monitoring
reveals possible evidence of criminal activity, system
personnel may provide the evidence of such monitoring
to law enforcement officials. **********</div>';
echo '<div id ="head"><h2>Below are the Product Details</h2></div>';

echo  '<table>';
echo '<tr>';
echo '<th>Order ID</th>';
echo '<th>Product Name</th>';
echo '<th>Order Date</th>';
echo '<th>Shipped Date</th>';
echo '<th>Ship City</th>';
echo '<th>Ship Country</th>';
echo '<th>Unit in Stock</th>';
echo '<th>Unit on Order</th>';
echo '<th>Discontinued</th>';

echo '</tr>';
$i=1;
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>' . $row['OrderID'] . '</td>';
    echo '<td>' . $row['ProductName'] . '</td>';
    echo '<td>' . $row['OrderDate'] . '</td>';
    echo '<td>' . $row['ShippedDate'] . '</td>';
    echo '<td>' . $row['ShipCity'] . '</td>';
    echo '<td>' . $row['ShipCountry'] . '</td>';
    echo '<td>' . $row['UnitsInStock'] . '</td>';
    echo '<td>' . $row['UnitsOnOrder'] . '</td>';
    echo '<td>' . $row['Discontinued'] . '</td>';

    echo '</tr>';
}
echo '</table>';
echo '</body></html>';
?>
<html">

<head>
</head>

<body>
<br>
<br>
<h1>Click below link to see the Security Training Records</h1>
<h2><a href="https://drive.google.com/drive/u/1/folders/1MJzlGa4x4ogL50XcwQ5-titwTwW947EX" >Security Training Records</a></h2>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>