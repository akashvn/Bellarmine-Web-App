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

<p></p>
<?php
function sanitize($data)
		{
			// apply stripslashes if magic_quotes_gpc is enabled
			if(get_magic_quotes_gpc()) 
			{
				$data = stripslashes($data); 
			}
			return $data;
		}


try
{
  $user = sanitize($_GET['Username']);
  $pass = sanitize($_GET['Password']);


                $servername = "localhost";
                $username = "playground18";
                $password = "Cdz5SOVrY2p8fnWS";
                $dbname = "playground18";

		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT count(*) FROM `Akash_Login` WHERE id > 0"; 
        $result = $conn->prepare($sql); 
		$result->execute(); 
		$number_of_rows = $result->fetchColumn();
        //echo "There are $number_of_rows and I think the user is $user and the pass is $pass";



    for($x = 1; $x <= $number_of_rows; $x++) 
    {
        //echo "There are $number_of_rows and I think the user is $user and the pass is $pass";
        
        	$queryuser = "SELECT name FROM `Akash_Login` WHERE id = $x";
            $userresult = $conn->prepare($queryuser); 
            $userresult->execute();
            $uresult = $userresult->fetchcolumn();
            $querypass = "SELECT password FROM `Akash_Login` WHERE id = $x";
            $passresult = $conn->prepare($querypass); 
            $passresult->execute();
            $presult = $passresult->fetchColumn();
        
        //echo "the username is $user and the actual is $uresult and the password is $pass and the actual is $presult and x is $x";

        if($user===$uresult)
        {
            if($pass===$presult)
            {
                $_SESSION["stat"] = "authorized";
                $_SESSION["name"] = $user;
                $x=$x+600;
                print_r($_SESSION);

                header('Location: To_Do_List.php');
            }
            else
            {
                if ($x==$number_of_rows)
                {
                    session_destroy();
                    echo "Wrong Username or Password";
                }            
            }
        }
        else{
                if ($x==$number_of_rows)
                {
                    session_destroy();
                    echo "Wrong Username or Password";
                }
        }
    }

    
    //echo "x is $x but the number of is $number_of_rows";
}
catch(PDOException $e) {
    		echo "Error: " . $e->getMessage();

}

?>
        
        
        </body>
</html>