        function insert(thing)
        {
            <?php
            $actual=namel;
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





                
            $win = "SELECT Wins FROM Akash_TicTacToe WHERE Name='$name'";
            $loss = "SELECT Losses FROM Akash_TicTacToe WHERE Name='$name'";
            $tie = "SELECT Ties FROM Akash_TicTacToe WHERE Name='$name'";
            
            if(thing=="win")
            {
                $win=intval($win)+1;
            }
            if($loss=="loss")
            {
                $loss=intval($loss)+1;
            }
            if(thing=="tie")
            {
                $tie=intval($tie)+1;
            }



            // Setup the SQL statement
            $sql = "INSERT INTO Akash_TicTacToe (Name, Wins,Loses,Ties)
            VALUES ('$name', '$win', '$loss', '$tie')";














            // Execute the SQL on the server:
            if ($conn->query($sql) === TRUE) {
                echo( '<h3>New record created successfully</h3>' );
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error ;
            }

            // Fun over... close up and go home...
            $conn->close();
            
            ?>


        }