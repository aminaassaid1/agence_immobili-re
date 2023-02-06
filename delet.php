<?php 
            $srvname ='mysql:host=localhost;dbname=agence_immobilière';
            $user = 'root';
            $pass = "";
            $id = $_POST["ID"]
            //connect
            try {
                $conn = new PDO($srvname,$user,$pass); //start A new Connection with PDO
            }
            catch  (PDOException $e ) {
                echo 'Failed' . $e -> getMessage();
            }
            // affichage
            $annonces = $conn->query("DELETE  FROM `annonce` WHERE ID='$id'");
            $annonces->execute();
            header('location:index.php');
            exit();
?>