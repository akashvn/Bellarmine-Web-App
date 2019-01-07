       <?php
    session_start();
?>


<!DOCTYPE html>
<html>
<head>
    
        <meta http-equiv="refresh" content="1; url=http://times.bcp.org/webs/apps18/akash/To_Do/To_Do_List.php" />
    
    
        <style>
    /*Used W3 schools to find and undertand all of the CSS*/
        body, html {
                height: 100%;
                background-color:aquamarine;
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;

            
        }
            
    </style>
    
<title>Login PHP todo</title>
    </head>
    <body>         

<?php
                $name = $_SESSION["name"];
                $prio = $_GET['prio'];
                $comment = $_GET['Comment'];
                $todo = $_GET['Todo'];


                $servername = "localhost";
                $username = "playground18";
                $password = "Cdz5SOVrY2p8fnWS";
                $dbname = "playground18";


                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    echo "problem";
                } 

                $id=0;
                $sql = "INSERT INTO Akash_ToDo (Id, user, todo, comment, priority) VALUES ('$id', '$name', '$todo', '$comment', '$prio')";
                //echo "$sql";

                $result = $conn->prepare($sql); 
		        $result->execute(); 

            header("LOCATION: To_Do_List.php");
        echo "<script>window.location.reload()</script>";

                
                
?>
       <p>Oopsie. If you're on this page, that means that Akash made a mistake. Click <a href="logintodo.html">here</a> to go back to familiar territory.</p> 
        
        
        
    </body>
</html>