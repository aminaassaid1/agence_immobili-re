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

        //  MIN AND MAX

        if(isset($_POST["minmax"]))
            {       
                    $typeSelect = $_POST['selectType'];
                    $PrixMin = $_POST['Min'];
                    $PrixMax = $_POST['Max'];


                    $Search = $conn->prepare("SELECT * FROM annonce WHERE `Type_annonce` = '$typeSelect' AND Montant BETWEEN '$PrixMin' AND '$PrixMax'");
                    $Search->execute();
                    $SearchResponse = $Search->fetchAll();
                    
                    foreach ($SearchResponse as $res)
                    echo "
                <div  class='row col-12 justify-content-center m-0 gap-4 px-5' id='cards'>
                    <div class='card col-md-5 col-lg-3 p-0 m-0'>
                        <img src=".$res['image']." class'card-img-top'>
                        <h4 class='modal-title'>".$res['titre']."</h4>
                        <p>".$res['Type_annonce']."</p>
                        <h5 style='color:#3F34B8;'>".$res['Montant']."</h5>
                        <p style='font-size:15px; color:red'>CONSULTER PRIX</p>
                        <form action='delet.php' method='POST'>
                        <input type='number' value=".$res['ID']." class='btn btn-danger d-none' name='ID' id='id'>
                        <input type='submit' class='btn btn-danger' value='Delete' >
                        <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target=#".$res['ID'].">Edit</button>
                        </form>
                    </div>
                </div>

                    
                    <!-- POPUP EDITE-->
                    <div class='modal fade' id=".$res['ID']." tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                   <div class='modal-dialog'>
                       <div class='modal-content'>
                       <div class='modal-header'>
                           <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit ANNONCE</h1>
                           <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                       </div>
                       <div class='modal-body'> 
                           <form action='edit.php' method='post' enctype='multipart/form-data'>
                           <div class='mb-3'>
                               <label for='Titre' class='form-label'>TITRE</label>
                               <input type='text' name='titreedit' class='form-control' id='Titre'>
                           </div>
                           <div class='mb-3'>
                               <label for='image' class='form-label'>IMAGE</label>
                               <input type='file' name='imgedit' class='form-control' id='image'>
                           </div>
                           <div class='mb-3'>
                               <label for='description' class='form-label'>DESCRIPTION</label>
                               <input type='text' name='Descriptionedit' class='form-control' id='description'>
                           </div>
                           <div class='mb-3'>
                               <label for='superficie' class='form-label'>SUPERFICIE</label>
                               <input type='number' name='Superficieedit'  class='form-control' id='superficie'>
                           </div>
                           <div class='mb-3'>
                               <label for='adresse' class='form-label'>ADRESSE</label>
                               <input type='text' name='Adresseedit' class='form-control' id='adresse'>
                           </div>
                           <div class='mb-3'>
                               <label for='mintant' class='form-label'>MONTANT</label>
                               <input type='number' name='Montantedit' class='form-control' id='montant'>
                           </div>
                           <div class='mb-3'>
                               <label for='date' class='form-label'>DATE</label>
                               <input type='date' name='Dateedit' class='form-control' id='date'>
                           </div>
                           <div class='mb-3'>
                               <label for='type' class='form-label'>TYPE</label>
                               <div class='mb-3'>
                                <label for=type' class='form-label'>TYPE</label>
                                <input type='text' name='Typeedit' class='form-control' id='type'>
                                </div>
                           </div>
                           <div class='mb-3'>
                               <label for='ID' class='form-label'></label>
                               <input type='hidden' name='IDedit' class='form-control' id='ID' value=".$res["ID"].">
                           </div>
                          
                       </div>
                       <div class='modal-footer'> 
                   
                           <input type='submit' name='editbtn' class='btn btn-dark' value='EDIT'>
                       </div>
                       </form>
                       </div>
                   </div>
                   </div>";


            }
            header('location:index.php');
            exit();



?>