.<!DOCTYPE html>
<html>
<head>

    

    <style>
    
        body, html {
            height: 100%;
            background-color: aquamarine;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            
        }
        
        


    
    
    
    </style>
    
    <style>

        .tablink {
          background-color: #555;
          color: white;
          float: left;
          border: none;
          outline: none;
          cursor: pointer;
          padding: 14px 16px;
          font-size: 17px;
          width: 25%;
        }

        .tablink:hover {
          background-color: #777;
        }

        /* Style the tab content */
        .tabcontent {
          color: white;
          display: none;
          padding: 50px;
          text-align: center;
        }

        #Clock {background-color:red;}
        #Timer {background-color:green;}
        #Countdown {background-color:blue;}
        
    </style>
    
            <title>Clock</title>

    
</head>
<body>
    
    <div id="Clock" class="tabcontent">
      <h1>Clock</h1>
      
        
        
        
        <?php
            date_default_timezone_set('America/Los_Angeles');

    
            $time = time();
            $today = date("D M j G:i:s T Y") ."\n"; 
            $date = "The time is:   $today";
            echo"<h1>";
            print("$date\n");
            echo"</h1>";


            echo "<br>";
            echo "<br>";




        ?>
        <p>Refresh page to update</p>
    </div>

    
            <?php
                date_default_timezone_set('America/Los_Angeles');

    
                $time = time();
                $today2 = date("M j, Y G:i:s"); 
            ?>
    
    
    <div id="Timer" class="tabcontent">
      <h1>Timer</h1>
        
        
        <p id="test"></p>


        <script>
            
                var now = null;
                
                now = new Date().getTime();
            function run2() {
                // Set the date we're counting down to
  

                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get todays date and time
                  var timeup = new Date().getTime();

                  // Find the distance between now and the count down date
                  var distance = timeup - now;

                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  // Output the result in an element with id="demo"
                  document.getElementById("test").innerHTML = days + "d " + hours + "h "
                  + minutes + "m " + seconds + "s ";


                  // If the count down is over, write some text 
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("test").innerHTML = "EXPIRED";
                  }
                }, 1000);
            }
        </script>
    </div>

    <div id="Countdown" class="tabcontent">
      <h1>Countdown</h1>
        <p id="demo"></p>

        <script>
            function run() {
                var test = prompt("Enter date that you want to countdown towards. Enter in the format Jan 5, 2019 15:37:25 to minimize errors");
                // Set the date we're counting down to
                var countDownDate = new Date(test).getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get todays date and time
                  var now = new Date().getTime();

                  // Find the distance between now and the count down date
                  var distance = countDownDate - now;

                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                  // Output the result in an element with id="demo"
                  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                  + minutes + "m " + seconds + "s ";

                  // If the count down is over, write some text 
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                  }
                }, 1000);
            }
        </script>

    </div>



    <button class="tablink" onclick="openItem('Clock', this, 'red')" id="defaultOpen">Clock</button>
    <a onclick="run2()"><button class="tablink" onclick="openItem('Timer', this, 'green')">Timer</button></a>
    <a onclick="run()"><button class="tablink" onclick="openItem('Countdown', this, 'blue')">Countdown</button></a>

    <script>
        function openItem(ItemName,elmnt,color) {
            
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(ItemName).style.display = "block";
            elmnt.style.backgroundColor = color;

        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
    
</body>
</html>
