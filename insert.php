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

                        // ADD NEW ANNONCES
                        $titre =$_POST['titre'];
                        $img = $_FILES['img']['name'];
                        $description = $_POST['Description'];
                        $superficie = $_POST['Superficie'];
                        $adress= $_POST['Adresse'];
                        $montant= $_POST['Montant'];
                        $date = $_POST['Date'];
                        $type = $_POST['Type'];
                        echo "helo";
                        move_uploaded_file($_FILES['img']['tmp_name'], "./".$img);
                        $AddAnnonces = $conn->query("INSERT INTO `annonce`( `titre`, `image`, `description`, `Superficie`, `adresse`, `Montant`, `Date`, `Type_annonce`) 
                        VALUE ('$titre','$img','$description','$superficie','$adress','$montant','$date','$type')");
                header('Location: index.php');
                exit();
            
                   
?>
