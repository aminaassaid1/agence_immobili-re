<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Images</th>
                <th>Description</th>
                <th>Superficie</th>
                <th>Adresse</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Type</th>
             </tr>
        </thead>
    </table>
    <?php 
            $dsn ='mysql:host=localhost;dbname=agence_immobilière';
            $user= 'root';
            $pass =" ";
            //connect
            try {
                $db = new PDO($dsn,$user,$pass); //start A new Connection with PDO
            }
            catch  (PDOException $e ) {
                echo 'Failed' . $e -> getMessage();
            }
            // affichage
             $annonces = $db->query('SELECT * FROM `annonces`');
                    echo '<tbody>';
                              while($ligne = $annonces->fetch()){
                                    echo '<tr>' ;
                                        echo '<td>';
                                            echo $ligne['id']; 
                                        echo '</td>';

                                        echo '<td>';
                                            echo $ligne['Titre']; 
                                        echo '</td>';

                                        echo '<td>';
                                             echo $ligne['Images']; 
                                        echo '</td>';

                                        echo '<td>';
                                             echo $ligne['Description']; 
                                        echo '</td>';

                                        echo '<td>';
                                             echo $ligne['Superficie']; 
                                        echo '</td>';

                                        echo '<td>';
                                             echo $ligne['Adresse']; 
                                        echo '</td>';

                                        echo '<td>';
                                             echo $ligne['Montant']; 
                                        echo '</td>';

                                        echo '<td>';
                                             echo $ligne["Date"]; 
                                        echo '</td>';

                                        echo '<td>';
                                             echo $ligne["Type"]; 
                                        echo '</td>';
                                    echo '</tr>' ;
                              }
                    echo '</tbody>';
</body>
</html>
