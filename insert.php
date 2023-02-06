<?php
include 'index.php';

$titre =$_POST['titreSend'];
$img = $_POST['IMGsend'];
$description = $_POST['descriptionSend'];
$superficie = $_POST['superficieSend'];
$adress= $_POST['adresseSend'];
$montant= $_POST['montantSend'];
$date = $_POST['dateSend'];
$type = $_POST['typeSend'];
    $sql ="INSERT INTO `annonce`(`ID`, `titre`, `image`, `description`, `Superficie`, `adresse`, `Montant`, `Date`, `Type_annonce`) 
    VALUE ('$titre','$img','$description','$superficie','$adress','$montant','$date','$type')";
    if (mysql_query($conn,$sql)){
        echo json_decode(array("statusCode"=>200));
    }else{
        echo json_decode(array("statusCode"=>201));
    }
    mysli_close($conn);

?>