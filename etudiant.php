<?php 
$bdd = new PDO('mysql:host=localhost;dbname=ufr_sds;charset=utf8;','root','');
if(isset($_POST['envoyer'])){
     if(!empty($_POST['nom'])  AND !empty($_POST['prenom']) AND !empty($_POST['date_de_naissance']) AND !empty($_POST['email']) AND !empty($_POST['tuteur'])){
        $nom = ($_POST['nom']);
        $prenom =($_POST['prenom']);
        $date_de_naissance =($_POST['date_de_naissance']);
        $email = ($_POST['email']);
        $tuteur = ($_POST['tuteur']);
        $insertUser = $bdd->prepare("INSERT INTO etudiant(nom,prenom,date_de_naissance,email,tuteur) VALUES(?,?,?,?,?) " );
        $insertUser->execute(array($nom,$prenom,$date_de_naissance,$email,$tuteur));

     }
        $recupUser = $bdd->prepare('SELECT * FROM etudiant WHERE nom = ? AND prenom = ? AND date_de_naissance = ? AND email = ? AND tuteur = ?'); 
         $recupUser->execute(array($nom, $prenom, $date_de_naissance,$email,$tuteur));

        if($recupUser->rowCount() > 0){

         $_SESSION['nom'] = $nom;
         $_SESSION['prenom'] = $prenom;
         $_SESSION['date_de_naissance'] = $date_de_naissance;
         $_SESSION['email'] = $email;
         $_SESSION['tuteur'] = $tuteur;
         header('Location:liste.php');
      }
      echo"Enregistre avec succes";
  
    } else{   
        
        echo"veuillez remplir tous les champs merci...";
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./css/acceuil.css">
    <title>formulaire</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="logo col-sm-10">
                    <img src="./image/index3.png" width="400px">
                </div>
                <div class="trai col-sm-10"></div>
            </div>
        </div>
    </header>

    <form method="POST" action="">
        <div class="container">
            <div class="row">
                <div class="ajout">
                    <h2><strong> FORMULAIRE D'ENREGISTREMENT</strong></h2>
                </div>

                <div class="ruban"> <img src="./image/Yellow-Ribbon-PNG-Transparent-Image1.png" alt="">
                </div>

                <div class="espace1 ">
                    <div class="mb-3 row">
                        <label for="inputText" class="col-sm-2 col-form-label"> <strong> Nom: </strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="nom">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputText" class="col-sm-2 col-form-label"><strong> Prénom:
                            </strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="prenom">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputText" class="col-sm-2 col-form-label"><strong> Date de Naissance:
                            </strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="date_de_naissance">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputText" class="col-sm-2 col-form-label"><strong> Email :</strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="inputText" class="col-sm-2 col-form-label"><strong> Tuteur:
                            </strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tuteur">
                        </div>
                    </div>
                    <div class="card-body">
                    <input type="submit" name="envoyer" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer>
        <div class="container ">
            <div class="row">
                <div class="fin">
                    <img src="./image/arton112289.jpg" width="250px" height="130px">
                </div>
            </div>
        </div>
    </footer>

    <script src="./css/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
</body>

</html>