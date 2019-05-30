<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/22/2019
 * Time: 7:21 PM
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

$sql= "select u_username,u_rolecode,acc_data from system_users";
$result = mysqli_query($db,$sql);


echo '<!DOCTYPE html><html><head><meta charset="ISO-8859-1"><title>Admin</title>';
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
echo '<div id ="alert" style="text-align: center;"><h2>Welcome<u> '.$login_session.'! </u></h2></div>';
echo "<br>";
echo '<p> The last time you logged in is <span style="color: red">'.$LastLogin.'</span>. If this was not by you then please contact Admin.</p>';
echo "<br>";
echo "<br>";
echo '<p class="dashed">******** This system is for the use of authorized users only.
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
echo '<div id ="head"><h2>Users & Roles</h2></p>';

echo  '<table>';
echo '<tr>';
echo '<th>User Name</th>';
echo '<th>Role</th>';
echo '<th>Access of Data</th>';
echo '</tr>';
$i=1;
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>' . $row['u_username'] . '</td>';
    echo '<td>' . $row['u_rolecode'] . '</td>';
    echo '<td>' . $row['acc_data'] . '</td>';
    echo '</tr>';
}
echo '</table>';
echo '</body></html>';
//$_SESSION['role_code'] = $rolecode;
?>
<html">

<head>
</head>

<body>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>