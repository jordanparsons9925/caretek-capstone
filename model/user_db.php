<?php
    include("database.php");

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

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
                return $employee['Pos'];
            } else {
                return NULL;
            }

        } else {
            return "Client";
        }
    }

    $result = get_user_type($username, $password);
?>

<p>The result is: <?php echo $result; ?></p>