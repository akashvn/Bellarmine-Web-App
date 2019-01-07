<?php
session_start();

?>



<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
<title>Login PHP todo</title>
    </head>
    <body>



<?php


session_destroy();
header("LOCATION: http://www.google.com");



?>
        
    </body>
</html>