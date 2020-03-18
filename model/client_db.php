<?php
    include("database.php");
    function get_user_credentials($username) {
        $userInfo = array("", "");

        global $db;
        $query = 'SELECT client.Password 
                    FROM client
                    WHERE client.Username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $client = $statement->fetch();
        $statement->closeCursor();
        
        if ($client == NULL) {
            $query = 'SELECT employee.Password AS Pass, position.PositionName AS Pos
                        FROM employee, position
                        WHERE employee.PositionID = position.PositionID AND
                            employee.Username = :username';
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->execute();
            $employee = $statement->fetch();
            $statement->closeCursor();

            if (count($employee) != NULL) {
                $userInfo[0] = $employee['Pass'];
                $userInfo[1] = $employee['Pos'];
                return $userInfo;
            } else {
                return NULL;
            }

        } else {
            $userInfo[0] = $client['Password'];
            $userInfo[1] = "Client";
            return $userInfo;
        }
    }
?>