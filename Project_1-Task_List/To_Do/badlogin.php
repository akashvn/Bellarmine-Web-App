<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>

    

    <style>
    /*Used W3 schools to find and undertand all of the CSS*/
        body, html {
                height: 100%;
                background-color:aquamarine;
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;

            
        }
        .test2 {
            
            /*
            Formatting taken from 
            https://www.jotform.com/help/118-How-to-Customize-the-Submit-Button-with-CSS 
            */

            background: #422bd8; 

            color: white;

            border-style: outset;

            border-color: #422bd8;

            height: 19px;

            width: 50px;

            font: bold 10px arial, sans-serif;

            text-shadow:none;

        }
        

        
    
    
    </style>
    
        <title>To Do List Login</title>

    
</head>
<body>
    <h1><center>Unauthorized access detected.</center></h1>
    
    <?php
    
    //print_r($_SESSION);
    
    session_destroy();
?>
    
    <!--<p>You can use multiple usernames but your to do items will be stored only under one. It is highly reccomended to use the same username but you are not required to.</p>-->

    
    
    
    
</body>
</html>
