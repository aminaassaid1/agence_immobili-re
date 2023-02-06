<?php 
            $srvname ='mysql:host=localhost;dbname=agence_immobilière';
            $user = 'root';
            $pass = "";
            //connect
            try {
                $conn = new PDO($srvname,$user,$pass); //start A new Connection with PDO
            }
            catch  (PDOException $e ) {
                echo 'Failed' . $e -> getMessage();
            }
            // affichage
            $annonces = $conn->query('SELECT * FROM `annonce`');
            $annonces->execute();
            $response = $annonces->fetchAll();
                   
?>