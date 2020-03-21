<?php
    include("database.php");

    // dob format -> YYYY-MM-DD
    function add_client($username, $password, $firstname, $lastname,
                        $address, $city, $postalcode, $homephone,
                        $cellphone, $sin, $dob, $regionid, $physician,
                        $payment, $status, $residenceid, $proxyid) {
        global $db;

        $query = 'SELECT client.Username 
                    FROM client
                    WHERE client.Username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $client = $statement->fetch();
        $statement->closeCursor();

        if (is_null($client)) {
            $query = 'INSERT INTO client VALUES
                    (:username, :password, :firstname, :$lastname, :address,
                        :city, :postalcode, :homephone, :cellphone, :sin, :dob,
                        :regionid, :physician, :payment, :status, :residenceid,
                        :proxyid)';
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $password);
            $statement->bindValue(':firstname', $firstname);
            $statement->bindValue(':lastname', $lastname);
            $statement->bindValue(':address', $address);
            $statement->bindValue(':city', $city);
            $statement->bindValue(':postalcode', $postalcode);
            $statement->bindValue(':homephone', $homephone);
            $statement->bindValue(':cellphone', $cellphone);
            $statement->bindValue(':sin', $sin);
            $statement->bindValue(':dob', $dob);
            $statement->bindValue(':regionid', $regionid);
            $statement->bindValue(':physician', $physician);
            $statement->bindValue(':payment', $payment);
            $statement->bindValue(':status', $status);
            $statement->bindValue(':residenceid', $residenceid);
            $statement->bindValue(':proxyid', $proxyid);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } else {
            return false;
        }
    }

    // time format 'YYYY-MM-DDTHH:MM:SS', example -> '2020-03-18T21:38:00'
    function add_shift($username, $starttime, $endtime, $serviceid, $servicedetail) {
        global $db;

        $query = 'SELECT shift.ClientUsername, shift.StartTime
                    FROM shift
                    WHERE shift.ClientUsername = :username AND
                        shift.StartTime = :starttime';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':starttime', $starttime);
        $statement->execute();
        $shift = $statement->fetch();
        $statement->closeCursor();

        if (is_null($shift)) {
            $query = 'INSERT INTO shift VALUES
                    (:username, :starttime, :endtime, :$serviceid, :servicedetail, NULL, NULL, NULL)';
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':starttime', $starttime);
            $statement->bindValue(':endtime', $endtime);
            $statement->bindValue(':serviceid', $serviceid);
            $statement->bindValue(':servicedetail', $servicedetail);
            $statement->execute();
            $statement->closeCursor();
            return true;
        } else {
            return false;
        }
    }

    function get_clients() {
        global $db;

        $query = 'SELECT * FROM client
                    ORDER BY client.FirstName, client.LastName';
        $statement = $db->prepare($query);
        $statement->execute();
        $clients = $statement->fetchAll();
        $statement->closeCursor();

        return json_decode($clients);
    }
?>