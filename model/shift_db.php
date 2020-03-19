<?php
    include("database.php");

    function get_pca_schedule($username) {
        global $db;
    
        $query = 'SELECT * FROM shift
                    WHERE shift.PCAUsername = :username
                    ORDER BY shift.StartTime';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $schedule = $statement->fetchAll();
        $statement->closeCursor();
    
        return json_decode($schedule);
    }

    function get_client_schedule($username) {
        global $db;

        $query = 'SELECT * FROM shift
                    WHERE shift.ClientUsername = :username
                    ORDER BY shift.StartTime';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $schedule = $statement->fetchAll();
        $statement->closeCursor();

        return json_decode($schedule);
    }

    function get_pca_client_schedule($pcauser, $clientuser) {
        global $db;

        $query = 'SELECT * FROM shift
                    WHERE shift.ClientUsername = :clientuser
                    AND shift.PCAUsername = :pcauser
                    ORDER BY shift.StartTime';
        $statement = $db->prepare($query);
        $statement->bindValue(':clientuser', $clientuser);
        $statement->bindValue(':pcauser', $pcauser);
        $statement->execute();
        $schedule = $statement->fetchAll();
        $statement->closeCursor();

        return json_decode($schedule);
    }
?>