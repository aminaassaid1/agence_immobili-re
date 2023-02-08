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

                        // EDIT ANNONCES
    if (isset($_POST["editbtn"])){
        $editID = $_POST['IDedit'];
        $titreEdit =$_POST['titreedit'];
        $imgEdit = $_FILES['img']['nameedit'];
        $descriptionEdit = $_POST['Descriptionedit'];
        $superficieEdit = $_POST['Superficieedit'];
        $adressEdit= $_POST['Adresseedit'];
        $montantEdit= $_POST['Montantedit'];
        $dateEdit = $_POST['Dateedit'];
        $typeEdit = $_POST['Typeedit'];
        echo "helo";
        move_uploaded_file($_FILES['img']['tmp_name'], "./".$img);
        $Edit =$conn->prepare("UPDATE `annonce` SET titre='$titreEdit', 'image'='img/$imgEdit','description'='$descriptionEdit',Superficie='$superficieEdit',adresse='$adressEdit',Montant='$montantEdit','Date'='$dateEdit',Type_annonce='$typeEdit' WHERE ID ='$editID'");
        $Edit ->execute();
        header('Location: index.php');
exit();
    }
            
                   
?>