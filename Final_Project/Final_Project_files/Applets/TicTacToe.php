<!DOCTYPE html>
<html>
<head>

    <script type="text/javascript" src="/chessboardjs-0.3.0/js/jquery-1.10.1.min.js"></script>
    <script>
        function doSomething() {
            $.get("code.php");
            return false;
        }
    
    
    </script>

    <style>
    /*Used W3 schools to find and undertand all of the CSS*/
        body, html {
                height: 100%;
                /*background-color:lightsalmon;*/
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;


        
            
            
        }
        
        .game {
                margin: auto;
                width: 660px;
            
        }
        
        .test {
            


            background: #422bd8; 

            color: white;

            border-style: outset;

            border-color: #422bd8;

            height: 50px;

            width: 100px;

            font: bold 15px arial, sans-serif;

            text-shadow:none;

        }
  
        .square{
            text-align: center;
            vertical-align: middle;
            height: 160px;
            width: 160px;
            margin: 10px;
            display: inline-block;
            font-size: 100px;
            background-color: lightcoral;

        }
        
        .emptysquare{
            text-align: center;
            vertical-align: middle;
            height: 160px;
            width: 160px;
            margin: 10px;
            display: inline-block;
            font-size: 100px;
            background-color:lightcyan;
            pointer-events:none;

        }
        

    
    
    
    </style>
    
    <title>Tic Tac Toe</title>
    
