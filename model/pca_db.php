<?php
    include("database.php");

    // time format 'YYYY-MM-DDTHH:MM:SS', example -> '2020-03-18T21:38:00'
    function check_in($pcauser, $starttime) {
        global $db;

        $query = 'SELECT shift.PCAUsername
                    FROM shift
                    WHERE shift.StartTime = :starttime AND
                        shift.PCAUsername = $pcauser AND 
                        shift.CheckIn IS NULL';
        $statement = $db->prepare($query);
        $statement->bindValue(':starttime', $starttime);
        $statement->bindValue(':pcauser', $pcauser);
        $statement->execute();
        $shift = $statement->fetch();
        $statement->closeCursor();

        if (!is_null($shift)) {
            $query = 'UPDATE shift
                        SET CheckIn = CURRENT_TIMESTAMP()
                        WHERE PCAUsername = :pcauser';
            $statement = $db->prepare($query);
            $statement->bindValue(':pcauser', $pcauser);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } else {
            return false;
        }
    }

    // time format 'YYYY-MM-DDTHH:MM:SS', example -> '2020-03-18T21:38:00'
    function check_out($pcauser, $starttime) {
        global $db;

        $query = 'SELECT shift.PCAUsername
                    FROM shift
                    WHERE shift.StartTime = :starttime AND
                        shift.PCAUsername = $pcauser AND 
                        shift.CheckOut IS NULL';
        $statement = $db->prepare($query);
        $statement->bindValue(':starttime', $starttime);
        $statement->bindValue(':pcauser', $pcauser);
        $statement->execute();
        $shift = $statement->fetch();
        $statement->closeCursor();

        if (!is_null($shift)) {
            $query = 'UPDATE shift
                        SET CheckOut = CURRENT_TIMESTAMP()
                        WHERE PCAUsername = :pcauser';
            $statement = $db->prepare($query);
            $statement->bindValue(':pcauser', $pcauser);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } else {
            return false;
        }
    }

    // time format 'YYYY-MM-DDTHH:MM:SS', example -> '2020-03-18T21:38:00'
    function assign_pca($clientuser, $pcauser, $starttime) {
        global $db;

        $query = 'SELECT shift.ClientUsername, shift.StartTime
                    FROM shift
                    WHERE shift.StartTime = :starttime AND
                        shift.PCAUsername IS NULL AND
                        shift.ClientUsername = :clientuser';
        $statement = $db->prepare($query);
        $statement->bindValue(':starttime', $starttime);
        $statement->bindValue(':clientuser', $clientuser);
        $statement->bindValue(':pcauser', $pcauser);
        $statement->execute();
        $shift = $statement->fetch();
        $statement->closeCursor();

        if (!is_null($shift)) {
            $query = 'UPDATE shift
                        SET PCAUsername = :pcauser
                        WHERE StartTime = :starttime AND
                            ClientUsername = :clientuser';
            $statement = $db->prepare($query);
            $statement->bindValue(':starttime', $starttime);
            $statement->bindValue(':clientuser', $clientuser);
            $statement->bindValue(':pcauser', $pcauser);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } else {
            return false;
        }
    }

    function get_pcas() {
        global $db;

        $query = 'SELECT * FROM employee
                    WHERE employee.PositionID = 2
                    ORDER BY employee.FirstName, employee.LastName';
        $statement = $db->prepare($query);
        $statement->execute();
        $pcas = $statement->fetchAll();
        $statement->closeCursor();

        return json_decode($pcas);
    }
?>