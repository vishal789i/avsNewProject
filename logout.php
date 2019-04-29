<?php

   session_start();
    
   unset($_SESSION["startedOfAdmin"]);
   unset($_SESSION["startedOfStudent"]);
   
   echo 'You have succesfully logged out';
   header('Refresh: 2; URL = index.php');
?>