</head>
<body onload="getName()">
    
    <h1><center>Tic Tac Toe</center></h1>
    
    <div class="game">
    <center>
        <span class="emptysquare" id=1 onclick="clicked(1)"></span>
        <span class="emptysquare" id=2 onclick="clicked(2)"></span>
        <span class="emptysquare" id=3 onclick="clicked(3)"></span>
        <span class="emptysquare" id=4 onclick="clicked(4)"></span>
        <span class="emptysquare" id=5 onclick="clicked(5)"></span>
        <span class="emptysquare" id=6 onclick="clicked(6)"></span>
        <span class="emptysquare" id=7 onclick="clicked(7)"></span>
        <span class="emptysquare" id=8 onclick="clicked(8)"></span>
        <span class="emptysquare" id=9 onclick="clicked(9)"></span>
    </center>
    <br><br>

    <center><button class="test" id="button" style="visibility: visible" onclick="setup()">Start Game</button></center><br>
    <!--<a href=""><center><button class="test" id="button2" style="visibility: visible">Leaderboard</button></center></a>-->

    
    
    
    
    
    </div>


    <script>
        var namel;

        
        var usersmove=true;
        var userSquaresindex=0;
        var userSquares = ["", "", "", "", ""];
        var computerSquaresindex=0;
        var computerSquares = ["", "", "", "", ""];

        function getName()
        {
            namel=prompt("What is your name? (Use the same name to save data)")
        }
        
        
        function isEmpty(value)
        {
            if(document.getElementById(value).classList.contains('square'))
            {
                return true;
            }
            return false;
        }
        
        function sendData(thing)
        {
            window.location.href="TicTacToe.php?nameofuser="+namel+"&game=done&value="+thing;
        }
        function setup()
        {
            document.getElementById("button").style.visibility = "hidden";
            document.getElementById("button").style.position = "absolute";
            document.getElementById("button").style.top = "-9999px";

            
            document.getElementById("1").classList.remove('emptysquare');
            document.getElementById("1").classList.add('square');
            document.getElementById("2").classList.remove('emptysquare');
            document.getElementById("2").classList.add('square');
            document.getElementById("3").classList.remove('emptysquare');
            document.getElementById("3").classList.add('square');
            document.getElementById("4").classList.remove('emptysquare');
            document.getElementById("4").classList.add('square');
            document.getElementById("5").classList.remove('emptysquare');
            document.getElementById("5").classList.add('square');
            document.getElementById("6").classList.remove('emptysquare');
            document.getElementById("6").classList.add('square');
            document.getElementById("7").classList.remove('emptysquare');
            document.getElementById("7").classList.add('square');
            document.getElementById("8").classList.remove('emptysquare');
            document.getElementById("8").classList.add('square');
            document.getElementById("9").classList.remove('emptysquare');
            document.getElementById("9").classList.add('square');
            
            



        }
        
        function clicked(value)
        {

            if(usersmove)
            {
                document.getElementById(value).classList.remove('square');
                document.getElementById(value).classList.add('emptysquare');
                usersmove=false;
                document.getElementById(value).innerHTML = "X";
                userSquares[userSquaresindex]=value;
                userSquaresindex++;
                if(checkwin())
                {
                    
                }
                else{
                    computerMove();
                }
            }

        }
        function tie()
        {
            var x = confirm("The game was a tie. Would you like to play again?");
            //sendData("tie");
            
            
            if(x)
            {
                setTimeout(function() {
                    location.reload;
                }, (3 * 1000));     
            } 
            
            
        }
        function checkwin()
        {
            if(userhasv2(1,2,3))
            {
                userwin();
                return true;
            }
            else if(userhasv2(4,5,6))
            {
                userwin();
                return true;
            }
            else if(userhasv2(7,8,9))
            {
                userwin();
                return true;
            }
            else if(userhasv2(1,4,7))
            {
                userwin();
                return true;
            }
            else if(userhasv2(2,5,8))
            {
                userwin();
                return true;
            }
            else if(userhasv2(3,6,9))
            {
                userwin();
                return true;
            }
            else if(userhasv2(1,5,9))
            {
                userwin();
                return true;
            }
            else if(userhasv2(3,5,7))
            {
                userwin();
                return true;
            }
            
            else if(comphasv2(1,2,3))
            {
                compwin();
                return true;
            }
            else if(comphasv2(4,5,6))
            {
                compwin();
                return true;
            }
            else if(comphasv2(7,8,9))
            {
                compwin();
                return true;
            }
            else if(comphasv2(1,4,7))
            {
                compwin();
                return true;
            }
            else if(comphasv2(2,5,8))
            {
                compwin();
                return true;
            }
            else if(comphasv2(3,6,9))
            {
                compwin();
                return true;
            }
            else if(comphasv2(1,5,9))
            {
                compwin();
                return true;
            }
            else if(comphasv2(3,5,7))
            {
                compwin();
                return true;
            }
            return false;
        }
        
        function compwin()
        {
            var x =confirm("The game was a loss. Would you like to play again?");
                     // sendData("loss");
            
            if(x)
            {
                setTimeout(function() {
                    location.reload;
                }, (3 * 1000));     
            }    
            
        }
        function userwin()
        {
            var x=confirm("You Won! Would you like to play again?");
                      //sendData("win");

            if(x)
            {
                setTimeout(function() {
                    location.reload;
                }, (3 * 1000));     
            }
            
        }
        function userhasv2(val1, val2, val3)
        {
            var first=false;
            var two=false;
            var three=false;
            for(i=0; i<userSquares.length;i++)
            {
                if(userSquares[i]==val1)
                {
                    first=true;
                }
                if(userSquares[i]==val2)
                {
                    two=true;
                }
                if(userSquares[i]==val3)
                {
                    three=true;
                }
            }
            if(first && two && three)
                return true;
            else
                return false;
        }
        
        function comphasv2(val1, val2, val3)
        {
            var first=false;
            var two=false;
            var three=false;
            for(i=0; i<computerSquares.length;i++)
            {
                if(computerSquares[i]==val1)
                {
                    first=true;
                }
                if(computerSquares[i]==val2)
                {
                    two=true;
                }
                if(computerSquares[i]==val3)
                {
                    three=true;
                }
            }
            
            if(first && two && three)
                return true;
            else
                return false;
        }
        
        function computerMove()
        {
            if(Comphas(1,2) && isEmpty(3))
            {
                computerDo(3);
            }
            else if(Comphas(1,3) && isEmpty(2))
            {
                computerDo(2);
            }
            else if(Comphas(2,3) && isEmpty(1))
            {
                computerDo(1);
            }
            else if(Comphas(4,5) && isEmpty(6))
            {
                computerDo(6);
            }
            else if(Comphas(4,6) && isEmpty(5))
            {
                computerDo(5);
            }
            else if(Comphas(5,6) && isEmpty(4))
            {
                computerDo(4);
            }
            else if(Comphas(7,8) && isEmpty(9))
            {
                computerDo(9);
            }
            else if(Comphas(7,9) && isEmpty(8))
            {
                computerDo(8);
            }
            else if(Comphas(8,9) && isEmpty(7))
            {
                computerDo(7);
            }
            
            else if(Comphas(1,4) && isEmpty(7))
            {
                computerDo(7);
            }
            else if(Comphas(1,7) && isEmpty(4))
            {
                computerDo(4);
            }
            else if(Comphas(4,7) && isEmpty(1))
            {

                computerDo(1);
            }
            else if(Comphas(2,5) && isEmpty(8))
            {
                computerDo(8);
            }
            else if(Comphas(5,8) && isEmpty(2))
            {
                computerDo(2);
            }
            else if(Comphas(2,8) && isEmpty(5))
            {
                computerDo(5);
            }
            else if(Comphas(3,6) && isEmpty(9))
            {
                computerDo(9);
            }
            else if(Comphas(6,9) && isEmpty(3))
            {
                computerDo(3);
            }
            else if(Comphas(3,9) && isEmpty(6))
            {
                computerDo(6);
            }
            
            else if(Comphas(1,5) && isEmpty(9))
            {
                computerDo(9);
            }
            else if(Comphas(1,9) && isEmpty(5))
            {
                computerDo(5);
            }
            else if(Comphas(5,9) && isEmpty(1))
            {

                computerDo(1);
            }
            else if(Comphas(3,5) && isEmpty(7))
            {
                computerDo(7);
            }
            else if(Comphas(5,7) && isEmpty(3))
            {
                computerDo(3);
            }
            else if(Comphas(3,7) && isEmpty(5))
            {
                computerDo(5);
            }
            
            
            
            
            else if(Userhas(1,2) && isEmpty(3))
            {
                computerDo(3);
            }
            else if(Userhas(1,3) && isEmpty(2))
            {
                computerDo(2);
            }
            else if(Userhas(2,3) && isEmpty(1))
            {

                computerDo(1);
            }
            else if(Userhas(4,5) && isEmpty(6))
            {
                computerDo(6);
            }
            else if(Userhas(4,6) && isEmpty(5))
            {
                computerDo(5);
            }
            else if(Userhas(5,6) && isEmpty(4))
            {
                computerDo(4);
            }
            else if(Userhas(7,8) && isEmpty(9))
            {
                computerDo(9);
            }
            else if(Userhas(7,9) && isEmpty(8))
            {
                computerDo(8);
            }
            else if(Userhas(8,9) && isEmpty(7))
            {
                computerDo(7);
            }
            
            else if(Userhas(1,4) && isEmpty(7))
            {
                computerDo(7);
            }
            else if(Userhas(1,7) && isEmpty(4))
            {
                computerDo(4);
            }
            else if(Userhas(4,7) && isEmpty(1))
            {

                computerDo(1);
            }
            else if(Userhas(2,5) && isEmpty(8))
            {
                computerDo(8);
            }
            else if(Userhas(5,8) && isEmpty(2))
            {
                computerDo(2);
            }
            else if(Userhas(2,8) && isEmpty(5))
            {
                computerDo(5);
            }
            else if(Userhas(3,6) && isEmpty(9))
            {
                computerDo(9);
            }
            else if(Userhas(6,9) && isEmpty(3))
            {
                computerDo(3);
            }
            else if(Userhas(3,9) && isEmpty(6))
            {
                computerDo(6);
            }
            
            else if(Userhas(1,5) && isEmpty(9))
            {
                computerDo(9);
            }
            else if(Userhas(1,9) && isEmpty(5))
            {
                computerDo(5);
            }
            else if(Userhas(5,9) && isEmpty(1))
            {

                computerDo(1);
            }
            else if(Userhas(3,5) && isEmpty(7))
            {
                computerDo(7);
            }
            else if(Userhas(5,7) && isEmpty(3))
            {
                computerDo(3);
            }
            else if(Userhas(3,7) && isEmpty(5))
            {
                computerDo(5);
            }
            
            
            else if(document.getElementById("5").classList.contains('square'))
            {
                computerDo(5);
            }
            else if(true && isEmpty(1))
            {
                computerDo(1)
            }
            else if(true && isEmpty(2))
            {
                computerDo(2)
            }
            else if(true && isEmpty(3))
            {
                computerDo(3)
            }
            else if(true && isEmpty(4))
            {
                computerDo(4)
            }
            else if(true && isEmpty(6))
            {
                computerDo(6)
            }
            else if(true && isEmpty(7))
            {
                computerDo(7)
            }
            else if(true && isEmpty(8))
            {
                computerDo(8)
            }
            else if(true && isEmpty(9))
            {
                computerDo(9)
            }
            else
            {
                tie();
            }
            
        }
        function Userhas(val1, val2)
        {
            var first=false;
            var two=false;
            for(i=0; i<userSquares.length;i++)
            {
                if(userSquares[i]==val1)
                {
                    first=true;
                }
                if(userSquares[i]==val2)
                {
                    two=true;
                }
            }
            
            if(first && two)
                return true;
            else
                return false;
        }
        
        function Comphas(val1, val2)
        {
            var first=false;
            var two=false;
            for(i=0; i<computerSquares.length;i++)
            {
                if(computerSquares[i]==val1)
                {
                    first=true;
                }
                if(computerSquares[i]==val2)
                {
                    two=true;
                }
            }
            
            if(first && two)
                return true;
            else
                return false;
        }
        
        
        function computerDo(value)
        {

                document.getElementById(value).classList.remove('square');
                document.getElementById(value).classList.add('emptysquare');
                document.getElementById(value).innerHTML = "O";
                computerSquares[computerSquaresindex]=value;
                computerSquaresindex++;
                usersmove=true;
                checkwin();

        }
        

        

    </script>
    

            <!--
    
            $actual = $_GET["nameofuser"];
                $servername = "localhost";
                $username = "playground18";
                $password = "Cdz5SOVrY2p8fnWS";
                $dbname = "playground18";


                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                //echo( "<h3>Connected to $dbname</h3>");














                $name = trim($actual);
                echo( "<h3>Inserting (after escaping): $name</h3>" );
                if( strlen($name) > 100 || strlen($name)< 1 ) {
                    echo( '<h1>Invalid name!</h1>');
                    exit();
                }

                // Update name to escape special symbols that could allow SQL injection attack
                $name = $conn->real_escape_string($name);
                $thing= $_GET["value"];

    
    
            $sql = "INSERT INTO Akash_TicTacToe (Name, Wins,Losses,Ties)
                VALUES ('$name', '0', '0', '0')";




                //echo "<script>alert('$sql');</script>"; 









                // Execute the SQL on the server:
                if ($conn->query($sql) === TRUE) {
                    //echo( '<h3>New record created successfully</h3>' );
                } else {
                    //echo "Error: " . $sql . "<br>" . $conn->error ;
                }

                // Fun over... close up and go home...
                $conn->close();
                
                //echo "window.location.href=TicTacToe.php";
    
    
    
    
            $postingdatatodo=$_GET["game"];
            if($postingdatatodo=="done")
            {

                $actual = $_GET["nameofuser"];
                $servername = "localhost";
                $username = "playground18";
                $password = "Cdz5SOVrY2p8fnWS";
                $dbname = "playground18";


                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                //echo( "<h3>Connected to $dbname</h3>");














                $name = trim($actual);
                echo( "<h3>Inserting (after escaping): $name</h3>" );
                if( strlen($name) > 100 || strlen($name)< 1 ) {
                    echo( '<h1>Invalid name!</h1>');
                    exit();
                }

                // Update name to escape special symbols that could allow SQL injection attack
                $name = $conn->real_escape_string($name);
                $thing= $_GET["value"];





                $win = query("SELECT Wins FROM Akash_TicTacToe WHERE Name='$name'");
                $loss = query("SELECT Losses FROM Akash_TicTacToe WHERE Name='$name'");
                $tie = query("SELECT Ties FROM Akash_TicTacToe WHERE Name='$name'");

                if($thing=="win")
                {
                    $win=intval($win)+1;
                }
                if($thing=="loss")
                {
                    $loss=intval($loss)+1;
                }
                if($thing=="tie")
                {
                    $tie=intval($tie)+1;
                }

                echo "<script type='text/javascript'>alert('$tie');</script>"; 

                $id=0;
                // Setup the SQL statement
                $sql = "UPDATE Akash_TicTacToe SET Wins='$win', Losses='$loss', Ties='$tie' WHERE Name='$name'";




                //echo "<script>alert('$sql');</script>"; 









                // Execute the SQL on the server:
                if ($conn->query($sql) === TRUE) {
                    echo( '<h3>New record created successfully</h3>' );
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error ;
                }

                // Fun over... close up and go home...
                $conn->close();
                
                //echo "window.location.href=TicTacToe.php";

            
            }
    -->
    
            


    
    
    
    
    
    
</body>
</html>
