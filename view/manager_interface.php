<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$type = $_SESSION["userType"];
$testType = ($type == "Nurse Manager");
if (!$testType)
    header("Location: ../");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.css' rel='stylesheet'/>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js'></script>
    <title>Document</title>
</head>
<body>
    <p>NURSE MANAGER INTERFACE</p>
    <style>
        body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
        font-size: 14px;
        }

        #calendar {
        max-width: 900px;
        margin: 0 auto;
        }

        #wrap {
        width: 1100px;
        margin: 0 auto;
        }

        .closeon {
        border-radius: 5px;
        }

        /*info btn*/
        .dropbtn {
            /*background-color: #4CAF50;*/
            background-color: #eee;
            margin: 10px;
            padding: 8px 16px 8px 16px;
            font-size: 16px;
            border: none;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 200px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        margin-left: 100px;
        margin-top: -200px;
        }

        .dropdown-content p {
            color: black;
            padding: 4px 4px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: grey;}

        .dropdown:hover .dropbtn span {color: white}

    </style>
    
    <div id='calendar'></div>

    <div class="dropdown">
    <div class="dropdown-content">
    <p>Click a calendar date to invoke a prompt box.</p>
    <p>Add text to input and click "OK."</p>
    <p>Click event to re-enable editing. Add new text and click "OK".</p>
    <p>Click "x" to delete event.</p>
  </div>
  <button class="fa dropbtn" style="font-size:24px; margin-left: 75%; color: black"><span>&#xf128;</span></button>
  
</div>
</body>
</html>