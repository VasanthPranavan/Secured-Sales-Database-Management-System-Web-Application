<?php
  // include('session.php');
session_start();
date_default_timezone_set("America/Chicago");

$login_session = $_SESSION['login_user'];
$_SESSION['user'] = $login_session;
$active = $_SESSION['active'];
if ($active == 'ADMIN') {

    header( "Location: Admin.php" );
} elseif ($active =='SUPERADMIN') {
    header( "Location: Superadmin.php" );
} elseif ($active === 'HR') {
    header( "Location: hr.php" );
} elseif ($active == 'AM'){
    header( "Location: sales.php" );
} elseif ($active = 'end-user') {
    header( "Location: endusers.php" );
}   else {
echo "hello";
}
?>
