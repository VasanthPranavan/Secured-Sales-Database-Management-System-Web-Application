<?php
/**
 * Created by IntelliJ IDEA.
 * User: priya
 * Date: 4/22/2019
 * Time: 9:57 PM
 */

   session_start();

   if(session_destroy()) {
       header("Location: index.php");
   }
?>