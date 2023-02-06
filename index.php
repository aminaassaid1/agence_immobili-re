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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <!-- Navigation-->
     <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container px-4 px-lg-5 p-2">
                <a class="navbar-brand text-light" href="#!">LA CLE FACILE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active text-light" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link active text-light" href="#!"> Annonces</a></li>
                        <li class="nav-item"><a class="nav-link active text-light" href="#!"> Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <img src="img/header.jfif" class="rounded mx-auto d-block p-5  w-75 h-50 " alt="YOUR DREAM START LIVING">
        <!-- ADD BUTTON -->
        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddModal">ADD NEW ANNONCES</button>
        <!-- POPUP -->
            <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD NEW ANNONCE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> 
                    <form id="Addform" name=formAdd method="post">
                    <div class="mb-3">
                        <label for="Titre" class="form-label">TITRE</label>
                        <input type="text" class="form-control" id="Titre">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">IMAGE</label>
                        <input type="text" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">DESCRIPTION</label>
                        <input type="text" class="form-control" id="description">
                    </div>
                    <div class="mb-3">
                        <label for="superficie" class="form-label">SUPERFICIE</label>
                        <input type="text" class="form-control" id="superficie">
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">ADRESSE</label>
                        <input type="text" class="form-control" id="adresse">
                    </div>
                    <div class="mb-3">
                        <label for="mintant" class="form-label">MONTANT</label>
                        <input type="text" class="form-control" id="montant">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">DATE</label>
                        <input type="date" class="form-control" id="date">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">TYPE</label>
                        <input type="text" class="form-control" id="type">
                    </div>
                    </form>
                </div>
                <div class="modal-footer"> 
                    <input type="button" name="add" class="btn btn-dark" value="save to dtabase" id="btnAdd">
                </div>
                </div>
            </div>
            </div>


            <!-- CARDS -->
            <div  class="row col-12 justify-content-center m-0 gap-4 px-5" id="cards">
                    <?php
                        foreach ($response as $ligne)
                        echo "
                        <div class='card col-md-5 col-lg-3 p-0 m-0'>
                            <img src=".$ligne['image']." class'card-img-top'>
                            <h4 class='modal-title'>".$ligne['titre']."</h4>
                            <p>".$ligne['Type_annonce']."</p>
                            <h5 style='color:#3F34B8;'>".$ligne['Montant']."</h5>
                            <p style='font-size:15px; color:red'>CONSULTER PRIX</p>
                            <form action='delet.php' method='POST'>
                            <input type='number' value=".$ligne["ID"]." class='btn btn-danger d-none' name='id' id='id'>
                            <input type='submit' class='btn btn-danger' value='Delete'>
                            </form>
                        </div>"
                ?>
            </div>


            
           
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>  
<script>
    // ADD NEW ANNONCE
$(document).ready(function(){
    $('#btnAdd').on('click',function(){
        $('#btnAdd').attr("disabled","disabled");
        var addTitre = $('#Titre').val();
        var addIMG = $('#image').val();
        var addDescription = $('#description').val();
        var addSuperficie = $('#superficie').val();
        var addAdresse = $('#adresse').val();
        var addMontant = $('#montant').val();
        var addDate = $('#date').val();
        var addType = $('#type ').val();
        if (addTitre!="" && addIMG!="" && addDescription!="" && addSuperficie!="" && addAdresse!="" && addMontant!="" && addDate!="" && addType){
            $.ajax({
            url : "insert.php",
            methode : 'POST ',
            data:{
                titreSend:addTitre,
                IMGsend: addIMG ,
                descriptionSend:addDescription,
                superficieSend:addSuperficie,
                adresseSend:addAdresse,
                montantSend:addMontant,
                dateSend:addDate,
                typeSend:addType

            },
            catch: false,
            success : function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $('#btnAdd').removeAttr("disabled");
                    $('Addform').find('input:text'.val(''));
                }else if(dataResult.statusCode==201){
                    alert("error occured!")
                }
            }
            });
        };
});
});

    
 
</script>

</body>
</html>
