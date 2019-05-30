<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/22/2019
 * Time: 10:10 PM
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

$sql= "SELECT system_users.u_username, role.role_rolename, role_rights.rr_create,role_rights.rr_delete,role_rights.rr_edit,
role_rights.rr_view
FROM system_users join role ON system_users.u_rolecode = role.role_rolecode
join role_rights ON role.role_rolecode = role_rights.rr_rolecode  where u_username !='$login_session'";
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
echo '<p class="dashed">******** This system is for the use of authorized superadmin only.
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
echo '<div id ="head"><h2>Users & Roles</h2></div>';

echo  '<table>';
echo '<tr>';
echo '<th>User Name</th>';
echo '<th>Role</th>';
echo '<th>Create</th>';
echo '<th>Delete</th>';
echo '<th>Edit</th>';
echo '<th>View</th>';
echo '<th>Delete the Users</th>';

echo '</tr>';
$i=1;
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<td>' . $row['u_username'] . '</td>';
    echo '<td>' . $row['role_rolename'] . '</td>';
    echo '<td>' . $row['rr_create'] . '</td>';
    echo '<td>' . $row['rr_delete'] . '</td>';
    echo '<td>' . $row['rr_edit'] . '</td>';
    echo '<td>' . $row['rr_view'] . '</td>';
    $usname=$row['u_username'];
    echo '<td><a href=delete.php?id='.$usname.'>Delete</a></td>';
    echo '</tr>';
}
echo '</table>';
echo '</body></html>';
?>
<html">

<head>
</head>

<body>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>