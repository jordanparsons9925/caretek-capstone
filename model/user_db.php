<?php
    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    console_log("php file opened");

    include("database.php");

    function get_user_type($username, $password) {
        global $db;
        $userInfo = array("", "");

        $query = 'SELECT client.Username 
                    FROM client
                    WHERE client.Username = :username AND
                    client.Password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $client = $statement->fetch();
        $statement->closeCursor();
        
        if ($client == NULL) {
            $query = 'SELECT position.PositionName AS Pos
                        FROM employee, position
                        WHERE employee.PositionID = position.PositionID AND
                            employee.Username = :username AND
                            employee.Password = :password';
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $employee = $statement->fetch();
            $statement->closeCursor();

            if ($employee != NULL) {
                echo $employee['Pos'];
            } else {
                echo NULL;
            }

        } else {
            echo "Client";
        }
    }

    get_user_type($_POST["username"], $_POST["password"]);
?>