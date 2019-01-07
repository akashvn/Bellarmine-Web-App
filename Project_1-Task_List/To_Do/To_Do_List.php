<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>

    
<?php
    if(isset($_SESSION['stat']))
    {

        
    }
    else
    {

        header('Location: badlogin.php');
    }
    
    
    ?>
    <style>
    /*Used W3 schools to find and undertand all of the CSS*/
        body, html {
                height: 100%;
                background-color:aquamarine;
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            box-sizing: border-box;

            
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
        #Opening
        {
            padding: 15px;
            background-color: bisque;
        }
        
        
        ul {
            margin: 0px;
            padding: 0px;
        }
        
        ul li {
            /*cursor:crosshair;*/
            position: relative;
            padding: 10px 8px 15px 50px;
            background-color: coral;
            font-size: 16px;
            transition: 0.2s;

            /*pointer-events:none;*/

        }
        
        
        
        ul li:hover {
          background-color:lightblue;
        }

        ul li.checked {
          background-color: gainsboro;
          color:aliceblue;
          text-decoration:line-through;
        }
        
        
        .green
        {
            background-color:greenyellow;
        }
        .green:hover
        {
            background-color:darkseagreen;
        }
        .blue
        {
            background-color:skyblue;
        }
        .blue:hover
        {
            background-color:deepskyblue;
        }
        .red
        {
            background-color:blueviolet;
        }
        .red:hover
        {
            background-color:darkviolet;
        }
        .delete
        {
            float: right;
            padding: 10px 17px 7px 16px;
            
        }
        .delete:hover
        {
            background-color: red;
        }


        
    
    
    </style>
    
        <title>To Do List</title>

    
</head>
<body>
    <h1><center>To Do List</center></h1>
    <center>            <a href="exit.php"> <button class="test2" onclick="exit.php">Logout</button></a>
</center><br><br>
    <p>Green represents priority level 1. Blue represents priority level 2. Purple represents priority level 3. Click on the to do item to show comments. You must also click on the × 2 times to delete.</p>
    <br>
    <br>
        <div id="Opening">
    
            <form action="recieve.php" method="get">
            
                <input name="Todo" type="text" id="input" placeholder="Add To Do...">
                <input name="Comment" type="text" id="input" placeholder="Comments">
                <input name="prio" type="number" min="1" max="3" value="1">
                <input class="test2" type="submit" value="Submit">
            
            </form>
        </div>

<br><br><br>

        <ul id="List">
            <?php
            
                $name=$_SESSION['name'];
            
                $servername = "localhost";
                $username = "playground18";
                $password = "Cdz5SOVrY2p8fnWS";
                $dbname = "playground18";

                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT count(*) FROM `Akash_ToDo` WHERE (id > 0 AND user='$name')"; 
                $result = $conn->prepare($sql); 
                $result->execute(); 
                $number_of_rows = $result->fetchColumn();
                //echo "There are $number_of_rows and I think the user is $user and the pass is $pass";
                //echo "$number_of_rows and his naame is $name";


            for($x = 1; $x <= $number_of_rows; $x++) 
            {
                $y=$x-1;
                
                $sql2 = "SELECT todo FROM Akash_ToDo WHERE user='$name' LIMIT 1 OFFSET $y";
                $result2 = $conn->prepare($sql2);
                $result2->execute();
                $output = $result2->fetchColumn();
                
                $sql3 = "SELECT comment FROM Akash_ToDo WHERE user='$name' LIMIT 1 OFFSET $y";
                $result3 = $conn->prepare($sql3);
                $result3->execute();
                $output2 = $result3->fetchColumn();
                
                $sql4 = "SELECT priority FROM Akash_ToDo WHERE user='$name' LIMIT 1 OFFSET $y";
                $result4 = $conn->prepare($sql4);
                $result4->execute();
                $output3 = $result4->fetchColumn();
                
                $sql5 = "SELECT Id FROM Akash_ToDo WHERE user='$name' LIMIT 1 OFFSET $y";
                $result5 = $conn->prepare($sql5);
                $result5->execute();
                $output4 = $result5->fetchColumn();
                
                $sql6 = "SELECT display FROM Akash_ToDo WHERE user='$name' LIMIT 1 OFFSET $y";
                $result6 = $conn->prepare($sql6);
                $result6->execute();
                $output5 = $result6->fetchColumn();
                
                
                
                //echo "working i guess";
                
                if($output5=="0")
                {
                    if($output3=="1")
                    {
                        echo "<li class='green'><a onclick='runAlert(\"$output2\")'>$output</a><a class='delete' href=\"To_Do_List.php?id=$output4\">×</a></li>";
                    }
                    else if($output3=="2")
                    {
                        echo "<li class='blue'><a onclick='runAlert(\"$output2\")'>$output</a><a class='delete' href=\"To_Do_List.php?id=$output4\">×</a></li>";
                    }
                    else if($output3=="3")
                    {
                        echo "<li class='red'><a onclick='runAlert(\"$output2\")'>$output</a><a class='delete' href=\"To_Do_List.php?id=$output4\">×</a></li>";

                    }

                }
                
                
                

                
                
            }
            //$conn->close();
            
            if (isset($_GET['id'])) {
                runDelete($_GET['id']);
            }

            function runDelete(string $thing) 
            {
                
                $counterok=0;
                $item = $thing;
                //echo "$thing is the id";
                
                
                $name = $_SESSION["name"];


                $servername = "localhost";
                $username = "playground18";
                $password = "Cdz5SOVrY2p8fnWS";
                $dbname = "playground18";


                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $id=$thing;
                

                $sql = "UPDATE Akash_ToDo SET display='1' WHERE Id=$id;";
                //echo "$sql";
                
                
                if ($conn->query($sql) === TRUE) {
                //    echo "Record updated successfully";
                    
                    //sleep(1);
                    header("LOCATION: redirect.html");
                    /*if($counterok==0)
                    {
                        echo "<script>window.location.reload()</script>";
                    }
                    $counterok=$counterok+1;*/
                } else {
                //    echo "Error updating record: " . $conn->error;
                }
                /*
                $result = $conn->prepare($sql); 
		        $result->execute(); */
                //header("LOCATION: http://times.bcp.org/webs/apps18/akash/To_Do/To_Do_List.php");
                //echo "<script>window.location.reload()</script>";

                $conn->close();


            }
            
            ?>
            
            <!--<li class="blue"><a onclick='runAlert("$output2")'>Do CS Project</a><a class="delete">×</a></li>-->

            
            <!--<a onclick='runAlert("lol")'><li style='background-color:mediumvioletred;'>$output</li></a>
            <li>Do CS Project</li>
            <li>Make my bed</li>-->

        </ul>

    <script>
        function runAlert(content) 
        {
            alert("Comments: "+ content);
        }
    
    
    </script>
    
    
    
    
    
    
    
</body>
</html>
